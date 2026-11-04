<?php

use App\Models\TeamMember;
use App\Models\User;
use Database\Seeders\TeamMemberSeeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

function teamMemberPayload(array $overrides = []): array
{
    return array_merge([
        'name' => 'Ana Martins',
        'slug' => 'ana-martins',
        'oab_number' => 'OAB/RS 123.456',
        'education' => 'Universidade Federal do Rio Grande do Sul.',
        'description' => 'Atuação jurídica responsável e dedicada.',
        'specialties' => "Direito Civil\nDireito Empresarial",
        'position' => 'Advogada',
        'sort_order' => 4,
        'is_active' => '1',
    ], $overrides);
}

test('guests cannot access team member administration', function () {
    $this->get(route('admin.team-members.index'))
        ->assertRedirect(route('admin.login'));
});

test('admin can create a team member with a photograph', function () {
    Storage::fake('public');
    $this->actingAs(User::factory()->create());

    $response = $this->post(route('admin.team-members.store'), teamMemberPayload([
        'photo' => UploadedFile::fake()->image('ana.png', 600, 600),
    ]));

    $response->assertRedirect(route('admin.team-members.index'));
    $this->assertDatabaseHas('team_members', [
        'name' => 'Ana Martins',
        'slug' => 'ana-martins',
        'oab_number' => 'OAB/RS 123.456',
        'sort_order' => 4,
        'is_active' => true,
    ]);

    $member = TeamMember::where('slug', 'ana-martins')->firstOrFail();
    Storage::disk('public')->assertExists($member->photo);
    expect($member->specialties)->toBe(['Direito Civil', 'Direito Empresarial']);
});

test('admin can update a team member and replace its photograph', function () {
    Storage::fake('public');
    $this->actingAs(User::factory()->create());
    $member = TeamMember::factory()->create([
        'photo' => 'team/old-photo.png',
    ]);
    Storage::disk('public')->put($member->photo, 'old photo');

    $response = $this->put(route('admin.team-members.update', $member), teamMemberPayload([
        'name' => 'Ana Martins Atualizada',
        'slug' => $member->slug,
        'photo' => UploadedFile::fake()->image('new-photo.png', 600, 600),
        'is_active' => '0',
    ]));

    $response->assertRedirect(route('admin.team-members.index'));
    $member->refresh();

    expect($member->name)->toBe('Ana Martins Atualizada');
    expect($member->is_active)->toBeFalse();
    expect($member->photo)->not->toBe('team/old-photo.png');
    Storage::disk('public')->assertMissing('team/old-photo.png');
    Storage::disk('public')->assertExists($member->photo);
});

test('admin can delete a team member and its stored photograph', function () {
    Storage::fake('public');
    $this->actingAs(User::factory()->create());
    $member = TeamMember::factory()->create([
        'photo' => 'team/delete-me.png',
    ]);
    Storage::disk('public')->put($member->photo, 'photo');

    $response = $this->delete(route('admin.team-members.destroy', $member));

    $response->assertRedirect(route('admin.team-members.index'));
    $this->assertModelMissing($member);
    Storage::disk('public')->assertMissing('team/delete-me.png');
});

test('team member creation validates required fields and the photograph format', function () {
    $this->actingAs(User::factory()->create());

    $response = $this->from(route('admin.team-members.create'))
        ->post(route('admin.team-members.store'), [
            'name' => '',
            'oab_number' => '',
            'description' => '',
            'photo' => UploadedFile::fake()->create('document.pdf', 10, 'application/pdf'),
        ]);

    $response->assertRedirect(route('admin.team-members.create'));
    $response->assertSessionHasErrors(['name', 'oab_number', 'description', 'photo']);
});

test('homepage renders only active team members in presentation order', function () {
    TeamMember::factory()->create([
        'name' => 'Terceira Profissional',
        'sort_order' => 3,
        'is_active' => true,
    ]);
    TeamMember::factory()->create([
        'name' => 'Primeira Profissional',
        'sort_order' => 1,
        'is_active' => true,
    ]);
    TeamMember::factory()->create([
        'name' => 'Profissional Inativa',
        'sort_order' => 2,
        'is_active' => false,
    ]);

    $response = $this->get(route('home'));

    $response->assertOk();
    $response->assertSeeInOrder(['Primeira Profissional', 'Terceira Profissional']);
    $response->assertDontSee('Profissional Inativa');
});

test('team member seeder is idempotent and preserves panel edits', function () {
    $this->seed(TeamMemberSeeder::class);
    $marcelo = TeamMember::where('slug', 'marcelo-luiz-souza-pereira')->firstOrFail();
    $marcelo->update(['description' => 'Descrição atualizada pelo painel.']);

    $this->seed(TeamMemberSeeder::class);

    expect(TeamMember::count())->toBe(3);
    expect($marcelo->fresh()->description)->toBe('Descrição atualizada pelo painel.');
});


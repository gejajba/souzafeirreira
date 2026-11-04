<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeamMemberRequest;
use App\Http\Requests\UpdateTeamMemberRequest;
use App\Models\TeamMember;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    public function index(): View
    {
        $teamMembers = TeamMember::ordered()->get();

        return view('admin.team-members.index', compact('teamMembers'));
    }

    public function create(): View
    {
        return view('admin.team-members.create');
    }

    public function edit(TeamMember $teamMember): View
    {
        return view('admin.team-members.edit', compact('teamMember'));
    }

    public function store(StoreTeamMemberRequest $request): RedirectResponse
    {
        TeamMember::create($this->data($request));

        return to_route('admin.team-members.index')->with('success', 'Profissional cadastrado com sucesso!');
    }

    public function update(UpdateTeamMemberRequest $request, TeamMember $teamMember): RedirectResponse
    {
        $teamMember->update($this->data($request, $teamMember));

        return to_route('admin.team-members.index')->with('success', 'Profissional atualizado com sucesso!');
    }

    public function destroy(TeamMember $teamMember): RedirectResponse
    {
        $photo = $teamMember->photo;
        $teamMember->delete();
        $this->deletePhoto($photo);

        return to_route('admin.team-members.index')->with('success', 'Profissional removido com sucesso!');
    }

    private function data(StoreTeamMemberRequest|UpdateTeamMemberRequest $request, ?TeamMember $member = null): array
    {
        $data = $request->safe()->except('photo');
        $data['is_active'] = $request->boolean('is_active');
        $data['specialties'] = collect(preg_split('/\r\n|\r|\n/', $data['specialties'] ?? ''))->map(fn ($v) => trim($v))->filter()->values()->all();
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('team', 'public');
            $this->deletePhoto($member?->photo, $member?->id);
        }

return $data;
    }

    private function deletePhoto(?string $photo, ?int $exceptId = null): void
    {
        if ($photo && Storage::disk('public')->exists($photo) && ! TeamMember::query()->when($exceptId, fn ($q) => $q->whereKeyNot($exceptId))->where('photo', $photo)->exists()) {
            Storage::disk('public')->delete($photo);
        }
    }
}

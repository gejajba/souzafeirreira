<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UpdateTeamMemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'], 'slug' => ['required', 'string', 'max:255', Rule::unique('team_members', 'slug')->ignore($this->team_member)], 'oab_number' => ['required', 'string', 'max:255'], 'education' => ['nullable', 'string'], 'description' => ['required', 'string'], 'specialties' => ['nullable', 'string'], 'photo' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:2048'], 'position' => ['nullable', 'string', 'max:255'], 'sort_order' => ['required', 'integer', 'min:0'], 'is_active' => ['nullable', 'boolean'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge(['slug' => Str::slug($this->input('slug') ?: $this->input('name'))]);
    }
}

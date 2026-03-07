<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Project;

class ProjectRequest extends FormRequest
{
    protected ?Project $project = null;

    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->project = $this->route('project');
    }


    public function rules(): array
    {
        return [
            'foto'       => 'required|image|mimes:jps,pnp,jpeg|max:2048',
            'nama_project'          => 'required|string|max:225',
            'link'          => 'required|string|max:225',
        ];
    }
}

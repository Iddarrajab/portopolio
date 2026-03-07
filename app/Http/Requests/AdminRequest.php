<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Admin;

class AdminRequest extends FormRequest
{
    protected ?Admin $admin = null;

    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->admin = $this->route('admin');
    }

    public function rules(): array
    {
        return [
            'username' => 'required|string|max:100',
            'email' => 'required|email|unique:admin,email',
            'password' => 'required|min:6',
        ];
    }
}

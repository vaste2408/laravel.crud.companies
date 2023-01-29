<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use JetBrains\PhpStorm\ArrayShape;

class UpdateCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['name' => "string", 'email' => "string", 'address' => "string", 'logo' => "string", 'old_logo' => "string"])] public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => '',
            'address' => '',
            'logo' => '',
            'old_logo' => ''
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Enums\NannyBookingStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class NannyBookingsIndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'search' => 'string|nullable|max:50',
            'status' => ['nullable', new Enum(NannyBookingStatus::class)],
        ];
    }
}

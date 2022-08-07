<?php

namespace App\Http\Requests\Shared\Attendee;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AttendeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'event_id' => 'required|sometimes',
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'gender' => 'required',
            'email' => ['required', 'email', Rule::unique('attendees', 'email')->where(fn($q) => $q->where('event_id', $this->event_id))],
            'contact' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'The email address has already been taken by another attendee.',
        ];
    }
}

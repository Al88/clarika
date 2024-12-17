<?php

namespace App\Requests;

use CodeIgniter\Validation\Exceptions\ValidationException;

class GuestCreateRequest
{
    private $rules = [
        'name'  => 'required|min_length[3]',
        'email' => 'required|valid_email',
        'phone' => 'required',
    ];

    private $messages = [
        'name' => [
            'required'    => 'The name field is required.',
            'min_length'  => 'The name must be at least 3 characters long.',
        ],
        'email' => [
            'required'    => 'The email field is required.',
            'valid_email' => 'Please provide a valid email address.',
        ],
        'phone' => [
            'required' => 'The phone field is required.',
        ],
    ];

    public function validate(array $data)
    {
        $validation = \Config\Services::validation();
        $validation->setRules($this->rules, $this->messages);

        if (!$validation->run($data)) {
            $errors = $validation->getErrors();
            $errorMessage = implode(', ', $errors);
            throw new ValidationException('Validation failed: ' . $errorMessage);
        }
    }
}

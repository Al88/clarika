<?php

namespace App\Validators;

use CodeIgniter\Config\Services;

class GuestValidator
{
    private $errors = [];

    // Método para validación de creación
    public function validateCreate(array $data): bool
    {
        $validation = Services::validation();

        // Establecer las reglas con los mensajes personalizados
        $validation->setRules([
            'name'  => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'El campo nombre es obligatorio.',
                    'min_length' => 'El nombre debe tener al menos 3 caracteres.',
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[guests.email]',  // Validar email único
                'errors' => [
                    'required' => 'El campo email es obligatorio.',
                    'valid_email' => 'Por favor, ingrese un email válido.',
                    'is_unique' => 'El email ya está registrado.',
                ]
            ],
            'phone' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo teléfono es obligatorio.',
                ]
            ]
        ]);

        // Ejecutar la validación
        if (!$validation->run($data)) {
            $this->errors = $validation->getErrors();  // Guardar los errores de validación
            return false;
        }

        return true;
    }

    // Método para validación de actualización
    public function validateUpdate(array $data, $id): bool
    {
        $validation = Services::validation();

        // Establecer las reglas con los mensajes personalizados
        $validation->setRules([
            'name'  => [
                'rules' => 'min_length[3]',
                'errors' => [
                    'min_length' => 'El nombre debe tener al menos 3 caracteres.',
                ]
            ],
            'email' => [
                'rules' => 'valid_email|is_unique[guests.email,id,' . $id . ']',  // Excluir el email actual
                'errors' => [
                    'valid_email' => 'Por favor, ingrese un email válido.',
                    'is_unique' => 'El email ya está registrado.',
                ]
            ],
            'phone' => [
                'rules' => 'permit_empty',
                'errors' => [
                    'permit_empty' => 'El campo teléfono es opcional.',
                ]
            ]
        ]);

        // Ejecutar la validación
        if (!$validation->run($data)) {
            $this->errors = $validation->getErrors();  // Guardar los errores de validación
            return false;
        }

        return true;
    }

    // Método para obtener los errores de validación
    public function getErrors(): array
    {
        return $this->errors;
    }
}

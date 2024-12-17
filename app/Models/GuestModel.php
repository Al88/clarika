<?php

namespace App\Models;

use CodeIgniter\Model;

class GuestModel extends Model
{
    protected $table = 'guests';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'email', 'phone', 'created_at', 'updated_at'];

    // Activar el manejo de marcas de tiempo automáticas
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $skipValidation = true;

    // Callback para acciones personalizadas
    protected $beforeInsert = ['sanitizeData'];
    protected $beforeUpdate = ['sanitizeData'];

    /**
     * Método de callback para sanitizar los datos antes de guardarlos en la base de datos.
     */
    protected function sanitizeData(array $data)
    {
        if (isset($data['data']['name'])) {
            $data['data']['name'] = ucfirst(trim($data['data']['name'])); // Capitalizar nombre
        }

        if (isset($data['data']['email'])) {
            $data['data']['email'] = strtolower(trim($data['data']['email'])); // Convertir email a minúsculas
        }

        return $data;
    }
}

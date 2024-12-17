<?php

namespace App\Services;

use App\Models\GuestModel;

class GuestService
{
    private $guestModel;

    public function __construct()
    {
        $this->guestModel = new GuestModel();
    }

    public function createGuest(array $data)
    {
        $id = $this->guestModel->insert($data);
        return $this->guestModel->find($id);
    }

    public function getAllGuests()
    {
        return $this->guestModel->findAll();
    }

    public function getGuestById(int $id)
    {
        return $this->guestModel->find($id);
    }

    public function updateGuest(int $id, array $data)
    {
        $this->guestModel->update($id, $data);
        return $this->guestModel->find($id);
    }

    public function deleteGuest(int $id)
    {
        return $this->guestModel->delete($id);
    }
}

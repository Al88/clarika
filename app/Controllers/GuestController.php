<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Services\GuestService;
use App\Validators\GuestValidator;

class GuestController extends ResourceController
{
    private $guestService;

    public function __construct()
    {
        $this->guestService = new GuestService();
    }

    public function create()
    {
        $data = $this->request->getPost();

        $validator = new GuestValidator();
        if (!$validator->validateCreate($data)) {
            return $this->failValidationErrors($validator->getErrors());
        }

        $guest = $this->guestService->createGuest($data);
        return $this->respondCreated(['message' => 'Guest added successfully', 'guest' => $guest]);
    }

    public function index()
    {
        $guests = $this->guestService->getAllGuests();
        return $this->respond($guests);
    }

    public function show($id = null)
    {
        $guest = $this->guestService->getGuestById($id);
        if (!$guest) {
            return $this->failNotFound('Guest not found');
        }
        return $this->respond($guest);
    }

    public function update($id = null)
    {
        $data = $this->request->getRawInput();

        $validator = new GuestValidator();
        if (!$validator->validateUpdate($data, $id)) {
            return $this->failValidationErrors($validator->getErrors());
        }

        $guest = $this->guestService->updateGuest($id, $data);
        if (!$guest) {
            return $this->failNotFound('Guest not found');
        }

        return $this->respond(['message' => 'Guest updated successfully', 'guest' => $guest]);
    }

    public function delete($id = null)
    {
        $result = $this->guestService->deleteGuest($id);
        if (!$result) {
            return $this->fail('Unable to delete guest');
        }
        return $this->respondDeleted(['message' => 'Guest deleted successfully']);
    }
}

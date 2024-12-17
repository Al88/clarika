<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Guests extends BaseController
{
    private $api;

    public function __construct()
    {
        $this->api = \Config\Services::curlrequest([
            'baseURI' => base_url(),
            'timeout' => 2,
            'http_errors' => false, // Para evitar excepciones por errores HTTP
        ]);
    }

    // GET /guests
    public function index()
    {
        try {
            $response = $this->api->get('api/guests');
            $data['guests'] = json_decode($response->getBody(), true);
            return view('guests/list', $data);
        } catch (\Exception $e) {
            log_message('error', 'Error fetching guests: ' . $e->getMessage());
            return redirect()->to('/')->with('error', 'Error al cargar la lista de invitados.');
        }
    }

    // GET /guests/create
    public function create()
    {
        return view('guests/create');
    }

    // POST /guests
    public function store()
    {
        $data = $this->request->getPost();

        try {
            $response = $this->api->post('api/guests', [
                'form_params' => $data,
            ]);

            $responseBody = json_decode($response->getBody(), true);

            if (isset($responseBody['status']) && $responseBody['status'] === 400) {
                $validationErrors = $responseBody['messages'];
                return redirect()->back()->withInput()->with('validationErrors', $validationErrors);
            }

            return redirect()->to('/guests')->with('message', 'Invitado agregado exitosamente');
        } catch (\Exception $e) {
            log_message('error', 'Error creating guest: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error al agregar el invitado.');
        }
    }

    // GET /guests/{id}
    public function show($id)
    {
        try {
            $response = $this->api->get("api/guests/{$id}");
            $data['guest'] = json_decode($response->getBody(), true);
            return view('guests/show', $data);
        } catch (\Exception $e) {
            log_message('error', "Error fetching guest with ID {$id}: " . $e->getMessage());
            return redirect()->to('/guests')->with('error', 'Error al cargar los detalles del invitado.');
        }
    }

    // GET /guests/{id}/edit
    public function edit($id)
    {
        try {
            $response = $this->api->get("api/guests/{$id}");
            $data['guest'] = json_decode($response->getBody(), true);
            return view('guests/edit', $data);
        } catch (\Exception $e) {
            log_message('error', "Error fetching guest for editing with ID {$id}: " . $e->getMessage());
            return redirect()->to('/guests')->with('error', 'Error al cargar el formulario de edición.');
        }
    }

    // PUT /guests/{id}
    public function update($id)
    {
        $data = $this->request->getPost();

        try {
            $response = $this->api->put("api/guests/{$id}", [
                'form_params' => $data,
            ]);

            $responseBody = json_decode($response->getBody(), true);

            if (isset($responseBody['status']) && $responseBody['status'] === 400) {
                $validationErrors = $responseBody['messages'];
                return redirect()->back()->withInput()->with('validationErrors', $validationErrors);
            }

            return redirect()->to('/guests')->with('message', 'Invitado actualizado exitosamente');
        } catch (\Exception $e) {
            log_message('error', "Error updating guest with ID {$id}: " . $e->getMessage());
            return redirect()->back()->with('error', 'Error al actualizar el invitado.');
        }
    }

    // DELETE /guests/{id}
    public function delete($id)
    {
        try {
            $response = $this->api->delete("api/guests/{$id}");
            $responseBody = json_decode($response->getBody(), true);

            if (isset($responseBody['status']) && $responseBody['status'] === 400) {
                return redirect()->to('/guests')->with('error', 'No se pudo eliminar el invitado.');
            }

            return redirect()->to('/guests')->with('message', 'Invitado eliminado exitosamente');
        } catch (\Exception $e) {
            log_message('error', "Error deleting guest with ID {$id}: " . $e->getMessage());
            return redirect()->to('/guests')->with('error', 'Error al eliminar el invitado.');
        }
    }
}

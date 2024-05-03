<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

// Controlador dedicado para las solicitudes al microservicio Spring Boot 
class ClienteController extends Controller {
    // ---------- Metodos del CRUD ---------- 
    // -- GET --
    // Get all
    public function getClientesSB() {
        $client = new Client();
        $response = $client->get('http://localhost:8080/api/clientes');

        $clientes = json_decode($response->getBody()->getContents(), true);
        return response()->json($clientes);
    }

    // Get por id
    public function getClienteByIdSB($id) {
        $client = new Client();
        $response = $client->get("http://localhost:8080/api/clientes/{$id}");
        
        // Gestión error: cliente no existe
        if ($response->getStatusCode() === 200) {
            $cliente = json_decode($response->getBody()->getContents(), true);
            return response()->json($cliente);
        } else {
            return response()->json(['error' => 'Error: el cliente no existe'], 404);
        }
    }

    // -- POST --
    public function createClienteSB(Request $request) {
        $client = new Client();
        $response = $client->post('http://localhost:8080/api/clientes', [
            // Datos del body: cliente a crear
            'json' => $request->all()
        ]);

        $clienteCreado = json_decode($response->getBody()->getContents(), true);
        return response()->json($clienteCreado, 201);
    }

    // --- PUT ---
    public function updateClienteSB($id, Request $request) {
        $client = new Client();
        $response = $client->put("http://localhost:8080/api/clientes/{$id}", [
            // Datos del body: cliente a actualizar
            'json' => $request->all()
        ]);

        // Gestión error: cliente no existe
        if ($response->getStatusCode() === 200) {
            $clienteActualizado = json_decode($response->getBody()->getContents(), true);
            return response()->json(['message' => 'El cliente se ha actualizado'], 200);
        } else {
            return response()->json(['error' => 'Error: el cliente no existe'], 404);
        }
    }

    // --- DELETE ---
    public function  deleteClienteSB($id) {
        $client = new Client();
        $response = $client->delete("http://localhost:8080/api/clientes/{$id}");

        // Gestión de errores: cliente no existe
        if ($response->getStatusCode() === 200) {
            return response()->json(['message' => 'El cliente se ha borrado'], 200);
        } else {
            return response()->json(['error' => 'Error: el cliente no existe'], $response->getStatusCode());
        }
    }

}

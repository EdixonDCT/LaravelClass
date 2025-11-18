<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $documento = $request->document;
        $contrasena = $request->password;

        $datos = [
            "document"=> $documento,
            "password"=> $contrasena,
            "state_user_id"=> 1,
        ];
        
        $user = User::create($datos);
        $id = $user->id;

        $datosProfile = [
            "user_id"=> $id,
            "names"=> $request->names,
            "last_names"=> $request->last_names,
            "phone"=> $request->phone,
            "email"=> $request->email,
            "ficha_id"=> $request->ficha,
        ];

        $profile = Profile::create($datosProfile);

        return $profile;
        // return response()->json($user,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

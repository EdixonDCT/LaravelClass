<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RoleUser;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreLoginRequest;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([User::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLoginRequest $request)
    {
        try {

        $request->validated();
        
        $user = User::where('document',$request->document)->first();
        $password = $user->password;

        $documento = $user->document;

        $activo = $user->state_user_id;

        $rol = $user->roleUser->first()->role_id;

        if ($activo != 1)
        {
            return response()->json(['El usuario esta inactivo'],400);
        }   

        if ($rol != 1 && $rol != 2)
        {
            return response()->json(['El usuario no puede ingresar con su rol al sistema'],400);
        }   

        if (Hash::check($request->password,$password)) {
            return response()->json(['Bienvenido al sistema'],201);
        }
        else {
            return response()->json(['Contraseña del usuario invalida'],400);
        }

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al registrar Usuario Aprendiz',
                'error' => $e->getMessage()
        ], 500);
        }
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

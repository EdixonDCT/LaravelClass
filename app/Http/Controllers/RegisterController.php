<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Models\Role;
use App\Models\RolesUser;
use App\Models\Ficha;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreRegisterRequest;

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
    public function store(StoreRegisterRequest $request)
    {
        // $documentoExiste = DB::table('users')->where('document', $request->document)->exists();
        // $rolExiste = DB::table('roles')->where('name', $request->rol)->exists();
        // $fichasExiste = DB::table('fichas')->where('name', $request->ficha)->exists();        
        
        // if ($documentoExiste) return response()->json(['El usuario ya existe.'],400);
        // if (!$rolExiste) return response()->json(['El rol no existe.'],404);
        // if (!$fichasExiste) return response()->json(['La ficha no existe.'],404);
        try {

        $request->validated();

        $documento = $request->document;
        
        $crearUser = User::create([
            "document"=> $documento,
            "password"=> Hash::make($documento),
        ]);

        $id = $crearUser->id;

        $rol = $request->rol;
        
        $RolUser = RolesUser::create([
            "user_id"=> $id,
            "role_id"=> Role::where('name',$rol)->first()->id,
        ]);

        $profile = Profile::create([
            "user_id"=> $id,
            "names"=> $request->names,
            "last_names"=> $request->last_names,
            "phone"=> $request->phone,
            "email"=> $request->email,
            "ficha_id"=> Ficha::where('name',$request->ficha)->first()->id,
        ]);

        return response()->json(['Se creo el usuario Correctamente.'],201);
        // $datos = $request->only((new User)->getFillable());
        // $datos = $request->only((new User)->getFillable()) + [
        // 'state_user_id' => 1];   

        // $crearUser = User::create($datos);


        // return $crearUser;
        } catch (\Exception $e) {
    return response()->json([
        'message' => 'Error al registrar usuario',
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

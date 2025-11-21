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
use App\Http\Requests\StoreRegisterAprendizRequest;

class RegisterAprendizController extends Controller
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
    public function store(StoreRegisterAprendizRequest $request)
    {
//         { probador
//   "document": "1234567890",
//   "names": "Edixon",
//   "last_names": "Gomez",
//   "phone": "3001234567",
//   "email": "edixon@example.com",
//   "ficha": "2894667"
// }
        try {

        $request->validated();

        $documento = $request->document;
        
        $crearUser = User::create([
            "document"=> $documento,
            "password"=> Hash::make($documento),
        ]);

        $id = $crearUser->id;
        
        $RolUser = RolesUser::create([
            "user_id"=> $id,
            "role_id"=> 4,
        ]);

        $profile = Profile::create([
            "user_id"=> $id,
            "names"=> $request->names,
            "last_names"=> $request->last_names,
            "phone"=> $request->phone,
            "email"=> $request->email,
            "ficha_id"=> Ficha::where('name',$request->ficha)->first()->id,
        ]);

        return response()->json(['Se creo el Usuario Aprendiz Correctamente.'],201);

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

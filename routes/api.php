<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExampleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('example')->get('/', [ExampleController::class, 'index']);
// Route::get('/no-access', [ExampleController::class, 'noAccess'])->name('noAccess');


Route::post('/create', [AuthController::class, 'createUser'])->name('createUser');
Route::post('/login', [AuthController::class, 'loginUser'])->name('loginUser');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    $user = $request->user();

    // Obtener la información del rol del usuario
    $roleInfo = null;
    if ($user->role) {
        $roleInfo = [
            'role_id' => $user->role->id,
            'role_name' => $user->role->name,
            'role_description' => $user->role->description,
        ];
    }

    // Construir el array de respuesta
    $response = [
        'id' => $user->id,
        'first_name' => $user->first_name,
        'last_name' => $user->last_name,
        'dob' => $user->dob,
        'document_type' => $user->document_type,
        'document_number' => $user->document_number,
        'phone_prefix' => $user->phone_prefix,
        'phone_number' => $user->phone_number,
        'email' => $user->email,
        'role_info' => $roleInfo,
        'email_verified_at' => $user->email_verified_at,
        'created_at' => $user->created_at,
        'updated_at' => $user->updated_at,
    ];

    return $response;
});
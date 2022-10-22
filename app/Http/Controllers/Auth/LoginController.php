<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return $this->makeJsonResponse('ERROR: CREDENCIALES INVALIDAS', [], 400);
            }
        } catch (JWTException $exception) {
            return $this->makeJsonResponse('ERROR: NO SE PUDO CREAR EL TOKEN', [], 500);
        }

        return $this->makeJsonResponse('OK', compact('token'));
    }
}

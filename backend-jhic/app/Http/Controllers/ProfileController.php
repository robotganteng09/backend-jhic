<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(Request $request) {
        $account = $request->user()->load('ppdbRegister');

        if (! $account) {
            return response()->json(['message' => 'Akun tidak ditemukan'], 404);
        }

        return response()->json([
            'username' => $account->username,
            'email' => $account->email,
            'register' => $account->ppdbRegister,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AccountController extends Controller
{
    // REGISTER
    public function register(Request $request)
    {
        try {
            $validated = $request->validate([
                'username' => 'required|string|max:225|unique:accounts,username',
                'email' => 'required|email|max:225|unique:accounts,email',
                'password' => 'required|string|min:6',
            ]);

            $account = Account::create([
                'username' => $validated['username'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'status' => 'belum_terdaftar'
            ]);

            return response()->json([
                'message' => 'Akun berhasil dibuat',
                'account' => $account
            ], 201);

        } catch (ValidationException $e) {
            // biar error validation rapi di frontend
            return response()->json([
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    // LOGIN
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $account = Account::where('email', $validated['email'])->first();

        if (! $account || ! Hash::check($validated['password'], $account->password)) {
            return response()->json(['message' => 'Email atau password salah'], 401);
        }

        // Hapus token lama
        $account->tokens()->delete();

        // Buat token baru
        $token = $account->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login berhasil',
            'token' => $token,
            'account' => $account,
        ]);
    }

    // LOGOUT
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logout berhasil']);
    }
}

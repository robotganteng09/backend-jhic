<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Exception;

class AccountController extends Controller
{
    // REGISTER
    public function register(Request $request)
    {
        try {
            $validated = $request->validate([
                'username' => 'required|string|max:225|unique:accounts,username',
                'email' => 'required|email|max:225|unique:accounts,email',
                'password' => 'required|string|min:6|confirmed', // 🟢 tambahkan confirmed
            ]);
            

            $account = Account::create([
                'username' => $validated['username'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            // ✅ Kembalikan status 200 agar frontend (Axios) tidak menganggap error
            return response()->json([
                'success' => true,
                'message' => 'Akun berhasil dibuat',
                'account' => $account,
            ], 200);

        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->errors(),
            ], 422);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    // LOGIN
    public function login(Request $request)
    {
        try {
            $validated = $request->validate([
                'email' => 'required|email',
                'password' => 'required|string',
            ]);

            $account = Account::where('email', $validated['email'])->first();

            if (! $account || ! Hash::check($validated['password'], $account->password)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Email atau password salah',
                ], 401);
            }

            // Hapus token lama
            $account->tokens()->delete();

            // Buat token baru
            $token = $account->createToken('auth_token')->plainTextToken;

            return response()->json([
                'success' => true,
                'message' => 'Login berhasil',
                'token' => $token,
                'account' => $account,
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    // LOGOUT
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
            'success' => true,
            'message' => 'Logout berhasil',
        ]);
    }
}

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

        $status = $account->ppdbRegister->status ?? 'belum_terdaftar';

        $statusMessages = [
            'terdaftar' => "Pendaftaran kamu sudah masuk. Tunggu kabar selanjutnya ya!",
            'belum_terdaftar' => "Kamu belum mendaftar! Tekan tombol daftar untuk mendaftar",
            'terverifikasi' => "Pendaftaran kamu sudah terverifikasi. Silahkan lanjut untuk pembayaran",
            'done' => "Kamu sudah melakukan pembayaran dan terverifikasi menjadi Calon Peserta Didik. Tunggu informasi selanjutnya ya!",
        ];

        return response()->json([
            'username' => $account->username,
            'email' => $account->email,
            'status' => $account->status,
            'status_message' => $statusMessages[$status] ?? '',
            'register' => $account->register,
        ]);
    }
}

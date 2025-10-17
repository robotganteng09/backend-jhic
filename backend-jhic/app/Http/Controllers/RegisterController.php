<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePPDBRequest;
use App\Http\Requests\UpdatePPDBRequest;
use App\Models\Register;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return response()->json(Register::with('account')->get(), 200);
    }

    public function store(StorePPDBRequest $request)
    {
        $register = Register::create([
            'account_id' => $request->user()->id,
            ...$request->validated()
        ]);

        return response()->json([
            'message' => 'Data berhasil disimpan', 
            'data' => $register
        ], 201);
    }

    public function show($id)
    {
        $register = Register::find($id);
        if (!$register) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        return response()->json($register);
    }

    public function update(UpdatePPDBRequest $request, $id)
    {
        $register = Register::find($id);
        if (!$register) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $register->update($request->validated());
        return response()->json([
            'message' => 'Data berhasil diperbarui', 
            'data' => $register
        ]);
    }

    public function destroy($id)
    {
        $register = Register::find($id);
        if (!$register) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $register->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}

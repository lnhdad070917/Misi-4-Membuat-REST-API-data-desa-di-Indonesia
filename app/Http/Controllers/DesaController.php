<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desa;
use Symfony\Component\HttpFoundation\Response;

class DesaController extends Controller
{
    public function index()
    {
        $desa = Desa::select('id', 'name')->get();

        return response()->json($desa);
    }

    public function show($id)
    {
        // $desa = Desa::findOrFail($id);

        // return response()->json($desa);
        $desa = Desa::with('district.kota.provinsi')->findOrFail($id);

        return response()->json($desa);
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'district_code' => 'required',
            'name' => 'required',
        ]);

        $desa = Desa::create($request->all());

        return response()->json($desa, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required',
            'district_code' => 'required',
            'name' => 'required',
        ]);

        $desa = Desa::findOrFail($id);
        $desa->update($request->all());

        return response()->json($desa);
    }

    public function destroy($id)
    {
        $desa = Desa::findOrFail($id);
        $desa->delete();

        return response()->json(null, 204);
    }
}
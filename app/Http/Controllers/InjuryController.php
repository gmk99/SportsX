<?php

namespace App\Http\Controllers;

use App\Models\Injury;
use Illuminate\Http\Request;

class InjuryController extends Controller
{
    public function index()
    {
        $injuries = Injury::paginate(10);
        return response()->json($injuries);
    }

    public function show($id)
    {
        $injury = Injury::findOrFail($id);
        return response()->json($injury);
    }

    public function store(Request $request)
    {
        $request->validate([
            'Denomination' => 'required|string|max:255',
            'Location' => 'required|string|max:255',
            'EstimatedTimeToRecover' => 'required|string|max:255',
        ]);

        $injury = Injury::create($request->all());
        return response()->json($injury, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Denomination' => 'required|string|max:255',
            'Location' => 'required|string|max:255',
            'EstimatedTimeToRecover' => 'required|string|max:255',
        ]);

        $injury = Injury::findOrFail($id);
        $injury->update($request->all());

        return response()->json($injury);
    }

    public function destroy($id)
    {
        $injury = Injury::findOrFail($id);
        $injury->delete();

        return response()->json(null, 204);
    }
}

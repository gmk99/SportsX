<?php

namespace App\Http\Controllers;

use App\Models\Injury;
use Illuminate\Http\Request;

class InjuryController extends Controller
{
    public function index()
    {
        // Fetch injuries and paginate
        $injuries = Injury::paginate(15);

        // Pass injuries to the view
        return view('pages.virtual-reality', compact('injuries'));
    }

    public function edit($id)
    {
        // Find injury by ID
        $injury = Injury::findOrFail($id);

        // Pass injury to the edit view
        return view('pages.injury-edit', compact('injury'));
    }

    public function update(Request $request, $id)
    {
        // Validate request data
        $request->validate([
            'Denomination' => 'required|string|max:255',
            'Location' => 'required|string|max:255',
            'EstimatedTimeToRecover' => 'required|string|max:255',
        ]);

        // Find injury by ID and update
        $injury = Injury::findOrFail($id);
        $injury->update($request->all());

        // Redirect to index with success message
        return redirect()->route('injuries.index')->with('success', 'Injury updated successfully.');
    }

    public function destroy($id)
    {
        // Find injury by ID and delete
        $injury = Injury::findOrFail($id);
        $injury->delete();

        // Redirect to index with success message
        return redirect()->route('injuries.index')->with('success', 'Injury deleted successfully.');
    }
}

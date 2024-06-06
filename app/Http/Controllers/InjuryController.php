<?php

namespace App\Http\Controllers;

use App\Models\Injury;
use Illuminate\Http\Request;

class InjuryController extends Controller
{
public function index()
{
$injuries = Injury::paginate(10);

// Debugging line: Log the injuries variable
\Log::info($injuries);

return view('pages.virtual-reality', ['injuries' => $injuries]);
}

public function edit($id)
{
$injury = Injury::findOrFail($id);
return view('pages.injury-edit', ['injury' => $injury]);
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

return redirect()->route('injuries.index')->with('success', 'Injury updated successfully.');
}

public function destroy($id)
{
$injury = Injury::findOrFail($id);
$injury->delete();

return redirect()->route('injuries.index')->with('success', 'Injury deleted successfully.');
}
}

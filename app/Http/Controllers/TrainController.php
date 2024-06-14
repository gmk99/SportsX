<?php

namespace App\Http\Controllers;

use App\Models\Train;
use Illuminate\Http\Request;
use App\Http\Resources\Train as TrainResource;
use App\Models\Team;

class TrainController extends Controller {

    public function index()
    {
        $trains = Train::paginate(15);
        return view('pages.billing', compact('trains'));
    }

    public function show($id){
        $train = Train::findOrFail($id);
        return new TrainResource($train);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Date' => 'required|date',
            'StartingTime' => 'required|date_format:H:i',
            'EndingTime' => 'required|date_format:H:i',
            'TeamID' => 'required|integer|exists:Team,id',
            'FieldFieldID' => 'required|integer'
        ]);

        $train = new Train;
        $train->Date = $validatedData['Date'];
        $train->StartingTime = $validatedData['Date'] . ' ' . $validatedData['StartingTime'] . ':00'; // Combine date and time
        $train->EndingTime = $validatedData['Date'] . ' ' . $validatedData['EndingTime'] . ':00'; // Combine date and time
        $train->TeamID = $validatedData['TeamID'];
        $train->FieldFieldID = $validatedData['FieldFieldID'];
        $train->save();

        return redirect()->route('billing')->with('success', 'Train created successfully.');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'Date' => 'required|date',
            'StartingTime' => 'required|date_format:H:i',
            'EndingTime' => 'required|date_format:H:i',
            'TeamID' => 'required|integer|exists:Team,id',
            'FieldFieldID' => 'required|integer'
        ]);

        $train = Train::findOrFail($request->id);
        $train->Date = $validatedData['Date'];
        $train->StartingTime = $validatedData['Date'] . ' ' . $validatedData['StartingTime'] . ':00'; // Combine date and time
        $train->EndingTime = $validatedData['Date'] . ' ' . $validatedData['EndingTime'] . ':00'; // Combine date and time
        $train->TeamID = $validatedData['TeamID'];
        $train->FieldFieldID = $validatedData['FieldFieldID'];

        if ($train->save()) {
            return new TrainResource($train);
        }
    }

    public function destroy($id)
    {
        $train = Train::findOrFail($id);
        if ($train->delete()) {
            return new TrainResource($train);
        }
    }

    public function create()
    {
        return view('pages.trains-create');
    }

    public function indexFormatted()
    {
        try {
            $trains = Train::all();

            $formattedTrains = [];

            foreach ($trains as $train) {
                $homeTeam = Team::find($train->TeamID);
                $homeTeamName = $homeTeam ? $homeTeam->name : null;

                $trainStatus = [
                    'trainId' => $train->id,
                    'homeTeamName' => $homeTeamName,
                    'startTime' => $train->StartingTime,
                    'endTime' => $train->EndingTime
                ];

                $formattedTrains[] = $trainStatus;
            }

            return response()->json($formattedTrains);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error occurred while fetching train data.'], 500);
        }
    }
}

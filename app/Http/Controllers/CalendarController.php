<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Train;
use Carbon\Carbon;

class CalendarController extends Controller
{
    public function index(Request $request)
    {
        return view('calendar');
    }

    public function getEvents(Request $request)
    {
        $start = Carbon::parse($request->query('start'));
        $end = Carbon::parse($request->query('end'));

        $games = Game::whereBetween('Date', [$start, $end])->get();
        $trains = Train::whereBetween('Date', [$start, $end])->get();

        $events = [];

        foreach ($games as $game) {
            $events[] = [
                'title' => 'Game: ' . $game->name,
                'start' => $game->Date . 'T' . Carbon::parse($game->StartingTime)->format('H:i:s'),
                'end' => $game->Date . 'T' . Carbon::parse($game->EndingTime)->format('H:i:s'),
                'color' => 'blue'
            ];
        }

        foreach ($trains as $train) {
            $events[] = [
                'title' => 'Train: ' . $train->name,
                'start' => $train->Date . 'T' . Carbon::parse($train->StartingTime)->format('H:i:s'),
                'end' => $train->Date . 'T' . Carbon::parse($train->EndingTime)->format('H:i:s'),
                'color' => 'green'
            ];
        }

        return response()->json($events);
    }
}

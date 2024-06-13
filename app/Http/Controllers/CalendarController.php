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
        $startOfWeek = Carbon::parse($request->query('start'));
        $endOfWeek = Carbon::parse($request->query('end'));

        $games = Game::whereBetween('starting_time', [$startOfWeek, $endOfWeek])->get();
        $trains = Train::whereBetween('starting_time', [$startOfWeek, $endOfWeek])->get();

        $events = [];

        foreach ($games as $game) {
            $events[] = [
                'title' => $game->name,
                'start' => $game->starting_time,
                'end' => $game->ending_time,
                'color' => 'blue'
            ];
        }

        foreach ($trains as $train) {
            $events[] = [
                'title' => $train->name,
                'start' => $train->starting_time,
                'end' => $train->ending_time,
                'color' => 'green'
            ];
        }

        return response()->json($events);
    }
}

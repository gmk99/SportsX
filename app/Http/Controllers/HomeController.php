<?php

namespace App\Http\Controllers;
use App\Http\Controllers\GoalController;
use App\Http\Resources\Goal;
use App\Http\Resources\Player;
use Illuminate\Http\Request;

class HomeController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pages.dashboard');
    }

    public function totalGoals()
    {
        $goalController = new GoalController();
        $bestScorerData = $goalController->bestScorer();

        // Construa uma string com o número total de golos do melhor marcador
        $totalGoalsString = "O melhor marcador é {$bestScorerData['Fullname']} com {$bestScorerData['total_goals']} golos.";

        return $totalGoalsString;
    }
}

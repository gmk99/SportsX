<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CardTypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\GamePlayerController;
use App\Http\Controllers\AssistController;
use App\Http\Controllers\InjuryPlayerController;
use App\Http\Controllers\InjuryController;
use App\Http\Controllers\InjuryPlayerTreatmentController;
use App\Http\Controllers\CoordenatorController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\PhysiotherapistController;
use App\Http\Controllers\TeamPlayerController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamCoachController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\CoachRoleController;
use App\Http\Controllers\TrainController;
use App\Http\Controllers\TeamDirectorController;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// CARD TYPE
Route::get('card-types', [CardTypeController::class, 'index']);
Route::get('card-type/{id}', [CardTypeController::class, 'show']);
Route::post('card-type', [CardTypeController::class, 'store']);
Route::put('card-type/{id}', [CardTypeController::class, 'update']);
Route::delete('card-type/{id}', [CardTypeController::class,'destroy']);

// GAME
Route::get('games', [GameController::class, 'index']);
Route::get('game/{id}', [GameController::class, 'show']);
Route::post('game', [GameController::class, 'store']);
Route::put('game/{id}', [GameController::class, 'update']);
Route::delete('game/{id}', [GameController::class,'destroy']);

// CARD
Route::get('cards', [CardController::class, 'index']);
Route::get('card/{id}', [CardController::class, 'show']);
Route::post('card', [CardController::class, 'store']);
Route::put('card/{id}', [CardController::class, 'update']);
Route::delete('card/{id}', [CardController::class,'destroy']);

// GOAL
Route::get('goals', [GoalController::class, 'index']);
Route::get('goal/{id}', [GoalController::class, 'show']);
Route::post('goal', [GoalController::class, 'store']);
Route::put('goal/{id}', [GoalController::class, 'update']);
Route::delete('goal/{id}', [GoalController::class,'destroy']);

// GAME PLAYER
Route::get('game_players', [GamePlayerController::class, 'index']);
Route::get('game_player/{id}', [GamePlayerController::class, 'show']);
Route::post('game_player', [GamePlayerController::class, 'store']);
Route::put('game_player/{id}', [GamePlayerController::class, 'update']);
Route::delete('game_player/{id}', [GamePlayerController::class,'destroy']);

// ASSIST
Route::get('assists', [AssistController::class, 'index']);
Route::get('assist/{id}', [AssistController::class, 'show']);
Route::post('assist', [AssistController::class, 'store']);
Route::put('assist/{id}', [AssistController::class, 'update']);
Route::delete('assist/{id}', [AssistController::class,'destroy']);

// INJURY PLAYER
Route::get('injury_players', [InjuryPlayerController::class, 'index']);
Route::get('injury_player/{id}', [InjuryPlayerController::class, 'show']);
Route::post('injury_player', [InjuryPlayerController::class, 'store']);
Route::put('injury_player/{id}', [InjuryPlayerController::class, 'update']);
Route::delete('injury_player/{id}', [InjuryPlayerController::class,'destroy']);

// INJURY
Route::get('injuries', [InjuryController::class, 'index']);
Route::get('injury/{id}', [InjuryController::class, 'show']);
Route::post('injury', [InjuryController::class, 'store']);
Route::put('injury/{id}', [InjuryController::class, 'update']);
Route::delete('injury/{id}', [InjuryController::class,'destroy']);

// INJURY PLAYER TREATMENT
Route::get('injury_player_treatments', [InjuryPlayerTreatmentController::class, 'index']);
Route::get('injury_player_treatment/{id}', [InjuryPlayerTreatmentController::class, 'show']);
Route::post('injury_player_treatment', [InjuryPlayerTreatmentController::class, 'store']);
Route::put('injury_player_treatment/{id}', [InjuryPlayerTreatmentController::class, 'update']);
Route::delete('injury_player_treatment/{id}', [InjuryPlayerTreatmentController::class,'destroy']);

// COORDENATOR
Route::get('coordenatores', [CoordenatorController::class, 'index']);
Route::get('coordenator/{id}', [CoordenatorController::class, 'show']);
Route::post('coordenator', [CoordenatorController::class, 'store']);
Route::put('coordenator/{id}', [CoordenatorController::class, 'update']);
Route::delete('coordenator/{id}', [CoordenatorController::class, 'destroy']);

// LEVEL
Route::get('levels', [LevelController::class, 'index']);
Route::get('level/{id}', [LevelController::class, 'show']);
Route::post('level', [LevelController::class, 'store']);
Route::put('level/{id}', [LevelController::class, 'update']);
Route::delete('level/{id}', [LevelController::class, 'destroy']);

// PHYSIOTHERAPIST
Route::get('physiotherapists', [PhysiotherapistController::class, 'index']);
Route::get('physiotherapist/{id}', [PhysiotherapistController::class, 'show']);
Route::post('physiotherapist', [PhysiotherapistController::class, 'store']);
Route::put('physiotherapist/{id}', [PhysiotherapistController::class, 'update']);
Route::delete('physiotherapist/{id}', [PhysiotherapistController::class, 'destroy']);

// TEAM PLAYER
Route::get('team_players', [TeamPlayerController::class, 'index']);
Route::get('team_player/{id}', [TeamPlayerController::class, 'show']);
Route::post('team_player', [TeamPlayerController::class, 'store']);
Route::put('team_player/{id}', [TeamPlayerController::class, 'update']);
Route::delete('team_player/{id}', [TeamPlayerController::class, 'destroy']);

// FIELD
Route::get('fields', [FieldController::class, 'index']);
Route::get('field/{id}', [FieldController::class, 'show']);
Route::post('field', [FieldController::class, 'store']);
Route::put('field/{id}', [FieldController::class, 'update']);
Route::delete('field/{id}', [FieldController::class, 'destroy']);

// TEAM
Route::get('teams', [TeamController::class, 'index']);
Route::get('team/{id}', [TeamController::class, 'show']);
Route::post('team', [TeamController::class, 'store']);
Route::put('team/{id}', [TeamController::class, 'update']);
Route::delete('team/{id}', [TeamController::class, 'destroy']);

// TEAM COACH
Route::get('team_coaches', [TeamCoachController::class, 'index']);
Route::get('team_coach/{id}', [TeamCoachController::class, 'show']);
Route::post('team_coach', [TeamCoachController::class, 'store']);
Route::put('team_coach/{id}', [TeamCoachController::class, 'update']);
Route::delete('team_coach/{id}', [TeamCoachController::class, 'destroy']);

// PLAYER
Route::get('players', [PlayerController::class, 'index']);
Route::get('player/{id}', [PlayerController::class, 'show']);
Route::post('player', [PlayerController::class, 'store']);
Route::put('player/{id}', [PlayerController::class, 'update']);
Route::delete('player/{id}', [PlayerController::class, 'destroy']);

// POSITION
Route::get('positions', [PositionController::class, 'index']);
Route::get('position/{id}', [PositionController::class, 'show']);
Route::post('position', [PositionController::class, 'store']);
Route::put('position/{id}', [PositionController::class, 'update']);
Route::delete('position/{id}', [PositionController::class, 'destroy']);

// CONTACT
Route::get('contacts', [ContactController::class, 'index']);
Route::get('contact/{id}', [ContactController::class, 'show']);
Route::post('contact', [ContactController::class, 'store']);
Route::put('contact/{id}', [ContactController::class, 'update']);
Route::delete('contact/{id}', [ContactController::class, 'destroy']);

// LOGIN
Route::get('logins', [LoginController::class, 'index']);
Route::get('login/{id}', [LoginController::class, 'show']);
Route::post('login', [LoginController::class, 'store']);
Route::put('login/{id}', [LoginController::class, 'update']);
Route::delete('login/{id}', [LoginController::class, 'destroy']);

// COACH
Route::get('coaches', [CoachController::class, 'index']);
Route::get('coach/{id}', [CoachController::class, 'show']);
Route::post('coach', [CoachController::class, 'store']);
Route::put('coach/{id}', [CoachController::class, 'update']);
Route::delete('coach/{id}', [CoachController::class, 'destroy']);

// COACH ROLE
Route::get('coach_roles', [CoachRoleController::class, 'index']);
Route::get('coach_role/{id}', [CoachRoleController::class, 'show']);
Route::post('coach_role', [CoachRoleController::class, 'store']);
Route::put('coach_role/{id}', [CoachRoleController::class, 'update']);
Route::delete('coach_role/{id}', [CoachRoleController::class, 'destroy']);

// TRAIN
Route::get('trains', [TrainController::class, 'index']);
Route::get('train/{id}', [TrainController::class, 'show']);
Route::post('train', [TrainController::class, 'store']);
Route::put('train/{id}', [TrainController::class, 'update']);
Route::delete('train/{id}', [TrainController::class, 'destroy']);

// TEAM DIRECTOR
Route::get('team_directors', [TeamDirectorController::class, 'index']);
Route::get('team_director/{id}', [TeamDirectorController::class, 'show']);
Route::post('team_director', [TeamDirectorController::class, 'store']);
Route::put('team_director/{id}', [TeamDirectorController::class, 'update']);
Route::delete('team_director/{id}', [TeamDirectorController::class, 'destroy']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Games;
use App\GameSaves;
use App\EnvironmentInteractions;
use App\Locations;
use App\Inventory;
use App\Items;
use App\TextCommands;

class APIController extends Controller
{
  // ---- --- -------- ----
  // ---- API Requests ----
  // ---- --- -------- ----
  //Creates a new game with the specified game name. Returns the game id and the default information.
  public function Begin(Request $request)
  {
    $new_game = new Games();
    $start_location = Locations::where('id', 1)->first();
    $new_game->currentLocation()->associate($start_location);
    $new_game->name = $request->header('game-name');
    $new_game->save();

    $user_response = $this->DefaultResponse($new_game->id);
    return response()->json(['game-id' => $new_game->id, 'user-response' => $user_response]);
  }

  public function Play(Request $request)
  {
    /*
    $game_id = $request->header('game-id');
    $user_request[] = explode(" ", $request->header('user-request'));
    switch($user_request[0])
    {
      case "go":
        switch($user_request[1])
        {
          case "up":
            break;
          case "down":
            break;
          case "north":
            break;
          case "south":
            break;
          case "east":
            break;
          case "west":
            break;
          case "in":
            break;
          case "out":
            break;
        }
        break;
      case "look":
        break;
      case "examine":
        break;
      case "take":
        break;
      case "drop":
        break;
      case "kill":
        break;
      case "wait":
        break;
      case "wear":
        break;
      case "use":
        break;
      case "help":
        break;
      case "inventory":
        break;
      case "save":
        break;
      case "load":
        break;
      case "reset":
        break;
      case "quit":
        break;
    }
    */
  }

  //Deletes game information for the specified game id. Thanks the user for playing.
  public function End(Request $request)
  {
    $game_id = $request->header('game-id');
    Inventory::where('game_id', $game_id)->delete();
    GameSaves::where('game_id', $game_id)->delete();
    TextCommands::where('game_id', $game_id)->delete();
    EnvironmentInteractions::where('game_id', $game_id)->delete();
    Games::where('id', $game_id)->delete();

    $user_response = "Your game has ended. Thank's for playing Beocat Break In!";
    return response()->json(['game-id' => $request->game_id, 'user-response' => $user_response]);
  }



  // ---- ---- ----- ----
  // ---- Game Logic ----
  // ---- ---- ----- ----
  //Generates a string with the current location, visible items in the location, and the exits.
  public function DefaultResponse($game_id){
    $current_game = Games::with('currentLocation')->where('id', $game_id)->first();
    $response = $current_game->currentLocation->properties;
    $response .= " Outs are ".$current_game->currentLocation->outs;
    return $response;
  }
}

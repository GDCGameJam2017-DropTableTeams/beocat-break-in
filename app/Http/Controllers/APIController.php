<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Commands;
use App\Games;
use App\GameSaves;
use App\EnvironmentInteractions;
use App\Locations;
use App\Inventory;
use App\Items;
use App\Outs;
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
    if($request->header('alexa-id') != null){
      $new_game->alexa_id = $request->header('alexa-id');
      $this->DeleteGame($request->header('alexa-id'));
    }
    $new_game->name = $request->header('game-name');
    $new_game->save();

    $intro = "";
    //$intro = "You’re the systems administrator on duty in the K-State Computer Science department and you just got the call that someone broke in and destroyed Beocat, the second largest supercomputing cluster in Kansas. It’s up to you to find and repair Beocat to get it back up and running. You’ll need resources from different engineering disciplines to accomplish the task at hand. Good luck!";
    $user_response = $this->DefaultResponse($new_game->id);
    return response()->json(['game-id' => $new_game->id, 'intro' => $intro, 'user-response' => $user_response]);
  }

  public function Play(Request $request)
  {
    $game_id = $this->GetGame($request->header('game-id'))->id;
    $user_request[] = explode(" ", strtolower($request->header('user-request')));
    switch($user_request[0])
    {
      case "go":
      case "move":
        switch($user_request[1])
        {
          case "up":    //go/move up
          case "down":  //go/move down
          case "north": //go/move north
          case "south": //go/move south
          case "east":  //go/move east
          case "west":  //go/move west
          case "in":    //go/move in
          case "out":   //go/move out
            $user_response = $this->Move($game_id, $alexa_id, $user_request[1]);
            break;
          default:
            $user_response = "I don't know where that is.";
            break;
        }
        break;
      case "look":      //look at x
      case "examine":   //examine x
        $user_response = $this->Examine($game_id, $alexa_id, $user_request[1]);
        break;
      case "take":      //take x
        break;
      case "drop":      //drop x
        break;
      case "kill":      //kill the? x
        break;
      case "wait":      //wait
        $user_response = $this->Wait($game_id);
        break;
      case "wear":      //wear x
        break;
      case "use":       //use x on? y?
        break;
      case "help":      //help
      case "commands":  //commands
        $user_response = $this->Commands($game_id);
        break;
      case "inventory": //inventory
        $user_response = $this->Inventory($game_id);
        break;
      case "save":      //save
        $user_response = $this->Save($game_id);
        break;
      case "load":      //load
        $user_response = $this->Load($game_id);
        break;
      case "reset":     //reset
        $user_response = $this->Reset($game_id);
        break;
      case "quit":      //quit
        $user_response = $this->Quit($game_id);
        break;
    }
    return response()->json(['game-id' => $game_id, 'user-response' => $user_response]);
  }

  //Deletes game information for the specified game id. Thanks the user for playing.
  public function End(Request $request)
  {
    $this->DeleteGame($request->header('game-id'));
    $user_response = "Your game has ended. Thank's for playing Beocat Break In!";
    return response()->json(['game-id' => $request->game_id, 'user-response' => $user_response]);
  }



  // ---- ---- ----- ----
  // ---- Game Logic ----
  // ---- ---- ----- ----
  //Returns the current game.
  public function GetGame($game_id){
    if(is_int($game_id)){
      return Games::with('currentLocation')->where('id', $game_id)->first();
    } else {
      return Games::with('currentLocation')->where('alexa_id', $game_id)->first();
    }
  }

  public function DeleteGame($game_id){
    $game_id = $this->GetGame($game_id)->id;
    Inventory::where('game_id', $game_id)->delete();
    GameSaves::where('game_id', $game_id)->delete();
    TextCommands::where('game_id', $game_id)->delete();
    EnvironmentInteractions::where('game_id', $game_id)->delete();
    Games::where('id', $game_id)->delete();
  }

  //Generates a string with the current location, visible items in the location, and the exits.
  public function DefaultResponse($game_id){
    $current_game = $this->GetGame($game_id);
    $user_response = $current_game->currentLocation->properties;
    $user_response .= " Outs are: ".$current_game->currentLocation->outs;
    return $user_response;
  }

  //Moves the player.
  public function Move($game_id, $direction){
    $current_game = $this->GetGame($game_id);
    $outs = $current_game->currentLocation->outs;
    $user_response;
    if (strpos(strtolower($outs), $direction) !== false) {
      $new_location = Outs::with('currentLocation', 'nextLocation')->where('currentLocation', $current_game->currentLocation)->where('out', $direction)->first();
      $current_game->currentLocation()->associate($new_location);
      $user_response = $this->DefaultResponse($game_id);
    } else {
      $user_response = "You can't go that way! Outs are: ".$outs;
    }
    $default = $this->DefaultResponse($game_id);
    return $user_response." ".$default;
  }

  //Looks at something
  public function Examine($game_id, $at_what){

  }

  public function Wait($game_id){
    $user_response = "Congradulations! You just wasted your turn.";
    $default = $this->DefaultResponse($game_id);
    return $user_response." ".$default;
  }

  //Returns all game commands.
  public function Commands($game_id){
    $commands = Commands::all();
    $user_response = "Valid commands are: ";
    $names = array();
    foreach($commands as $command){
      $names[] = $command->name;
    }
    $user_response .= implode($names);
    $default = $this->DefaultResponse($game_id);
    return $user_response." ".$default;
  }

  //Returns the players inventory.
  public function Inventory($game_id){
    $current_game = $this->GetGame($game_id);
    $inventory = Inventory::with('itemId', 'gameId', 'gameSaveId')->where('gameId', $current_game->id)->get();
    $user_response = "Your inventory contains: ";
    $names = array();
    foreach($inventory as $item){
      $names[] = $item->name;
    }
    $user_response .= implode($names);
    $default = $this->DefaultResponse($game_id);
    return $user_response." ".$default;
  }

  //Saves the game.
  public function Save($game_id){
    $current_game = $this->GetGame($game_id);
    if($current_game->game_saves < 3){
      $current_save = GameSaves::where('gameId', $current_game->id)->delete();
      $new_save = new GameSaves();
      $new_save->gameId()->associate($current_game);
      $new_save->currentLocation()->associate($current_game->currentLocation);
      $new_save->save();
      $current_game->game_saves++;
      $current_game->save();
      $saves_left = 3 - $current_game->game_saves;
      $user_response = "You have saved the game! You have ".$saves_left." game saves left.";
    } else {
      $user_response = "You don't have any save games left!";
    }
    $default = $this->DefaultResponse($game_id);
    return $user_response." ".$default;
  }

  //Loads the most recent save.
  public function Load($game_id){
    $current_game = $this->GetGame($game_id);
    $latest_save = GameSaves::where('gameId', $current_game->id)->first();
    //TODO
  }

  //Resets the game
  public function Reset($game_id){

  }

  //Quits the game
  public function Quit($game_id){

  }
}

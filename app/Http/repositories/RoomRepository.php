<?php

namespace App\Http\repositories;

use App\Http\interfaces\CrudInterface;
use App\Http\Resources\RoomResource;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomRepository implements CrudInterface{

    public function index(){

        $allRooms = Room::with('category')->paginate(3);
        //$allRooms = RoomResource::collection($allRooms); //did not show pagination
        $allRooms = new RoomResource($allRooms);
        
        return $allRooms;
    }

    public function show($id){
        $singleRoom = Room::with('category')->where('id', $id)->firstOrFail();
        $singleRoom = new RoomResource($singleRoom);
        
        return $singleRoom;
    }

    public function store(Request $request){

    }

    public function update(Request $request, $id){

    }

    public function delete($id){
        
    }
};
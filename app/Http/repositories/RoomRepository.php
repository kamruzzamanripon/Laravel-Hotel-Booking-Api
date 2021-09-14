<?php

namespace App\Http\repositories;

use App\Http\interfaces\CrudInterface;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomRepository implements CrudInterface{

    public function index(){

        $allRooms = Room::with('category')->paginate(10);
        return $allRooms;
    }

    public function show($id){

    }

    public function store(Request $request){

    }

    public function update(Request $request, $id){

    }

    public function delete($id){
        
    }
};
<?php

namespace App\Http\repositories;

use App\Http\Controllers\API\RoomController;
use App\Http\interfaces\CrudInterface;
use App\Http\Resources\RoomResource;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoomRepository implements CrudInterface{

    public function index(){

        $allRooms = Room::with('category')->paginate(3);
        $allRooms = RoomResource::collection($allRooms)->response()->getData(true); 
        //$allRooms = new RoomResource($allRooms);
    
        return $allRooms;
    }

    
    public function show($id){
        $singleRoom = Room::with('category')->where('id', $id)->firstOrFail();
        $singleRoom = new RoomResource($singleRoom);
        
        return $singleRoom;
    }


    public function store(Request $request){
        //Storage Image 
        if($request->hasFile('image')){
            $destination_path = 'public/image/room';
            $image = $request->file('image');
            //$image_name = $image->getClientOriginalName();
            $image_name = Carbon::now()->toDateString()."_".rand(666561, 544614449)."_.".$request->image->getClientOriginalExtension();
            $path = $request->file('image')->storeAs($destination_path, $image_name);
        }
        
        
        $newRoom = new Room;

        $newRoom->room_name = $request->room_name;
        $newRoom->pricePerNight = $request->pricePerNight;
        $newRoom->description = $request->description;
        $newRoom->address = $request->address;
        $newRoom->guestCapacity = $request->guestCapacity;
        $newRoom->numOfBeds = $request->numOfBeds;
        $newRoom->internet = $request->internet ? $request->internet : false;
        $newRoom->breakfast = $request->breakfast ? $request->breakfast : false;
        $newRoom->airConditioned = $request->airConditioned ? $request->airConditioned : false;
        $newRoom->petsAllowed = $request->petsAllowed ? $request->petsAllowed : false;
        $newRoom->roomCleaning = $request->roomCleaning ? $request->roomCleaning : false;
        $newRoom->image = isset($image_name) ? 'storage/image/room/' . $image_name : '' ;
        $newRoom->category_id = $request->category_id;
        //$newRoom->user_id = auth()->user()->id;
        $newRoom->save();
        $newRoom = new RoomResource($newRoom);

        return $newRoom;
    }


    public function update(Request $request, $id){
        
        $singleRoomUpdate = Room::findOrFail($id);

            if($request->hasFile('image')){
                    
                if($singleRoomUpdate->image){
                unlink( $singleRoomUpdate->image);
                }

                $destination_path = 'public/image/room';
                $image = $request->file('image');
                $image_name = Carbon::now()->toDateString()."_".rand(666561, 544614449)."_.".$request->image->getClientOriginalExtension();
                $path = $request->file('image')->storeAs($destination_path, $image_name);
            }
        
            $singleRoomUpdate->room_name = $request->room_name ?? $singleRoomUpdate->room_name;
            $singleRoomUpdate->pricePerNight = $request->pricePerNight ??  $singleRoomUpdate->pricePerNight;
            $singleRoomUpdate->description = $request->description ?? $singleRoomUpdate->description;
            $singleRoomUpdate->address = $request->address ?? $singleRoomUpdate->address;
            $singleRoomUpdate->guestCapacity = $request->guestCapacity ?? $singleRoomUpdate->guestCapacity;
            $singleRoomUpdate->numOfBeds = $request->numOfBeds ?? $singleRoomUpdate->numOfBeds;
            $singleRoomUpdate->internet = $request->internet ?? $singleRoomUpdate->internet;
            $singleRoomUpdate->breakfast = $request->breakfast ?? $singleRoomUpdate->breakfast;
            $singleRoomUpdate->airConditioned = $request->airConditioned ?? $singleRoomUpdate->airConditioned;
            $singleRoomUpdate->petsAllowed = $request->petsAllowed ?? $singleRoomUpdate->petsAllowed;
            $singleRoomUpdate->roomCleaning = $request->roomCleaning ?? $singleRoomUpdate->roomCleaning;
            $singleRoomUpdate->image = isset($image_name) ? 'storage/image/room/' . $image_name : $singleRoomUpdate->image ;
            $singleRoomUpdate->category_id = $request->category_id ?? $singleRoomUpdate->category_id; 
            $singleRoomUpdate->save();
            $singleRoomUpdate = new RoomResource($singleRoomUpdate);;

            return $singleRoomUpdate;
          
            
    }


    public function delete($id){
        $singleRoomDelete = Room::where('id', $id)->first();
            $image = $singleRoomDelete->image;
            if($image){
                unlink($image);
            }

            $singleRoomDelete->delete();

        return $singleRoomDelete;
    }
    
};
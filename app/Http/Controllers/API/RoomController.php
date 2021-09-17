<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\repositories\RoomRepository;
use App\Http\Requests\RoomRequest;
use App\Models\Room;
use Exception;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public $RoomRepository;

    public function __construct(RoomRepository $RoomRepository)
    {
        $this->RoomRepository = $RoomRepository;
    }

    public function index()
    {
        try{
            $allRoom = $this->RoomRepository->index();

            return response()->json([
                'success' => true,
                'message' => 'All Room List',
                'data'    => $allRoom
            ],200);
        }catch(Exception $e){
            return response()->json([
                'message' => "Something went really wrong!"
            ],500);
        }
    }

    public function singleRoomDetails($id)
    {
        try{
            $singleRoom = $this->RoomRepository->show($id);

            return response()->json([
                'success' => true,
                'message' => $singleRoom->room_name . ' Show Details',
                'data'    => $singleRoom
            ],200);
        }catch(Exception $e){
            return response()->json([
                'message' => "Something went really wrong!"
            ],500);
        }
    }

    public function singleRoomCreate(RoomRequest $request)
    {
        try{
            $newRoom = $this->RoomRepository->store($request);

            return response()->json([
                'success' => true,
                'message' => $newRoom->room_name . ' Created Done',
                'data'    => $newRoom
            ],200);
        }catch(Exception $e){
            return response()->json([
                'message' => "Something went really wrong!"
            ],500);
        }
    }

    public function singleRoomUpdate(RoomRequest $request, $id)
    {
        try{
            $singleRoomUpdate = $this->RoomRepository->update($request, $id);
            return response()->json([
                'success' => true,
                'message' => $singleRoomUpdate->room_name.' Room is updated',
                'data'    => $singleRoomUpdate
            ],200);
        }catch(Exception $e){
            return response()->json([
                'message' => "Something went really wrong!"
            ],500);
        }
    }


    public function singleRoomDelete($id)
    {
        try{
            $singleRoomDelete = $this->RoomRepository->delete($id);
            return response()->json([
                'success' => true,
                'message' => $singleRoomDelete->room_name.' Room is now deleted',
                'data'    => $singleRoomDelete
            ],200);
        }catch(Exception $e){
            return response()->json([
                'message' => "Something went really wrong!"
            ],500);
        }
    }

    
}

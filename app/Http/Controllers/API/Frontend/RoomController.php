<?php

namespace App\Http\Controllers\API\Frontend;

use App\Http\Controllers\Controller;
use App\Http\repositories\RoomRepository;
use App\Models\Room;
use Exception;


class RoomController extends Controller
{
    public $RoomRepository;

    public function __construct(RoomRepository $RoomRepository)
    {
        $this->RoomRepository = $RoomRepository;
    }

    public function index()
    {
        //try to comment data for line
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
                'message' => 'All Room List',
                'data'    => $singleRoom
            ],200);
        }catch(Exception $e){
            return response()->json([
                'message' => "Something went really wrong!"
            ],500);
        }
    }

    
}

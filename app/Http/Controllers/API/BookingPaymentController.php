<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\repositories\BookingRoomRepository;
use App\Http\Requests\BookingRoom;
use App\Models\Booking;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingPaymentController extends Controller
{
    public $BookingRoomRepository;

    public function __construct(BookingRoomRepository $BookingRoomRepository)
    {
        $this->BookingRoomRepository = $BookingRoomRepository;
    }

    public function bookingRoom(Request $request)
    {
        
        try{
            if(Auth::check()){

                $Booking = $this->BookingRoomRepository->bookingRoom($request);
               
                return response()->json([
                    'success' => true,
                    'message' => 'Room Available information',
                    'data'    => $Booking
                ],200);
            }else{
                return response()->json([
                    'success' => false,
                    'message' => 'Please Login First',
                ],403);
            }

        }catch(Exception $e){
            return response()->json([
                'message' => "Something went really wrong!"
            ],500);
        }

       
    }



    public function bookingDateCollection($id)
    {
        

        try{
            if(Auth::check()){
                $BookingDateCollection = $this->BookingRoomRepository->bookingDate($id);
               
                return response()->json([
                    'success' => true,
                    'message' => 'Specific Room booking all data collection',
                    'data'    => $BookingDateCollection
                ],200);
                
            }else{
                return response()->json([
                    'success' => false,
                    'message' => 'Please Login First',
                ],403);
            }

        }catch(Exception $e){
            return response()->json([
                'message' => "Something went really wrong!"
            ],500);
        }
    }
}

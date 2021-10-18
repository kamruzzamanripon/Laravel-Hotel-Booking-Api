<?php

namespace App\Http\repositories;

use App\Models\Booking;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class BookingRoomRepository{

    public function bookingRoom($request)
    {
        //$exitsRoom = Booking::where('room_id', '=',$request->room_id)->first();
            $dateCheckin = date($request->checkin);
            $dateCheckout = date($request->checkout);
            $exitsRoom = Booking::
                    where('room_id', '=',$request->id)
                    ->where(function($query) use ($dateCheckin, $dateCheckout){
                        $query->where([
                            ['checkInDate', '<=', $dateCheckin],
                            ['checkOutDate', '>=', $dateCheckin]
                        ])
                        ->orWhere([
                            ['checkInDate', '<', $dateCheckout],
                            ['checkOutDate', '>=', $dateCheckout]
                        ])
                        ->orWhere([
                            ['checkInDate', '>=', $dateCheckin],
                            ['checkOutDate', '<', $dateCheckout]
                        ]);
                    })
                
                  ->get();
        
        if($exitsRoom->isEmpty()){

            // $checkInDate = new DateTime (date('Y-m-d', strtotime($checkInDate))); 
            // $checkOutDate = new DateTime (date('Y-m-d', strtotime($checkOutDate)));
            // $difference = $checkInDate->diff($checkOutDate);
            // $daysOfStay    = $difference->d + 1;
           
            // $Booking = new Booking();
          
            // $Booking->checkInDate = $checkInDate;
            // $Booking->checkOutDate = $checkOutDate;
            // $Booking->daysOfStay = $daysOfStay;
            // $Booking->user_id = Auth::check() ? Auth::user()->id : null;
            // //$Booking->payment_id = $request->payment_id;
            // $Booking->room_id = $roomId;
            // $Booking->save();

            return $exitsRoom="Room is Available";

        }else{
            
            //return $Booking = "Room Already Book";
            return $exitsRoom;
        }
        

    }

    public function bookingDate($id)
    {
       
         $AllCheckInDate = $AllCheckInDate = Booking::where('room_id', '=',$id)->select('checkInDate','checkOutDate')->orderBy('checkInDate', 'asc')->get();
       
         foreach ($AllCheckInDate as $AllCheckInDate) {
               
                    $report_starting_date=date($AllCheckInDate['checkInDate']);
                    $report_ending_date=date($AllCheckInDate['checkOutDate']);
                    $report_starting_date1=date('Y-m-d',strtotime($report_starting_date.'-1 day'));
                    while (strtotime($report_starting_date1)<strtotime($report_ending_date))
                    {

                        $report_starting_date1=date('Y-m-d',strtotime($report_starting_date1.'+1 day'));
                        $dates[]=$report_starting_date1;
                    } 
        
         }


         
         
         return $dates;
    }
}


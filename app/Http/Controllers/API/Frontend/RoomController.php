<?php

namespace App\Http\Controllers\API\Frontend;

use App\Http\Controllers\Controller;
use App\Http\repositories\RoomRepository;
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
        $allRoom = $this->RoomRepository->index();

        return response()->json([
            'success' => true,
            'message' => 'Project List',
            'data'    => $allRoom
        ],200);
    }
}

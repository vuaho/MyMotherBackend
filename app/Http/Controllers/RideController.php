<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Ride;

class RideController extends Controller
{
    public function getRide(Request $request,$id) {
        return response()->json(User::findOrFail($id)->rides(), 200, $headers);
    }

    public function bookRide(Request $request) {
        $ride = new Ride;
        $input = $request->all();
        foreach ($request as $key => $value) {
            $ride[$key] = $input[$key];
        }
        $ride->live_stream_id = Crypt::encrypt($input['kid_id'].$input['start_time']);
        return response('Success',200);
    }

    public function cancelRide(Request $request,$id) {
        $ride = Ride::findOrFail($id);
        $ride->status = 'cancelled';
        $ride->save();
        return response()->json($ride, 200);
    }

    public function editRide(Request $request,$id) {
        $ride = Ride::findOrFail($id);
        $ride->
        $ride->save();
        return response()->json($ride, 200);
    }

    
}

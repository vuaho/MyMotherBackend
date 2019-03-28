<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Ride;
use App\LocationTracker;
use Pusher\Laravel\Facades\Pusher;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Crypt;

class RideController extends Controller
{
    public function getRide(Request $request,$id) {
        return response()->json(Ride::findOrFail($id), 200);
    }

    public function bookRide(Request $request) {
        $ride = new Ride;
        $input = $request->all();
        foreach ($input as $key => $value) {
            $ride[$key] = $input[$key];
        }
        $security = Crypt::encrypt($input['kid_id'].$input['start_time']);
        $ride->locationChannel = $security;
        $ride->live_stream_id = $security;
        $faker = Faker\Factory::create();
        $ride->password = $faker->name;
        $ride->save();
        return response('Success',200);
    }

    public function listRideOfUser(Request $request, $id) {
        return response()->json(User::findOrFail($id)->rides(),  200);
    }

    public function cancelRide(Request $request,$id) {
        $ride = Ride::findOrFail($id);
        $ride->status = 'cancelled';
        $ride->save();
        return response()->json($ride, 200);
    }

    public function editRide(Request $request,$id) {
        $ride = Ride::findOrFail($id);
        foreach ($request as $key => $value) {
            $ride[$key] = $input[$key];
        }
        $ride->save();
        return response()->json($ride, 200);
    }

    public function updateLocation(Request $request) {
        $newLocation = new LocationTracker;
        $newLocation->lat = $request->lat;
        $newLocation->long = $request->long;
        $newLocation->speed = $request->speed;
        $newLocation->accuracy = $request->accuracy;
        $newLocation->direction = $request->direction;
        $newLocation->ride_id = $request->ride_id;
        $newLocation->save();
        Pusher::trigger(Ride::findOrFail($request->ride_id)->first()->location_channel, 'new_location_tracker', json_encode($newLocation));
    }
}

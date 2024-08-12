<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Contract;
use App\Models\room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function room_details(string $id){
        $room = room::find($id);
        return view('home.room_details',compact('room'));
    }
    public function room_booking(Request $request, string $id){
        $request ->validate([
            'startDate'=>'required|date',
            'endDate'=>'required|date|after:startDate',
        ]);
        $data = new Booking;
        $data->room_id = $id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        $startDate = $request->startDate;
        $endDate = $request->endDate;

        $isBooked = Booking::where('room_id',$id)
        ->where('start_date','<=',$endDate)
        ->where('end_date','>=',$startDate)->exists();

        if ($isBooked) {
            return redirect()->back()->with('success', 'Room Already Booked. Please try different date');
        }

        else {
            $data->start_date = $request->startDate;
            $data->end_date = $request->endDate;
            $data->save();
            return redirect()->back()->with('success', 'Room Booking successfully');
        }   
    }

    public function contact(Request $request){
        $data= $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required|numeric',
            'message'=>'required',
        ]);


        Contract::create($data);
        return redirect()->back()->with('success','message successfully sent to Admin');
    }









}

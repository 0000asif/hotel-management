<?php

namespace App\Http\Controllers;

use File;
use App\Models\room;
use App\Models\User;
use App\Models\Booking;
use App\Models\Gallery;
use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;

class AdminController extends Controller
{
    public function welcome(){
    $room = room::all();
    $gallery = Gallery::all();
    return view('home.index',compact('room','gallery'));
    }

    public function index(){
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            if ($usertype == 'user') {
                $room = room::all();
                $gallery = Gallery::all();
                return view('home.index',compact('room','gallery'));
            }
            elseif($usertype == 'admin') {
                return view('admin.index');
            }
            else {
                return redirect()->back();
            }
        }
    }
    public function add_room(Request $request){
        $request->validate([
            'room_title'=> 'required',
            'description'=> 'required',
            'price'=> 'required',
            'photo'=> 'required|max:3000',
            'room_type'=> 'required',
            'wifi'=> 'required',
        ]);
        $path = $request->file('photo')->store('admin/room','public');

        $data = new room;
        $data->room_title = $request->room_title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->room_type = $request->room_type;
        $data->wifi = $request->wifi;
        $data->image = $path;



        $data->save();
        return redirect()->route('home');
    }

    public function show_room(){
        $rooms= room::all();
        return view('admin.room.show',compact('rooms'));
    }

    public function single_room(String $id){
        $room = room::find($id);
        return view('admin.room.single_room',compact('room'));
    }

    public function edit_room(string $id){
        $room = room::find($id);
        return view('admin.room.edit_room',compact('room'));
    }

    public function update_room(Request $request , string $id){
        //return $request;
        $data = room::find($id);
        $request->validate([
            'room_title'=> 'required',
            'description'=> 'required',
            'price'=> 'required',
            'photo'=> 'max:3000',
            'room_type'=> 'required',
            'wifi'=> 'required',
        ]);
        if ($request->hasFile('photo')) {

            $image_path = public_path("storage/").$data->image;
        
            if(file_exists($image_path)){
            @unlink($image_path);
            }
        $path = $request->file('photo')->store('admin/room','public');
        $data->image = $path;
        $data->save();
        }
        $data->room_title = $request->room_title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->room_type = $request->room_type;
        $data->wifi = $request->wifi;
        $data->save();
        return redirect()->route('room.show');
    }


    public function delete_room(string $id){
        $data = room::find($id);
        $data -> delete();

        $image_path = public_path("storage/").$data->image;
        
        if(file_exists($image_path)){
            @unlink($image_path);
        }

        return redirect()->route('room.show')->with('success','photo deleted');
    }

    public function delete_allroom(){
        $data = room::all();
        
        foreach ($data as $photo) {
            // Delete the image from the server
            $image_path = public_path("storage/").$photo->image;
            unlink($image_path);
        
            room::truncate();
            
        }
        return redirect()->route('room.show');
    }

    public function show_booking(){
        $bookings = Booking::all();
        return view('admin.booking.show',compact('bookings'));
    }

    public function delete_booking(String $id){
        $Booking = Booking::find($id);
        $Booking->delete();
        return redirect()->route('show_booking')->with('success','Successfully Delete data form record');
    }


    public function booking_approve(String $id){
        $booking = Booking::find($id);
        $booking->status = 'approve';
        $booking->save();
        return redirect()->back();
    }
    
    public function booking_reject(String $id){
        $booking = Booking::find($id);
        $booking->status = 'reject';
        $booking->save();
        return redirect()->back();
    }

    public function show_gallery(){
        $gallries = Gallery::all();
        return view('admin.gallery.show',compact('gallries'));
    }

    public function upload_gallery(Request $request){
        $request->validate([
            'photo'=>'required|max:3000',
        ]);
        $data = new Gallery;
        $path = $request->file('photo')->store('admin/gallery','public');

        $data->image = $path;
        $data->save();
        return redirect()->back()->with('success','Image uploaded successfully');
    }

    public function delete_gallery(string $id){
        $data= Gallery::find($id);
        $image_path = public_path("storage/").$data->image;
        
        if(file_exists($image_path)){
            @unlink($image_path);
        }
        $data->delete();
        return redirect()->route('show_gallery')->with('success','photo Deleted');
    }
    public function show_contact(){
        $contacts = Contract::all();
        return view('admin.contact.show',compact('contacts'));
    }


    public function sent_mail(string $id){
        return view('admin.contact.sent_mail');
    }





}

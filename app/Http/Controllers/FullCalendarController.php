<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class FullCalendarController extends Controller
{
    
    public function index(Request $request)
    {
  
        if($request->ajax()) {
       
             $data = Event::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
                       ->get(['id', 'title', 'start', 'end', 'description', 'seen_by', 'image']);
  
             return response()->json($data);
        }
  
        // return view('super-admin.home');
    }

    public function indexStudent(Request $request)
    {
  
        if($request->ajax()) {
       
             $data = Event::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
                       ->where('seen_by', 'everyone')
                       ->get(['id', 'title', 'start', 'end', 'description', 'seen_by','image']);
  
             return response()->json($data);
        }
  
        // return view('super-admin.home');
    }
 
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function ajax(Request $request)
    {
 
        switch ($request->type) {
           case 'add':
              $seenBy = $request->seen_by;
              if($seenBy==NULL){
                  $seenBy = 'everyone';
              }
              $image = $request->image;
              if($image){
                  $imageName = time().'_'.$image->getClientOriginalName();
                  $destinationPath = public_path('/images/event');
                  $image->move($destinationPath, $imageName);
              }
              else
              {
                  $imageName = "default.png";
              }
              $event = Event::create([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
                  'description' => $request->description,
                  'seen_by' => $seenBy,
                  'image' => $imageName
              ]);
 
              return response()->json($event);
             break;
  
           case 'update':
              $event = Event::find($request->id)->update([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);
 
              return response()->json($event);
             break;

           case 'updateEventDetails':
              $event =  Event::find($request->eventId);
              $seenBy = $request->seen_by;
              if($seenBy==NULL){
                $seenBy = 'everyone';
              }
              $image = $request->image;
              if($image){
                  $imageName = time().'_'.$image->getClientOriginalName();
                  $destinationPath = public_path('/images/event');
                  $image->move($destinationPath, $imageName);
              }
              else
              {
                  $imageName = $event->image;
              }
              $event->update([
                'title' => $request->title,
                'start' => $request->start,
                'end' => $request->end,
                'description' => $request->description,
                'seen_by' => $seenBy,
                'image' => $imageName
              ]);

              return response()->json($event);
              break;
  
           case 'delete':
              $event = Event::find($request->id)->delete();
  
              return response()->json($event);
             break;
             
           default:
             # code...
             break;
        }
    }

}

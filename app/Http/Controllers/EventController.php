<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Event::all();
        //dd($data);
        return view('listevent',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eventadd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:255',
            'start_date'=>'required',
            'end_date'=>'required',
            'frequency'=>'required',
            'interval'=>'required',
        ]);
        Event::create([
            'title'=>$request->title,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'frequency'=>$request->frequency,
            'interval'=>$request->interval,
        ]);
        return redirect()->route('list.event');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Event::find($id);
        $start_date=Carbon::createFromFormat('Y-m-d',$data->start_date);
        $end_date=Carbon::createFromFormat('Y-m-d',$data->end_date);
        $interval_days=$start_date->diffInDays($end_date);
        $frequency=$data->frequency*$data->interval;
        $occurance=intval($interval_days/$frequency);
        $dates=[];
        $add_days=$frequency;
        for ($i=0; $i < $occurance; $i++) { 
            $new=Carbon::createFromFormat('Y-m-d',$data->start_date)->addDays($add_days); 
            $date=date("d-m-Y",strtotime($new));
            $day=Carbon::parse($date)->format('l');
            $add_days=$add_days+$frequency;
            array_push($dates,array($date,$day));
        }
        return view('viewevent',compact('dates','data','occurance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Event::find($id);
        return view('editevent',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required|max:255',
            'start_date'=>'required',
            'end_date'=>'required',
            'frequency'=>'required',
            'interval'=>'required',
        ]);
        $data=Event::find($id);
        $data->update([
            'title'=>$request->title,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'frequency'=>$request->frequency,
            'interval'=>$request->interval,
        ]);
        return redirect()->route('list.event');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Event::find($id);
        if ($data->delete()) {
            return redirect()->route('list.event');
        }
    }
}

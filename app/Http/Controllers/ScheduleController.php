<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Customer;
use App\Models\Team;

use Illuminate\Http\Request;
// reference the Dompdf namespace
use Dompdf\Dompdf;
use Barryvdh\DomPDF\Facade\Pdf;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $schedules = Schedule::paginate(20);
        return view('schedule.index', [
            'schedules' => $schedules
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schedule.form', [
            'schedule' => new Schedule(),
            'customers' => Customer::orderBy('name')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'id' => 'nullable',

            'customer_id' => 'required',
            'schedule_type' => 'required',
            'arrival_date' => 'required',
            'arrival_flight_info' => 'nullable',
            'departure_flight_info' => 'nullable',
            

            'pax' => 'required',

            'mekkah_night' => 'required|numeric',
            'madinah_night' => 'required|numeric',


            'mekkah_date' => 'required',
            'mekkah_hotel' => 'nullable',
            'mekkah_room_info' => 'nullable',
            'mekkah_snack_contanct_person' => 'nullable',
            'mekkah_snack_description' => 'nullable',
            'mekkah_note' => 'nullable',
            
            'madinah_date' => 'required',
            'madinah_hotel' => 'nullable',
            'madinah_room_info' => 'nullable',
            'madinah_snack_contanct_person' => 'nullable',
            'madinah_snack_description' => 'nullable',
            'madinah_note' => 'nullable',

        ]);

        $scheduleId = $validated['id'] ?? null;

        $schedule = Schedule::updateOrCreate(
            ['id' => $scheduleId],
            $validated
        );  

        return redirect(
            $schedule->wasRecentlyCreated 
                ? route('schedule.index') 
                    : route('schedule.edit', $schedule->id)
            )
            ->with('status', 'success')
            ->with('message', 'Data saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        return view('schedule.form', [
            'schedule' => $schedule,
            'customers' => Customer::orderBy('name')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        //
    }

    public function manage(Schedule $schedule)
    {
        return view('schedule.manage', [
            'schedule' => $schedule,
            'teams' => Team::where('status', 'ON')->get()
        ]);
    }
    
    public function main(Request $request)
    {
        $schedules = Schedule::
            when($request->date ?? date('Y-m-d'), function($query, $date){
                return $query->whereDate('arrival_date', $date);
            })
            ->get();
        
        if($request->download)
        {
            
            $html = view('schedule.main', [
                'schedules' => $schedules
            ])->render();

            // instantiate and use the dompdf class
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            
            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4', 'landscape');
            
            // Render the HTML as PDF
            $dompdf->render();
            
            // Output the generated PDF to Browser
            $dompdf->stream();
            
            
        }
        
        return view('schedule.main', [
            'schedules' => $schedules
        ]);
    }
    
    
    
    public function daily()
    {
        $schedules = Schedule::
            // when($request->date ?? date('Y-m-d'), function($query, $date){
            //     return $query->whereDate('arrival_date', $date);
            // })
            get();
            
        return view('schedule.daily', [
            'schedules' => $schedules
        ]);
    }
}

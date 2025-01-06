@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">

        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mb-0">DAILY SCHEDULE</h1>
        </div>
    

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-0">
                        
                        <table class="table table-bordered mb-0">
                            <tr>
                                <th>DATANG</th>
                                <th>PAX</th>
                                <th>HOTEL</th>
                                <th>C.O</th>
                                <th>RAUDAH</th>
                                <th>PAX</th>
                                <th>ZIARAH MADINAH</th>
                                <th>FROM</th>
                                <th>PAX</th>
                            <tr>
                            
                            @foreach($schedules as $schedule)
                            <tr>
                                <td>{{ $schedule->arrival_date }}</td>
                                <td>{{ $schedule->pax }}</td>
                                <td>{{ $schedule->madinah_hotel }}</td>
                                <td>{{ $schedule->checkout_date }}</td>
                                <td>{{ $schedule->r_men }} {{ $schedule->r_women }}</td>
                                <td>{{ 'wewe' }}</td>
                                <td>ZIARAH MADINAH</td>
                                <td>FROM</th>
                                <td>PAX</td>
                            <tr>
                                
                            @endforeach
                                
                            </tr> 
                                <th>CITY TO CITY</th>
                                <th>PAX</th>
                                <th>FROM</th>
                                <th>TO</th>
                                <th>C.O</th>
                                <th>ZAIARAH MAKKAH</th>
                                <th>PAX</th>
                                <th>PULANG</th>
                                <th>PAX</th>
                                
                            </tr>
                        </table>            
                
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
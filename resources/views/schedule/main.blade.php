@extends('layouts.blank')



@section('content')


<div class="container-fluid">
    
    <div class="row">
        
        <div class="col-md-2">
            <form>
                <div class="mb-3 d-flex align-items-center ">
                    <input type="date" class="form-control rounded-pill" name="date" onchange="this.form.submit()" value="{{ request('date',  date('Y-m-d')) }}"/>
                    
                    <a href="?download=true&date={{request('date')}}" class="btn btn-primary rounded-pill ms-2" alt="download">
                        <span class="bi bi-download"></span>
                    </a>
                </div>
            </form>
        </div>
    
        <div class="col-12">
            
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>GROUP NAME</th>
                        <th>ARRIVAL / CHECKOUT</th>
                        <th>MADINAH</th>
                        <th>MEKKAH</th>
                        <th>R/MEN - R/WOMEN</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($schedules as $schedule)
                        <tr>
                            <td>
                                
                                <div>{{ $schedule->customer->name ?? '' }}</div>
                                <div clsas="">
                                    <span class="badge text-bg-primary">{{ $schedule->schedule_type }}</span>
                                </div>
                                <div>
                                    <span class="badge text-bg-primary">{{ number_format($schedule->pax) }} Pax</span>
                                </div>
                            </td>
                            
                            <td>
                                {{ date('d F', strtotime($schedule->arrival_date)) }} / {{ date('d F', strtotime($schedule->arrival_date . "+" . ($schedule->madinah_night + $schedule->mekkah_night) . " days")) }}
                            </td>
                            <td>
                                <div>{{ $schedule->madinah_night }} Night</div>
                                <div>Hotel: {{ $schedule->madinah_hotel }}</div>
                                <div>Room: {{ $schedule->madinah_room_info }}</div>
                                <div>Tour: {{ $schedule->madinah_tour_date }}</div>
                                <div>Snack:</div>
                                <div>{{ $schedule->madinah_snack_contact_person}}</div>
                                <div>{{ $schedule->madinah_snack_description}}</div>
                            </td>
                            <td>
                                {{ $schedule->mekkah_night }} Night
                                <div>Hotel: {{ $schedule->mekkah_hotel }}</div>
                                <div>Room: {{ $schedule->mekkah_room_info }}</div>
                                <div>Tour: {{ $schedule->mekkah_tour_date }}</div>
                                <div>Snack:</div>
                                <div>{{ $schedule->mekkah_snack_contact_person}}</div>
                                <div>{{ $schedule->mekkah_snack_description}}</div>
                            </td>
                            
                            <td>
                                @if($schedule->r_men)
                                 {{ date('d F', strtotime($schedule->r_men)) }} - 
                                @endif
                                
                                 @if($schedule->r_women)
                                 {{ date('d F', strtotime($schedule->r_women)) }}
                                @endif
                                
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
                    
        </div>
    
    </div>
    
</div>



@endsection

@section('header')

<style>
    @page print {
        
        body {
            font-size: 10px;
        }
        
        .table {
          width: 100%;
          border-collapse: collapse !important;
          border: 1px solid #ccc !important;
        }
        
        .table tr th,
        .table tr td {
            border-bottom: 1px solid #ccc;
            border-right: 1px solid #ccc;
            font-size: 10px !important;
        }
          
        .footer, a, input {
            display: none;
        }
    
    }
</style>
@endsection
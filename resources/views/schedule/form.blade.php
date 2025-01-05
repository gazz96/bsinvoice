@extends('layouts.app')



@section('content')

{{ html()->form('POST', route('schedule.store'))->open() }}

    <div class="container-fluid p-0">

        <div class="row">
            <div class="col-12">
                @if (session('status'))
                    <div class="alert alert-{{ session('status') }} alert-dismissible" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <div class="alert-message">
                            {{ session('message') }}
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mb-0 fw-bold">FORM SCHEDULE</h1>
            <div class="d-flex align-items-center justify-content-end">
                <a href="{{route('schedule.index')}}" class="btn btn-lg btn-outline-primary rounded-pill me-2">KEMBALI</a>
                <button type="submit" class="btn btn-lg btn-primary rounded-pill">SIMPAN</button>
            </div>
        </div>
        

        

        {{ html()->hidden('id')->value($schedule->id)->id('scheduleIdInput') }}

        <div class="row">

            <div class="col-md-4 mb-3">
                <div class="card border rounded-4">
                    <div class="card-header rounded-4">
                        <h3 class="mb-0 card-title fw-bold">GENERAL</h3>
                    </div>
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="">CUSTOMER</label>
                            {{ html()->select('customer_id', $customers->pluck('name', 'id')->toArray())
                                ->placeholder('Select')
                                ->value($schedule->customer_id)
                                ->class('form-control form-control-lg form-select rounded-pill')
                                ->id('customerIdInput') }}
                        </div>

                        <div class="mb-3">
                            <label for="">TYPE</label>
                            {{ html()->select('schedule_type', [
                                    'MEKKAH -> MADINAH' => 'MEKKAH -> MADINAH',
                                    'MADINAH -> MEKKAH' => 'MADINAH -> MEKKAH',
                                ])
                                ->placeholder('Select')
                                ->value($schedule->schedule_type)
                                ->class('form-control form-control-lg form-select rounded-pill')
                                ->id('scheduleTypeInput') }}
                            @error('schedule_type')
                            <span class="d-block invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="">ARRIVAL DATE</label>
                            {{ html()->date('arrival_date')
                                ->value($schedule->arrival_date)
                                ->class('form-control form-control-lg rounded-pill')
                                ->id('arrivalDateInput') }}
                        </div>

                        <div class="mb-3">
                            <label for="">ARRIVAL FLIGHT INFO</label>
                            {{ html()->text('arrival_flight_info')
                                ->value($schedule->arrival_flight_info)
                                ->class('form-control form-control-lg rounded-pill')
                                ->id('arrivalFlightInfoInput') }}
                        </div>

                        <div class="mb-3">
                            <label for="">DEPARTURE DATE</label>
                            {{ html()->date('departure_date')
                                ->value($schedule->departure_date)
                                ->class('form-control form-control-lg rounded-pill')
                                ->id('departureDateInput')
                                ->disabled()}}
                        </div>

                        <div class="mb-3">
                            <label for="">DEPARTURE FLIGHT INFO</label>
                            {{ html()->text('departure_flight_info')
                                ->value($schedule->departure_flight_info)
                                ->class('form-control form-control-lg rounded-pill')
                                ->id('departureFlightInfoInput') }}
                        </div>

                        <div class="row">
                                
                            <div class="col-md-6 mb-3">
                                <label for="">MEKKAH (NIGHT)</label>
                                {{ html()->number('mekkah_night')
                                    ->value($schedule->mekkah_night)
                                    ->class('form-control form-control-lg rounded-pill')
                                    ->id('mekkahNightInput') }}
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">MADINAH (NIGHT)</label>
                                {{ html()->number('madinah_night')
                                    ->value($schedule->madinah_night)
                                    ->class('form-control form-control-lg rounded-pill')
                                    ->id('madinahNightInput') }}
                            </div>

                        </div>

                        {{-- <div class="mb-3">
                            <label for="">DEPARTURE DATE</label>
                            {{ html()->date('departure_date')
                                ->value($schedule->departure_date)
                                ->class('form-control form-control-lg rounded-pill')
                                ->id('departureDateInput') }}
                        </div> --}}

                        <div class="mb-3">
                            <label for="">PAX</label>
                            {{ html()->number('pax')
                                ->value($schedule->pax)
                                ->class('form-control form-control-lg rounded-pill')
                                ->id('paxInput') }}
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="col-md-4">

                <div class="card border rounded-4">
                    <div class="card-header rounded-4">
                        <h3 class="mb-0 card-title fw-bold">TOUR MEKKAH</h3>
                    </div>
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="">DATE</label>
                            {{ html()->date('mekkah_date')
                                ->value($schedule->mekkah_date)
                                ->class('form-control form-control-lg rounded-pill')
                                ->id('mekkahDateInput') }}
                        </div>

                        <div class="mb-3">
                            <label for="">HOTEL</label>
                            {{ html()->text('mekkah_hotel')->class('form-control form-control-lg rounded-pill')->value(old('mekkah_hotel', $schedule->mekkah_hotel)) }}
                            @error('mekkah_hotel')
                            <span class="d-block invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="">ROOM INFO</label>
                            {{ html()->textarea('mekkah_room_info')->class('form-control form-control-lg rounded-4')->value(old('mekkah_room_info', $schedule->mekkah_room_info)) }}
                            @error('mekkah_room_info')
                            <span class="d-block invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="">SNACK CONTACT PERSON</label>
                            {{ html()->text('mekkah_snack_contact_person')->class('form-control form-control-lg rounded-pill')->value(old('mekkah_snack_contact_person', $schedule->mekkah_snack_contact_person)) }}
                            @error('mekkah_snack_contact_person')
                            <span class="d-block invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="">SNACK DESCRIPTION</label>
                            {{ html()->textarea('mekkah_snack_description')->class('form-control form-control-lg rounded-4')->value(old('mekkah_snack_description', $schedule->mekkah_snack_description)) }}
                            @error('mekkah_snack_description')
                            <span class="d-block invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="">NOTE</label>
                            {{ html()->textarea('mekkah_note')->class('form-control form-control-lg rounded-4')->value(old('mekkah_note', $schedule->mekkah_note)) }}
                            @error('mekkah_note')
                            <span class="d-block invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-md-4">

                <div class="card border rounded-4">
                    <div class="card-header rounded-4">
                        <h3 class="mb-0 card-title fw-bold">TOUR MADINAH</h3>
                    </div>
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="">DATE</label>
                            {{ html()
                                ->date('madinah_date')
                                ->attributes([
                                    'min' => $schedule->arrival_date,
                                    'max' => date('Y-m-d', strtotime($schedule->arrival_date . " +{$schedule->mekkah_night} days"))
                                ])
                                ->value($schedule->madinah_date)
                                ->class('form-control form-control-lg rounded-pill')
                                
                                ->id('madinahDateInput') }}
                        </div>

                        <div class="mb-3">
                            <label for="">HOTEL</label>
                            {{ html()->text('madinah_hotel')->class('form-control form-control-lg rounded-pill')->value(old('madinah_hotel', $schedule->madinah_hotel)) }}
                            @error('madinah_hotel')
                            <span class="d-block invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="">ROOM INFO</label>
                            {{ html()->textarea('madinah_room_info')->class('form-control form-control-lg rounded-4')->value(old('madinah_room_info', $schedule->madinah_room_info)) }}
                            @error('madinah_room_info')
                            <span class="d-block invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="">SNACK CONTACT PERSON</label>
                            {{ html()->text('madinah_snack_contact_person')->class('form-control form-control-lg rounded-pill')->value(old('madinah_snack_contact_person', $schedule->madinah_snack_contact_person)) }}
                            @error('madinah_snack_contact_person')
                            <span class="d-block invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="">SNACK DESCRIPTION</label>
                            {{ html()->textarea('madinah_snack_description')->class('form-control form-control-lg rounded-4')->value(old('madinah_snack_description', $schedule->madinah_snack_description)) }}
                            @error('madinah_snack_description')
                            <span class="d-block invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="">NOTE</label>
                            {{ html()->textarea('madinah_note')->class('form-control form-control-lg rounded-4')->value(old('madinah_note', $schedule->madinah_note)) }}
                            @error('madinah_note')
                            <span class="d-block invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>

{{ html()->form()->close() }}

@endsection



@section('footer')

    <script>

        let arrivalDateInput = $('#arrivalDateInput');
        let departureDateInput = $('#departureDateInput');
        let mekkahNightInput = $('#mekkahNightInput');
        let mekkahDateInput = $('#mekkahDateInput');

        let madinahNightInput = $('#madinahNightInput');
        let madinahDateInput = $('#madinahDateInput');
        
        function calcDate() {
            let arrivalDate = arrivalDateInput.val();
            let madinahNight = parseInt(madinahNightInput.val());
            let mekkahNight = parseInt(mekkahNightInput.val());
            let totalNight = madinahNight + mekkahNight;
            
            let updatedDate = moment(arrivalDate).add(totalNight, 'days');
            departureDateInput.val(updatedDate.format("YYYY-MM-DD"));
            
            let minMekkahNight = arrivalDate;
            let maxMekkahNight = moment(arrivalDate).add(mekkahNight, 'days').format('YYYY-MM-DD');
            
            let minMadinahNight =moment(arrivalDate).add(mekkahNight + 1, 'days').format('YYYY-MM-DD');
            let maxMadinahNight = moment(arrivalDate).add(mekkahNight + madinahNight, 'days').format('YYYY-MM-DD');
            
            mekkahDateInput.attr('min', minMekkahNight);
            mekkahDateInput.attr('max', maxMekkahNight);
            mekkahDateInput.val(minMekkahNight)
            
            madinahDateInput.attr('min', minMadinahNight);
            madinahDateInput.attr('max', maxMadinahNight);
            madinahDateInput.val(minMadinahNight)
        }
        

        $('#i-warehouse_access_ids').select2({

            width: '100%',

            multiple: true

        })

        $(document).on('input', '#mekkahNightInput', function(){
           calcDate()
        })  

        $(document).on('input', '#madinahNightInput', function(){
            calcDate()
        })  

    </script>
 
   

@endsection

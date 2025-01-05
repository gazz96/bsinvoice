@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">

        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mb-0">SCHEDULES</h1>
            <div class="d-flex justify-content-end">
                
                <a class="btn btn-lg btn-primary rounded-pill me-2" href="{{ route('schedule.main') }}">
                    <span data-lucide="calendar" class="me-1"></span>
                    <span>MAIN</span>
                </a>
                
                <a class="btn btn-lg btn-primary rounded-pill me-2" href="{{ route('schedule.daily') }}">
                    <span data-lucide="calendar-check" class="me-1"></span>
                    <span>DAILY</span>
                </a>
                
                <a class="btn btn-lg btn-primary rounded-pill" href="{{ route('schedule.create') }}">
                    <span data-lucide="plus" class="me-1"></span>
                    <span>CREATE</span>
                </a>
            </div>
        </div>
        <form action="">
            <div class="row mb-3 align-items-center">
                <div class="col-md-3">
                    <input type="text" name="s" class="form-control form-control-lg rounded-pill" value="{{ request('s') }}" placeholder="Input your keywords">
                </div>
                <div class="col-md-2">

                </div>
            </div>
        </form>

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

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-dark">CUSTOMER</th>
                            <th class="text-dark">ROUTE</th>
                            <th class="text-dark">NIGHT</th>
                            <th class="text-dark">ARRIVAL</th>
                            <th class="text-dark">DEPARTURE</th>
                            <th width="100"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($schedules as $schedule)
                            <tr>
                                <td> 
                                    {{ $schedule->customer->name ?? '' }}
                                </td>
                                <td>
                                    <div>{{ $schedule->schedule_type }}</div>
                                </td>
                                <td>
                                    @if($schedule->schedule_type == "MEKKAH -> MADINAH")
                                    {{$schedule->mekkah_night}}/{{$schedule->madinah_night}}
                                    @endif
                                    
                                    @if($schedule->schedule_type == "MADINAH -> MEKKAH")
                                    {{$schedule->madinah_night}}/{{$schedule->mekkah_night}}
                                    @endif
                                </td>
                                <td>
                                    <div>
                                        <div>{{ $schedule->arrival_date }}</div>
                                        <div>{{ $schedule->arrival_flight_info }}</div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div>{{ $schedule->departure_date }}</div>
                                        <div>{{ $schedule->departure_flight_info }}</div>
                                    </div>
                                </td>
                                <td class="text-center" width="150">
                                    <div class="btn-group">
                                        <button class="btn btn-lg btn-outline-primary dropdown-toggle rounded-pill" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="bi bi-caret-down-fill"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a href="{{ route('schedule.edit', $schedule->id) }}"
                                                    class="dropdown-item">
                                                    Edit
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('schedule.manage', $schedule->id) }}"
                                                    class="dropdown-item">
                                                    Manage Task
                                                </a>
                                            </li>
                                        </ul>
                                      </div>
                                    
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    {{ $schedules->links() }}
                </div>

            </div>
        </div>

    </div>
@endsection
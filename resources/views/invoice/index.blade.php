@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">

        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h1 class="h2 mb-0 fw-bold">INVOICE</h1>

            <div class="d-flex justify-content-end">
                <a class="btn btn-lg btn-dark rounded-pill" href="{{ route('invoice.create') }}">
                    <span data-lucide="plus"></span>
                    <span class="fw-bold">TAMBAH</span>
                </a>
            </div>
        </div>

        <div class="card mb-3 border rounded-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <h4 class="mb-2 fw-bold">Overdue</h4>
                        <h2 class="">Rp 27.000.000</h2>
                    </div>
                </div>
                
            </div>
        </div>

        <form action="">
            <div class="row mb-3 align-items-center">
                <div class="col-md-3">
                    <input type="text" name="s" class="form-control form-control-lg rounded-pill" value="{{ request('s') }}" placeholder="Masukan kata kunci...">
                </div>
                <div class="col-md-2">
                    <select name="role_id" id="filter-role_id" class="form-control form-control-lg rounded-pill">
                        <option value="">Pilih</option>
                        @foreach ([] as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-7">
                    
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
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-dark">STATUS</th>
                            <th class="text-dark">DUE</th>
                            <th class="text-dark">DATE</th>
                            <th class="text-dark">NUMBER</th>
                            <th class="text-dark">CUSTOMER</th>
                            <th class="text-dark text-end">AMOUNT</th>
                            <th class="text-dark text-end">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ([] as $user)
                            <tr>
                                <td width="100">{{ $user->id }}</td>
                                <td>
                                    @if ($user->photo)
                                        <img src="{{ url($user->photo) }}" width="48" height="48"
                                            class="rounded-circle me-2" alt="Photo {{ $user->name }}">
                                    @endif
                                    {{ $user->name }}
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @foreach($user->roles as $role)
                                    <span class="badge bg-secondary">{{$role->name}}</span>
                                    @endforeach
                                </td>
                                <td class="text-center" width="150">
                                    <a href="{{ route('employee.edit', $user->id) }}"
                                        class="btn btn-warning">
                                        <span data-feather="edit"></span>
                                    </a>
                                    <!--<form action="{{ route('employee.destroy', $user->id) }}" method="POST"-->
                                    <!--    class="d-inline">-->
                                    <!--    @csrf-->
                                    <!--    @method('DELETE')-->
                                    <!--    <button class="btn btn-danger"-->
                                    <!--        onclick="return confirm('DELETE ???')">-->
                                    <!--        <i class="fas fa-trash"></i>-->
                                    <!--    </button>-->
                                    <!--</form>-->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                </div>
            </div>
        </div>

    </div>
@endsection
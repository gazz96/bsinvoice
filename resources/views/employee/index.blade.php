@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">MANAGEMENT PEGAWAI</h1>
        <form action="">
            <div class="row mb-3 align-items-center">
                <div class="col-md-3">
                    <input type="text" name="s" class="form-control form-control-lg rounded-pill" value="{{ request('s') }}" placeholder="Input your keywords">
                </div>
                <div class="col-md-2">
                    <select name="role_id" id="filter-role_id" class="form-control form-control-lg rounded-pill">
                        <option value="">Pilih</option>
                        @foreach ($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-7">
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-lg btn-dark rounded-pill" href="{{ route('employee.create') }}">
                            <span class="fas fa-plus"></span>
                            <span>Tambah</span>
                        </a>
                    </div>
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
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Privilege</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
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
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
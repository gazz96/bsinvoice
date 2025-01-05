@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">

        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mb-0">VENDORS</h1>
            <div class="d-flex justify-content-end">
                <a class="btn btn-lg btn-primary rounded-pill" href="{{ route('vendor.create') }}">
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
                            <th class="text-dark">VENDOR NAME</th>
                            <th class="text-dark">FIRST NAME</th>
                            <th class="text-dark">LAST NAME</th>
                            <th class="text-dark">EMAIL</th>
                            <th class="text-dark">CITY</th>
                            <th class="text-dark">ADDRESS</th>
                            <th class="text-dark text-end">POSTAL CODE</th>
                            <th width="100"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($vendors as $vendor)
                            <tr>
                                <td>
                                    {{ $vendor->name }}
                                </td>
                                <td>{{ $vendor->first_name }}</td>
                                <td>{{ $vendor->last_name }}</td>
                                <td>{{ $vendor->email }}</td>
                                <td>{{ $vendor->city }}</td>
                                <td>{{ $vendor->address }}</td>
                                <td class="text-end">{{ $vendor->postal_code }}</td>
                                <td class="text-center" width="150">
                                    <div class="btn-group">
                                        <button class="btn btn-lg btn-outline-primary dropdown-toggle rounded-pill" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="bi bi-caret-down-fill"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a href="{{ route('vendor.edit', $vendor->id) }}"
                                                    class="dropdown-item">
                                                    Edit
                                                </a>
                                            </li>
                                        </ul>
                                      </div>
                                    
                                    
                                </td>
                            </tr>
                        @empty

                        <tr>
                            <td colspan="8" class="text-center">
                                <div class="mb-2">Vendor not found</div>
                                <a href="{{ route('vendor.create') }}"
                                class="btn btn-lg btn-outline-primary rounded-pill">Create vendor</a>
                            </td>
                        </tr>
                            
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    {{ $vendors->links() }}
                </div>

            </div>
        </div>

    </div>
@endsection
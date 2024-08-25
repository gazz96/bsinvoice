@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">

        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mb-0">CUSTOMER</h1>
            <div class="d-flex justify-content-end">
                <a class="btn btn-lg btn-primary rounded-pill" href="{{ route('customer.create') }}">
                    <span data-lucide="plus" class="me-1"></span>
                    <span>Tambah Customer</span>
                </a>
            </div>
        </div>
        <form action="">
            <div class="row mb-3 align-items-center">
                <div class="col-md-3">
                    <input type="text" name="s" class="form-control form-control-lg rounded-pill" value="{{ request('s') }}" placeholder="Masukan kata kunci...">
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
                            <th class="text-dark">NAMA</th>
                            <th class="text-dark">EMAIL</th>
                            <th class="text-dark">PIC</th>
                            <th class="text-dark">PHONE</th>
                            <th width="100"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>
                                    {{ $customer->name }}
                                </td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->pic }}</td>
                                <td>{{ $customer->phone_number }}</td>
                                <td class="text-center" width="150">
                                    <div class="btn-group">
                                        <button class="btn btn-lg btn-outline-primary dropdown-toggle rounded-pill" type="button" data-bs-toggle="dropdown" aria-expanded="false"></button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a href="{{ route('customer.edit', $customer->id) }}"
                                                    class="dropdown-item">
                                                    Edit
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
                    {{ $customers->links() }}
                </div>

            </div>
        </div>

    </div>
@endsection
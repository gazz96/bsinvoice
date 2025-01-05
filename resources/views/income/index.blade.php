@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">

        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h1 class="h2 mb-0 fw-bold">INCOMES</h1>

            <div class="d-flex justify-content-end">
                <a class="btn btn-lg btn-primary rounded-pill" href="{{ route('income.create') }}">
                    <span data-lucide="plus"></span>
                    <span class="fw-bold">CREATE</span>
                </a>
            </div>
        </div>

        <form action="">
            <div class="row mb-3 align-items-center">
                <div class="col-md-3">
                    <input type="text" name="s" class="form-control form-control-lg rounded-pill"
                        value="{{ request('s') }}" placeholder="Input your keywords">
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

                @if ($incomes->count())
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-dark">USER</th>
                                <th class="text-dark">NAME</th>
                                <th class="text-dark">DESCRIPTION</th>
                                <th class="text-dark">DATE</th>
                                <th class="text-dark text-end">AMOUNT</th>
                                <th class="text-dark text-end">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($incomes as $income)
                                <tr>
                                    <td>{{ $income->user->name ?? '' }}</td>
                                    <td>{{ $income->name }}</td>
                                    <td>{{ $income->description }}</td>
                                    <td>{{ $income->income_date }}</td>
                                    <td class="text-end">{{ number_format($income->amount) }}</td>
                                    
                                    <td class="text-end">

                                        <div class="btn-group">
                                            
                                            <button class="btn btn-outline-primary dropdown-toggle rounded-pill" type="button"
                                                data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                                                <i class="bi bi-caret-down-fill"></i>
                                            </button>

                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item"  href="{{ route('income.edit', $income->id) }}">Edit</a></li>
                                                <li>
                                                    <form action="{{ route('income.destroy', $income->id) }}" method="POST">
                                                        @method('DELETE')
                                                        <button class="dropdown-item" onclick="return confirm('HAPUS ???')">
                                                            <span class="text-danger">Delete</span>
                                                        </button>
                                                    </form>
                                                    
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                    </div>
                @else
                    <div class="d-flex justify-content-center py-5 border-top">
                        <div class="text-center">
                            <div class="mb-3">Income tidak ditemukan</div>
                            <a href="{{ route('income.create') }}"
                                class="btn btn-lg btn-outline-primary rounded-pill">Buat Income</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection

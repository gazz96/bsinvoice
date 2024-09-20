@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">

        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h1 class="h2 mb-0 fw-bold">EXPENSE</h1>

            <div class="d-flex justify-content-end">
                <a class="btn btn-lg btn-primary rounded-pill" href="{{ route('expense.create') }}">
                    <span data-lucide="plus"></span>
                    <span class="fw-bold">TAMBAH</span>
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

                @if ($expenses->count())
                    <table class="table">
                        <thead>
                            <tr>
                                <th>USER</th>
                                <th class="text-dark">NAME</th>
                                <th class="text-dark">DESCRIPTION</th>
                                <th class="text-dark">DATE</th>
                                <th class="text-dark text-end">AMOUNT</th>
                                <th class="text-dark text-end">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expenses as $expense)
                                <tr>
                                    <td>{{ $expense->user->name ?? '' }}</td>
                                    <td>{{ $expense->name }}</td>
                                    <td>{{ $expense->description }}</td>
                                    <td>{{ $expense->expense_date }}</td>
                                    <td class="text-end">{{ number_format($expense->amount) }}</td>
                                    
                                    <td class="text-end">

                                        <div class="btn-group">
                                            
                                            <button class="btn btn-outline-primary dropdown-toggle rounded-pill" type="button"
                                                data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                                                <i class="bi bi-caret-down-fill"></i>
                                            </button>

                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item"  href="{{ route('expense.edit', $expense->id) }}">Edit</a></li>
                                                <li>
                                                    <form action="{{ route('expense.destroy', $expense->id) }}" method="POST">
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
                            <div class="mb-3">Expense tidak ditemukan</div>
                            <a href="{{ route('expense.create') }}"
                                class="btn btn-lg btn-outline-primary rounded-pill">Buat Expense</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection

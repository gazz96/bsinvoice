@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">

        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h1 class="h2 mb-0 fw-bold">INVOICES</h1>

            <div class="d-flex justify-content-end">
                <a class="btn btn-lg btn-primary rounded-pill" href="{{ route('invoice.create') }}">
                    <span data-lucide="plus"></span>
                    <span class="fw-bold">CREATE</span>
                </a>
            </div>
        </div>

        <div class="card mb-3 border rounded-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <h4 class="mb-2 fw-bold">Tagihan</h4>
                        <h2 class="">Rp {{ number_format(\App\Models\Invoice::getTotalPendingPayment()) }}</h2>
                    </div>
                </div>

            </div>
        </div>

        <form action="">
            <div class="row mb-3 align-items-center">
                <div class="col-md-3">
                    <input type="text" name="s" class="form-control form-control-lg rounded-pill"
                        value="{{ request('s') }}" placeholder="Input your keywords">
                </div>
                <div class="col-md-2">
                    <select name="status" id="filter-status" class="form-control form-control-lg rounded-pill"
                        onchange="this.form.submit()">
                        <option value="">Pilih</option>
                        @foreach (['Unpaid', 'Draft', 'Paid'] as $status)
                            <option value="{{ $status }}" {{ $status == request('status') ? 'selected' : '' }}>
                                {{ $status }}</option>
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

                @if ($invoices->count())
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-dark">
                                    ID
                                </th>
                                <th class="text-dark">STATUS</th>
                                <th class="text-dark">CUSTOMER</th>
                                <th class="text-dark">NOTES</th>
                                <th class="text-dark">DATE</th>
                                <th class="text-dark">DUE</th>
                                <th class="text-dark text-end">AMOUNT</th>
                                <th class="text-dark text-end">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoices as $invoice)
                                <tr>
                                    <td>INV{{ $invoice->id }}</td>
                                    <td width="100">
                                        <span class="badge text-bg-secondary">{{ $invoice->status }}</span>
                                    </td>
                                    <td>{{ $invoice->customer->name ?? '' }}</td>
                                    <td>{{ $invoice->notes }}</td>
                                    <td>{{ $invoice->date }}</td>
                                    <td>{{ $invoice->due_date }}</td>
                                    <td class="text-end">
                                        {{ number_format(
                                            $invoice->items()->get()->sum(function ($item) {
                                                    return $item->price * $item->qty;
                                                }),
                                        ) }}
                                    </td>
                                    <td class="text-end">

                                        @if ($invoice->status == 'DRAFT')
                                            <a href="" class="fw-bold">Approve</a>
                                        @endif

                                        @if ($invoice->status == 'PENDING')
                                            <a href="" class="fw-bold">Record Payment</a>
                                        @endif

                                        <div class="btn-group">
                                            
                                            <button class="btn btn-outline-primary dropdown-toggle rounded-pill" type="button"
                                                data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                                                <i class="bi bi-caret-down-fill"></i>
                                            </button>

                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item"  href="{{ route('invoice.edit', $invoice->id) }}">Edit</a></li>
                                                <li><a class="dropdown-item"  href="{{ route('invoice.edit', $invoice->id) }}">Schedule</a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="#">Send Email</a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="#">Export PDF</a></li>
                                                <li><a class="dropdown-item" href="#">Print</a></li>
                                                <li><a class="dropdown-item" href="#">Copy Link</a></li>
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                        <span class="text-danger">Delete</span>
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
                    </div>
                @else
                    <div class="d-flex justify-content-center py-5 border-top">
                        <div class="text-center">
                            <div class="mb-3">Invoice tidak ditemukan</div>
                            <a href="{{ route('invoice.create') }}"
                                class="btn btn-lg btn-outline-primary rounded-pill">Buat Invoice</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection

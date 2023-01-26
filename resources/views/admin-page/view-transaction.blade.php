@extends('Components.main')
@section('content')
    <section class="manage-hotels">
        @include('Components.sidebar')
        <div class="col-md-12" id="admin-content">
            <h3><i class="fas fa-file-invoice"></i> View Transaction</h3>
        </div>
        <div class="col-md-12" id="admin-content">
            <div class="item-table">
                <table class="table">
                    <thead class="thead-dark"></thead>
                        <tr>
                            @php
                                $no = 1;
                            @endphp
                            <th>No</th>
                            <th scope="col">Booking ID</th>
                            <th scope="col">Transaction Date</th>
                            <th scope="col">Tour Pack ID</th>
                            <th scope="col">Tour Pack Name</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Number of Person</th>
                            <th scope="col">Total Price</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($transactions as $transaction)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $transaction->booking_code }}</td>
                                <td>{{ $transaction->transaction_date }}</td>
                                @foreach ($transaction->getTour as $pack)
                                    <td>{{ $pack->id }}</td>
                                    <td>{{ $pack->name }}</td>
                                @endforeach
                                <td>{{ $transaction->customer_name }}</td>
                                <td>{{ $transaction->quantity }}</td>
                                <td>IDR. {{ $transaction->price }}</td>




                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

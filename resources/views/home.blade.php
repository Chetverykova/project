@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Customer Dashboard
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">User Name</th>
                                <th scope="col">Transaction Amount</th>
                                <th scope="col">Transaction Type</th>
                                <th scope="col">Note Title</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->user->name }}</td>
                                    <td>{{ $transaction->amount }}</td>
                                    <td>{{ $transaction->type }}</td>
                                    <td>@if($transaction->note != null){{ $transaction->note['title'] }}@endif</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layout')

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Име на кредитополучателя</th>
                    <th>Сума (лв.)</th>
                    <th>Срок (месеци)</th>
                    <th>Месечна вноска (лв.)</th>
                </tr>
                </thead>
                <tbody>
                @foreach($credits as $credit)
                    <tr>
                        <td>{{ $credit->recipient->name }}</td>
                        <td>{{ $credit->amount }}</td>
                        <td>{{ $credit->term_months }}</td>
                        <td>{{ number_format($credit->calculateMonthlyPayment(), 2) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@extends('layout')

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('payments.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="credit_id">Избери кредит:</label>
                    <select id="credit_id" name="credit_id" required>
                        @foreach($credits as $credit)
                            <option value="{{ $credit->id }}">{{ $credit->getCreditId() }} (Остатък: {{
                        $credit->calculateRemainingBalance() }} лв.)</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="amount">Сума в лева:</label>
                    <input type="number" id="amount" name="amount" required>
                </div>
                <button class="mb-3" type="submit">Направи плащане</button>
            </form>

        </div>
    </div>
@endsection

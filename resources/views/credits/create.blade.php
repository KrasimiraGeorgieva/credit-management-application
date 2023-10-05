@extends('layout')

@section('content')
    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('credits.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="recipient_name">Име на кредитополучателя:</label>
                    <input type="text" id="recipient_name" name="recipient_name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="amount">Сума в лева:</label>
                    <input type="number" id="amount" name="amount" required>
                </div>
                <div class="mb-3">
                    <label for="term_months">Срок (месеци):</label>
                    <input type="number" id="term_months" name="term_months" required>
                </div>
                <button type="submit">Създай кредит</button>
            </form>

        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reservation Confirmed') }}</div>

                    <div class="card-body">
                        <div class="thank-you-message">
                            <h3>Thank You for Trusting Us!</h3>
                            <p>Your reservation has been confirmed.</p>
                            <p>Enjoy your ride!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        /* Add the following styles within the <style> tag in your blade file */

.thank-you-message {
    text-align: center;
    padding: 40px;
    background-color: #f8f8f8;
    border-radius: 10px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
}

.thank-you-message h3 {
    font-size: 24px;
    color: #333;
    margin-bottom: 10px;
}

.thank-you-message p {
    font-size: 16px;
    color: #555;
    margin-bottom: 20px;
}

    </style>
@endsection

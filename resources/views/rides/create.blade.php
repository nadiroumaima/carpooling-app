@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Ride') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('rides.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="destination" class="col-md-4 col-form-label text-md-right">{{ __('Destination') }}</label>

                                <div class="col-md-6">
                                    <input id="destination" type="text" class="form-control @error('destination') is-invalid @enderror" name="destination" value="{{ old('destination') }}" required autocomplete="destination" autofocus>

                                    @error('destination')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="departure_time" class="col-md-4 col-form-label text-md-right">{{ __('Departure Time') }}</label>

                                <div class="col-md-6">
                                    <input id="departure_time" type="datetime-local" class="form-control @error('departure_time') is-invalid @enderror" name="departure_time" value="{{ old('departure_time') }}" required autocomplete="departure_time">

                                    @error('departure_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="number_of_seats" class="col-md-4 col-form-label text-md-right">{{ __('Number of Seats') }}</label>

                                <div class="col-md-6">
                                    <input id="number_of_seats" type="number" class="form-control @error('number_of_seats') is-invalid @enderror" name="number_of_seats" value="{{ old('number_of_seats') }}" required autocomplete="number_of_seats">

                                    @error('number_of_seats')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create Ride') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
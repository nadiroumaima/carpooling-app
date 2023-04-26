@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reserve a Ride') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('reservations.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="ride_id" class="col-md-4 col-form-label text-md-right">{{ __('Ride') }}</label>

                                <div class="col-md-6">
                                    <select id="ride_id" name="ride_id" class="form-control" required>
                                        @foreach($rides as $ride)
                                            <option value="{{ $ride->id }}">{{ $ride->from }} to {{ $ride->to }} at {{ $ride->departure_time }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="seats" class="col-md-4 col-form-label text-md-right">{{ __('Number of Seats') }}</label>

                                <div class="col-md-6">
                                    <input id="seats" type="number" class="form-control @error('seats') is-invalid @enderror" name="seats" value="{{ old('seats') }}" required autocomplete="seats" autofocus>

                                    @error('seats')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Reserve') }}
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
@extends('layouts.app')

 
  


@section('content')
<body>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h4 class="font-weight-bold">{{ __('Create Ride') }}</h4>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('rides.store') }}">
            @csrf
            <div class="form-group">
              <label for="source">{{ __('Source') }}</label>
              <input id="source" placeholder="Enter source" type="text" class="form-control @error('source') is-invalid @enderror" name="source" value="{{ old('source') }}" required autocomplete="source" autofocus>
              @error('source')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="destination">{{ __('Destination') }}</label>
              <input id="destination" placeholder="Enter destination" type="text" class="form-control @error('destination') is-invalid @enderror" name="destination" value="{{ old('destination') }}" required autocomplete="destination" autofocus>
              @error('destination')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="departure_time">{{ __('Departure Time') }}</label>
              <input id="departure_time" type="datetime-local" class="form-control @error('departure_time') is-invalid @enderror" name="departure_time" value="{{ old('departure_time') }}" required autocomplete="departure_time">
              @error('departure_time')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="number_of_seats">{{ __('Number of Seats') }}</label>
              <input id="number_of_seats" type="number" class="form-control @error('number_of_seats') is-invalid @enderror" name="number_of_seats" value="{{ old('number_of_seats') }}" required autocomplete="number_of_seats">
              @error('number_of_seats')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            
            
            
            
            @if( is_null(auth()->user()->vehicle_id))
            <div class="alert alert-warning" role="alert">
              You haven't provided your vehicle information yet. Please do so before publishing
            </div>
              <div class="form-group">
                <label for="license_plate">{{ __('License Plate') }}</label>
                <input id="license_plate" placeholder="Enter license plate" type="text" class="form-control @error('license_plate') is-invalid @enderror" name="license_plate" value="{{ old('license_plate') }}" required autocomplete="license_plate" autofocus>
                @error('license_plate')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            
              <div class="form-group">
                <label for="model">{{ __('Model') }}</label>
                <input id="model" placeholder="Enter model" type="text" class="form-control @error('model') is-invalid @enderror" name="model" value="{{ old('model') }}" required autocomplete="model" autofocus>
                @error('model')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            
              <div class="form-group">
                <label for="brand">{{ __('Brand') }}</label>
                <input id="brand" placeholder="Enter brand" type="text" class="form-control @error('brand') is-invalid @enderror" name="brand" value="{{ old('brand') }}" required autocomplete="brand" autofocus>
                @error('brand')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            
              <div class="form-group">
                <label for="capacity">{{ __('Capacity') }}</label>
                <input id="capacity" placeholder="Enter capacity" type="number" class="form-control @error('capacity') is-invalid @enderror" name="capacity" value="{{ old('capacity') }}" required autocomplete="capacity">
                @error('capacity')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            
              <div class="form-group">
                <label for="color">{{ __('Color') }}</label>
                <input id="color" placeholder="Enter color" type="text" class="form-control @error('color') is-invalid @enderror" name="color" value="{{ old('color') }}" required autocomplete="color" autofocus>
                @error('color')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            @endif
            <div class="form-group">
              <button type="submit" class="btn btn-primary" name="publish">{{ __('Publish') }}</button>
            </div>
            </form>
            
            
            
        </div>
      </div>
    </div>
  </div>
</div>

</body>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAc3KPkQnsWeDevZxfQ4hwNKb98pb80Gbg&libraries=places"></script>
<script>
  var sourceInput = document.getElementById('source');
  var destinationInput = document.getElementById('destination');

  var sourceAutocomplete = new google.maps.places.Autocomplete(sourceInput);
  var destinationAutocomplete = new google.maps.places.Autocomplete(destinationInput);
</script>

<style>
  body {
    background-image: url('/tile_background.png');
  }
  
  .card {
      margin-top: 50px;
      border: none;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0,0,0,.2);
      background-color: #fff
  }
  
  .card-header {
      background-color: #7c436f;
      color: #fff;
      font-size: 2.5rem;
      text-align: center;
      border-radius: 10px 10px 0 0;
  }
  
  .card-body {
      padding: 30px;
  }
  
  .form-group {
  display: flex;
  align-items: center;
  
}

.form-group label {
  margin-right: 10px;
  font-weight: bold;
}
  
  .form-control {
      border-radius: 10px;
      margin:5px
  }
  
  .btn-primary {
      background-color: #7c436f ;
      border-color: #161718;
      border-radius: 10px;
      width: 30%;
      font-weight: bolder  ;
      margin: 15px;
      cursor: pointer;
      font-size: 20px;
  }
  
  .btn-primary:hover {
      background-color: #ff6f8e;
      border-color: #393d42;
  }
  
  @media (min-width: 768px) {
      .card {
          width: 50%;
          margin: 100px auto;
      }
  }
  
  @media (max-width: 767px) {
      .card {
          width: 100%;
          margin: 50px auto;
      }
  }
  .alert-warning {
  background-color: #fff3cd;
  color: #856404;
  border-color: #ffeeba;
  padding: 0.75rem 1.25rem;
  margin-bottom: 1rem;
  border: 1px solid transparent;
  border-radius: 0.25rem;
}

.alert-warning strong {
  font-weight: bold;
}

</style>
@endsection
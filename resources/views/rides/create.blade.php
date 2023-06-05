@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h4 class="font-weight-bold">{{ __('Create Ride') }}</h4>
        </div>
        <div class="card-body">
          <form method="POST" action="store">
            @csrf
            <div class="form-group">
                <label for="source">{{ __('Source') }}</label>
                <input id="source" placeholder="Enter source" type="text" class="form-control @error('source') is-invalid @enderror" name="source" value="{{ old('source') }}" required autocomplete="source" autofocus>
                <input id="source_latitude" type="hidden" name="source_latitude">
                <input id="source_longitude" type="hidden" name="source_longitude">
                @error('source')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="destination">{{ __('Destination') }}</label>
                <input id="destination" placeholder="Enter destination" type="text" class="form-control @error('destination') is-invalid @enderror" name="destination" value="{{ old('destination') }}" required autocomplete="destination" autofocus>
                <input id="destination_latitude" type="hidden" name="destination_latitude">
                <input id="destination_longitude" type="hidden" name="destination_longitude">
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
            <div class="form-group">
              <button type="submit" class="btn btn-primary">{{ __('Create Ride') }}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAc3KPkQnsWeDevZxfQ4hwNKb98pb80Gbg&libraries=places"></script>
<script>
        var sourceInput = document.getElementById('source');
        var destinationInput = document.getElementById('destination');

        var sourceAutocomplete = new google.maps.places.Autocomplete(sourceInput);
        var destinationAutocomplete = new google.maps.places.Autocomplete(destinationInput);

        // Add event listeners to update the hidden fields when a place is selected
        sourceAutocomplete.addListener('place_changed', function () {
        var place = sourceAutocomplete.getPlace();
        document.getElementById('source_latitude').value = place.geometry.location.lat();
        document.getElementById('source_longitude').value = place.geometry.location.lng();
        });

        destinationAutocomplete.addListener('place_changed', function () {
        var place = destinationAutocomplete.getPlace();
        document.getElementById('destination_latitude').value = place.geometry.location.lat();
        document.getElementById('destination_longitude').value = place.geometry.location.lng();
        });

</script>
<style>
    <style>
  body {
      background-color: #f8f9fa;
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
</style>

@endsection

@extends('layouts.app')
@section('content')
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
    <style>
        @import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
        @import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
        .contact-button {
            display: inline-block;
            position: relative;
            padding: 10px 20px;
            background-color: #7c436f;
            color: black;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            overflow: hidden;
            transition: all 0.3s ease;
            margin-top: 30px;
        }



        .contact-button:hover:before {
            width: 100%;
            color: #0c0c0c;
            background-color: #f8709e
        }

        .contact-button span {
            position: relative;
            z-index: 1;
        }

        .contact-button:hover {
            background-color: #7c436f;
            color: #0c0c0c;
            background-color: #f8709e
        }

        .contact-button:hover span {
            position: relative;
            z-index: 2;
        }


 .driver-email,
.driver-name {
  display: none;
  font-size: 16px;
  margin: 10px 0;
  color: #333;
  font-weight: bold;
}

.show-email,
.show-name {
  display: block;
  font-weight: bold;
}




    </style>
    <link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
    <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
    <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
    <script>

       function toggleDriverInfo() {
  var driverInfo = document.getElementById("driverEmail");
  driverInfo.classList.toggle("show-email");

  var driverName = document.getElementById("driverName");
  driverName.classList.toggle("show-name");
}






    </script>

</head>
<body>
    <header class="site-header" id="header">
        <h1 class="site-header__title" data-lead-id="site-header-title">Reservation confirmed!!</h1>
    </header>

    <div class="main-content">
        <i class="fa fa-check main-content__checkmark" id="checkmark"></i>
        <p class="main-content__body" data-lead-id="main-content-body">Thank You for Trusting Us .Enjoy your ride!.</p>
        <a href="#" class="contact-button" onclick="toggleDriverInfo()">Contact Your Driver</a>
        <p class="driver-name" id="driverName"> Name:{{ $driver['name'] }}</p>
          <p class="driver-email" id="driverEmail">Email:{{ $driver['email'] }}</p>

    </div>

	<footer class="site-footer" id="footer">

		<p class="site-footer__fineprint" id="fineprint">Carpoolers  | 2023</p>
	</footer>
</body>
</html>
@endsection

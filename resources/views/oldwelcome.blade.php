<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Режимний день</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">-->
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: left;
            }

            .title {
                font-size: 54px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 200px;
            }
        </style>
        <style>
          .carousel-inner > .item > img,
          .carousel-inner > .item > a > img {
              width: 70%;
              margin: auto;
          }
        </style>
        <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>-->
        
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Увійти</a>
                        <a href="{{ url('/register') }}">Зареєструватись</a>
                    @endif
                </div>
            @endif
 <div class="content">           
<div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="{{ asset('pic/IMG_0263.JPG') }}" alt="profile Pic" height="70%" width="100%">
        <div class="carousel-caption">
          <div class="title m-b-md">
                    АТ "Вінницяобленерго"
                    Режимний день
          </div>
          
        </div>
      </div>

      <div class="item">
        <img src="{{ asset('pic/IMG_0264.JPG') }}" alt="profile Pic" height="70%" width="100%">
        
        <div class="carousel-caption">
          <div class="title m-b-md">
                    АТ "Вінницяобленерго"
                    Режимний день
          </div>
         
        </div>
      </div>
    
      <div class="item">
        <img src="{{ asset('pic/IMG_0265.JPG') }}" alt="profile Pic" height="70%" width="100%">
        <div class="carousel-caption">
          <div class="title m-b-md">
                    АТ "Вінницяобленерго"
                    Режимний день
          </div>
          
        </div>
      </div>

      <div class="item">
        <img src="{{ asset('pic/IMG_0302.JPG') }}" alt="profile Pic" height="70%" width="100%">
        <div class="carousel-caption">
          <div class="title m-b-md">
                    АТ "Вінницяобленерго"
                     Режимний день
          </div>
          
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
            

                <div class="links">
                    <a href="/graf/">Режимні виміри за період</a>
                    <a href="/home">Довідники</a>
                    <a href="/import-export-csv-excel">Завантаження даних</a>
                    <a href="https://forge.laravel.com">Експорт макету</a>
                    <a href="https://github.com/laravel/laravel">Інструкція</a>
                </div>
            </div>
        
    </body>
</html>

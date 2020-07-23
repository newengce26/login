<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li class="nav-item active">
                        <a rel="alternate" class="nav-link" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}<span class="sr-only">(current)</a>
                        </span></a>
                    </li> 
                @endforeach
              </ul>

              <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form>
            </div>
          </nav>

{{--start content --}}
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Add your offer
                </div>

            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}; {{-- to get the message value associated with session key [success] --}}
                </div>
            @endif

            <form method="post" action="{{route('offers.store')}}">
                    {{--<input type="hidden" name="_token" value="{{csrf_token}}">--}}
                    @csrf

                    <div class="form-group">
                      <label for="name">Offer Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter Offer Name ">
                      @error('name')
                      <small class="form-text text-danger">{{$message}}</small>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="price">Price</label>
                      <input type="text" class="form-control" id="price" placeholder="price" name="price">
                      @error('price')
                      <small class="form-text text-danger">{{$message}}</small>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="details">Details</label>
                      <input type="text" class="form-control" id="details" placeholder="details" name="details">
                      @error('details')
                      <small class="form-text text-danger">{{$message}}</small>
                      @enderror
                    </div>
                
                    <button type="submit" class="btn btn-primary">save</button>
                  </form>
                
            </div>
        </div>
    </body>
</html>

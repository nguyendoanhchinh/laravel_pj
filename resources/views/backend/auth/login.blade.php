<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login
    </title>

    <link href="backend/css/bootstrap.min.css" rel="stylesheet">
    <link href="backend/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="backend/css/animate.css" rel="stylesheet">
    <link href="backend/css/style.css" rel="stylesheet">
    <link href="backend/css/customize.css" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="loginColumns animated fadeInDown">
    <div class="row">
        <div class="col-md-4">
            <h2 class="font-bold">Login</h2>

            <p>How bao yous</p>

        </div>

        <div class="col-md-8">
            <div class="ibox-content">
                <form method="post" class="m-t" role="form" action="{{route('auth.login')}}">
{{--                    @if ($errors->any())--}}
{{--                        <div class="alert alert-danger">--}}
{{--                            <ul>--}}
{{--                                @foreach ($errors->all() as $error)--}}
{{--                                    <li>{{ $error }}</li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    @endif--}}
                    @csrf
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{old('email')}}" >
                    </div>
                    @if($errors->has('email'))
                        <div class="error-message">{{$errors->first('email')}}</div>
                    @endif

{{--                    @error('email')--}}
{{--                    <div class="error-message">{{ $message }}</div>--}}
{{--                    @enderror--}}
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" value="{{old('password')}}" >
                    </div>
                    @if($errors->has('password'))
                        <div class="error-message">{{$errors->first('password')}}</div>
                    @endif
{{--                    @error('password')--}}
{{--                    <div class="error-message">{{ $message }}</div>--}}
{{--                    @enderror--}}

                    <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                    <a href="#">
                        <small>Forgot password?</small>
                    </a>


                </form>

            </div>
        </div>
    </div>
    <hr/>
    <div class="row">

        <div class="col-md-6 text-right">
            <small>© 2024   </small>
        </div>
    </div>
</div>

</body>

</html>

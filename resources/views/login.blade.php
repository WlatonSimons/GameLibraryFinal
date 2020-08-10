<div class="body"></div>
<head>
    <title>Baigiamasis</title>
</head>
		<div class="grad"></div>
        <br>
        <style>
            @import url(https://fonts.googleapis.com/css?family=Exo:100,200,400);
            @import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

            body{
                margin: 0;
                padding: 0;
                background: #fff;

                color: #fff;
                font-family: 'Exo', sans-serif;
                font-size: 12px;

                background-image:    url(/cards.png);
                background-size:     cover;                      /* <------ */
                background-repeat:   no-repeat;
                background-position: center center;  
            }

            .body{
                position: absolute;
                top: 100%;
                left: 100%;
                right: 100%;
                bottom: 100%;
                width: auto;
                height: auto;
                -webkit-filter: blur(5px);
                z-index: 0;
            }

            .grad{
                position: absolute;
                top: -20px;
                left: -20px;
                right: 0px;
                bottom: 0px;
                width: auto;
                height: auto;
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,black), color-stop(100%,rgba(3, 1, 1, 0.911))); /* Chrome,Safari4+ */
                z-index: 1;
                opacity: 0.7;
            }

            .header{
                position: absolute;
                top: calc(-40%);
                left: calc(0%);
                z-index: 2;
            }

            .header div{
                float: left;
                color: #fff;
                font-family: 'Exo', sans-serif;
                font-size: 35px;
                font-weight: 200;
            }

            .header div span{
                color: #5379fa !important;
            }

            .login{
                background-color: rgb(34, 34, 34);
                border-left:3px solid rgb(126, 126, 126) ;
                border-right: 3px solid rgb(143, 143, 143) ;
                position: absolute;
                left: calc(40%);
                top: 0px;
                height: 100%;
                width: 350px;
                z-index: 2;
            }

            .loginForm{
                position: absolute;
                top: calc(50% - 75px);
                left: calc(50% - 125px);
                width: 350px;
                z-index: 2;
            }

            .login input[type=email]{
                width: 250px;
                height: 30px;
                background: transparent;
                border: 1px solid rgba(255,255,255,0.6);
                border-radius: 2px;
                color: #fff;
                font-family: 'Exo', sans-serif;
                font-size: 16px;
                font-weight: 400;
                padding: 4px;
            }

            .login input[type=password]{
                width: 250px;
                height: 30px;
                background: transparent;
                border: 1px solid rgba(255,255,255,0.6);
                border-radius: 2px;
                color: #fff;
                font-family: 'Exo', sans-serif;
                font-size: 16px;
                font-weight: 400;
                padding: 4px;
                margin-top: 10px;
            }

            .login input[type=submit]{
                width: 260px;
                height: 35px;
                background: #fff;
                border: 1px solid #fff;
                cursor: pointer;
                border-radius: 2px;
                color: #a18d6c;
                font-family: 'Exo', sans-serif;
                font-size: 16px;
                font-weight: 400;
                padding: 6px;
                margin-top: 10px;
            }

            .login input[type=submit]:hover{
                opacity: 0.8;
            }
            
            .login input[type=submit]:active{
                opacity: 0.6;
            }

            .login input[type=email]:focus{
                outline: none;
                border: 1px solid rgba(255,255,255,0.9);
            }

            .login input[type=password]:focus{
                outline: none;
                border: 1px solid rgba(255,255,255,0.9);
            }

            .login input[type=submit]:focus{
                outline: none;
            }

            ::-webkit-input-placeholder{
            color: rgba(255,255,255,0.6);
            }

            ::-moz-input-placeholder{
            color: rgba(255,255,255,0.6);
            }
        </style>

        @if(isset(Auth::user()->email))
        <script> window.location="/"</script>
        @endif

        @if ($message = Session::get('error'))
        <div>
            <button type = "button" class="close" data-dismiss="alert">x</button>
            <strong>{{$message}}</strong>
        </div>
        @endif

        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>        
                @endforeach
            </ul>
        </div>
        @endif

        

		<div class="login">

            <form method="POST" action="{{url('/main/checklogin')}}" class="loginForm">
                {{ csrf_field()}}
                <div class="header">
                    <div>Game<span>Catalogue</span></div>
                </div>
                <pre> <input type="email" name="email" class="form-control" placeholder="Email"/></pre>
                <pre> <input type="password" name="password" placeholder="Password" class="form-control"/></pre>
                <input type="submit" name="login" class="btn-btn-primary" value="Login"/>
                <pre>       <a href="{{ url('/main/register')}}">Don't have an account ?</a></pre>
            </form>

        </div>



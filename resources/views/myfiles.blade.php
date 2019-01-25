<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

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
    <body >
        <div style="margin-left:100px">
          <h1 >My All Files</h1>

        <!-- <div style="margin-top:20px"> -->
        @foreach ($files as $file )
          <div style="background-color:#e3e4e5;width:300px;padding-left:50px">
            <a href ="/api/v1/displayfileintable/<?php echo $file->id;?>" ><h2>{{$file->name}}</h2></a>
            <button style="border:solid;border-color:green;border-width:5px;margin-left:130px"> download as .XLSX </button>
          </div>

            <br>
          @endforeach

        <!-- </div> -->



            </div>
            <hr>
            <hr>


        </div>
    </body>
</html>

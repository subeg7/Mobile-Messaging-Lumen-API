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
          <h1 >{{$title}}.xlsx</h1>

            </div>
            <hr>
            <hr>

            <table style="width:90%;margin-left:50px">
              <?php $i=0;$id=0;?>
              @foreach($data as $row)
              <?php ++$i;?>
                <tr>
                  <th style="border:solid;border-color:black;border-width:2px;background-color:#d7ffd1" name="row_<?php echo $i;?>" id="cell_<?php echo ++$id;?>">   <?php echo $i-1;?></>
                  @foreach($row as $item)
                  <th style="border:solid;border-color:black;border-width:2px" name="row_<?php echo $i;?>">{{$item}}</th>
                  @endforeach
                </tr>

                @endforeach
            </table>
        </div>
    </body>

    <script>

    document.getElementsByName("row_1").forEach( function(element){
      element.style.backgroundColor="#d7ffd1";
        element.style.borderColor="#4d8748";
        element.style.fontWeight="strong";
    })

    document.getElementById("cell_1").textContent="S.N.";

    </script>
</html>

<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BPI</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('public/css/bootstrap.min.css')}}">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Open Sans', sans-serif;
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
                text-align: center;
            }

            .title {
                font-size: 84px;
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
                margin-bottom: 30px;
            }

            #header {
                background-color: #101820;
                padding: 10px 0;
            }

            .header-text{
                color: #f3f3f4;
            }

            .header-wrap{
                text-align: center;
            }
            .main-table{
                margin-top: 20px;
            }

            .main-table th{
                background-color: #fcc118;
                color: #fff;
                text-align: center;
                width: 25%;
            }
            .table-bordered>tbody>tr>td{
                border: 1px solid black;
                color: #101820;
                text-align: center;
            }
            .main-table tr,
            .main-table th{
                border: 1px solid black;
            }
            .table>thead>tr>th{
                border-bottom: 1px solid black;
            }
            .table-bordered>thead>tr>th{
                border: 1px solid black;
            }
        </style>
    </head>
    <body>

        <header id="header">
            <div class="header-wrap">
                <h1 class="header-text">BPI - Bitcoin Price Index</h1>
            </div>
        </header>

        <main>
            <div class="container">
                <div class="row">
                    <table class="table table-bordered main-table">
                        <thead>
                        <tr>
                            <th>Time</th>
                            <th>USD</th>
                            <th>GBP</th>
                            <th>EUR</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rates as $rate)
                        <tr>
                            <td>{{$rate->created_at}}</td>
                            <td>{{$rate->usd}}</td>
                            <td>{{$rate->gbp}}</td>
                            <td>{{$rate->eur}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
{{$rates->links()}}
    </body>
</html>

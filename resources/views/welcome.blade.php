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
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/style.css') }}" />
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

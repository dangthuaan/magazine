<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Magazine</title>

    <link rel="icon" type="image/png" href="{{ asset('metronic/media/logos/favicon.ico') }}"/>

    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">

    <link href="{{ asset('metronic/vendors/general/sweetalert2/dist/sweetalert2.css') }}" rel="stylesheet"
          type="text/css"/>

    <link rel="stylesheet" href="{{ asset('css/main.css') }}"/>

    @yield('css')

    <style>
        .margin-bottom-10 {
            margin-bottom: 10px;
        }

        .weight-600 {
            font-weight: 600;
        }

        #loading {
            width: 100%;
            height: 100%;
            position: fixed;
            display: block;
            background-color: #646c9a;
            z-index: 999;
            text-align: center;
        }

        #loading-image {
            position: absolute;
            margin: auto;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            z-index: 1000;
        }

        #dom-disabled {
            width: 100%;
            height: 100%;
            position: fixed;
            display: block;
            background-color: transparent;
            z-index: 999;
            text-align: center;
        }

        #ajax-loading {
            text-align: center;
            position: fixed;
            left: 0;
            right: 0;
            z-index: 1000;
            top: 5px;
        }

        #ajax-loading-image {
            width: 50px;
            height: auto;
        }
    </style>
</head>

<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/homestyle.css') }}">
  <link rel="icon" href="{{ asset('favicon.ico') }}?v={{ date('YmdHis') }}">
  <title>Hugo Resende</title>
</head>

@php
  
  $appUrl = env('APP_URL');

@endphp

<!-- Embed the variable in a script tag -->
<script>
  var appUrl = @json($appUrl);
</script>

<body class="container d-flex blue-theme container " id="main">
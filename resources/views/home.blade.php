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
<body class="container d-flex" id="main">



  {{-- CONTAINER MAIN --}}
  <div class="row">


    {{-- FIRST ROW --}}
    <div class="row">

      <div class="text-center p-3 header-container">
        <div class="header-box">
          <div class="rolling-text">
              Welcome to My Fancy Header with Rolling Text!
          </div>
        </div>
      </div>


    </div>


    {{-- SECOND ROW --}}
    <div class="row">

      <div class="col-3 text-left">
        <a class="btn btn-primary p-3 m-2 w-100" href="#"  style="--color: #060606;" id="about">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          About Me
        </a>
        <a class="btn btn-primary p-3 m-2 w-100" href="#"  style="--color: #060606;" id="projects">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Projects
          <i class="fas fa-briefcase"></i>
        </a>

        <a class="btn btn-primary p-3 m-2 w-100" href="#"  style="--color: #060606;" id="resume">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Resume
        </a>
        <a class="btn btn-primary p-3 m-2 w-100" href="#"  style="--color: #060606;" id="build">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Build 
        </a>
    
        <a class="btn btn-primary p-3 m-2 w-100" href="#"  style="--color: #060606;" id="contact">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Contact
        </a>
      </div>

      <div class="col-9 align-items-center">

        <div class="info-box hidden"></div>

      </div>
    </div>




  </div>












</body>

<script src="{{ asset('js/home.js') }}"></script>

</html>


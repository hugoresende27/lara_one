@include('partials.header')


  {{-- CONTAINER MAIN --}}
  <div class="row ">


    {{-- FIRST ROW --}}
    <div class="row">

      <div class="text-center p-3 header-container w-100">
        <div class="header-box">
          <div class="rolling-text hi-melody-regular">
              Welcome to My Fancy Header with Rolling Text!
          </div>
        </div>
      </div>


    </div>


    {{-- SECOND ROW --}}
    <div class="row">

      <div class="col-3 text-left">


        <div class="text-center">
          <label class="switch">
            <input type="checkbox" id="theme-toggle" checked>
            <span class="slider"></span>
          </label>
        </div>

      

        <a class="btn btn-hero p-3 m-2 w-100 playwrite-pe" href="#"  id="about">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          About Me
        </a>
        <a class="btn btn-hero p-3 m-2 w-100 playwrite-pe" href="#"  id="projects">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Projects
          <i class="fas fa-briefcase"></i>
        </a>

        <a class="btn btn-hero p-3 m-2 w-100 playwrite-pe" href="#"  id="resume">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Resume
        </a>
        <a class="btn btn-hero p-3 m-2 w-100 playwrite-pe" href="#"  id="build">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Build 
        </a>
    
        <a class="btn btn-hero p-3 m-2 w-100 playwrite-pe" href="#"  id="contact">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Contact
        </a>

        <a class="btn btn-hero p-3 m-2 w-100 playwrite-pe" href="{{ route('dashboard')}}"  id="contact">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Dashboard
        </a>
      </div>

      <div class="col-9 align-items-center">

        <div class="info-box hidden hi-melody-regular"></div>

      </div>
    </div>




  </div>

<!-- Embed the variable in a script tag -->
<script>
  var appUrl = @json($appUrl);
</script>

<script src="{{ asset('js/home.js') }}"></script>

  @include('partials.footer')










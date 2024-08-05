@include('partials.header')


  {{-- CONTAINER MAIN --}}
  <div class="row ">

    @include('partials.main', ['cam' => $cam ?? null])




  </div>


  @include('partials.footer')










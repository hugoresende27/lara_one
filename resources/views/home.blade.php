@include('partials.header')


  {{-- CONTAINER MAIN --}}
  <div class="row ">

    @include('partials.main', ['textData' => $textData ?? null])




  </div>


  @include('partials.footer')










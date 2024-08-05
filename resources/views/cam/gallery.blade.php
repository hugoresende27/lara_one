@include('partials.header')


  {{-- CONTAINER MAIN --}}
  <div class="row ">

    @include('partials.main', ['gallery' => $gallery ?? null, 'camUploadedFile' => $camUploadedFile ?? null])




  </div>


  @include('partials.footer')










@include('partials.header')

  {{-- CONTAINER MAIN --}}
  <div class="row ">

    @include('partials.main', ['dashboard' => true])


</div>




   


      

<!-- Embed the variable in a script tag -->
<script>
    var appUrl = @json($appUrl);
</script>

<script src="{{ asset('js/textdata/index.js') }}"></script>


@include('partials.footer')

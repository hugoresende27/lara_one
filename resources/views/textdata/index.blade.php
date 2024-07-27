@include('partials.header')


  {{-- CONTAINER MAIN --}}


    <div class="flex text-center">

        <button class="btn btn-success w-100" id="createBtn">Create</button>


        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Name</th>
                    <th>Text</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($textData as $data)
                <tr id="textdata-{{ $data->id }}">
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->type }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->text }}</td>
                    <td>{{ $data->created_at }}</td>
                    <td>{{ $data->updated_at }}</td>
                    <td>
                        
                        {{-- <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#updateTextDataModal" data-id="{{ $data->id }}" id="editBtn">Edit</button> --}}
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#updateTextDataModal" 
                                            data-id="{{ $data->id }}" 
                                            data-type="{{ $data->type }}" 
                                            data-name="{{ $data->name }}" 
                                            data-text="{{ $data->text }}" 
                                            onclick="editTextData({{ $data }})"
                                            id="editButton_{{ $data->id }}">Edit</button>

                        <button class="btn btn-danger btn-sm" onclick="deleteTextData({{ $data->id }})">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
   
    </div>


    <style>

    </style>



    <!-- The Modal -->
    <div id="inputForm" class="modal">

    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Add new entry</h2>
        </div>
        <div class="modal-body">
            <form id="createTextDataForm">
                @csrf
                <div class="mb-3">
                  <label for="type" class="form-label">Type</label>
                  <input type="text" class="form-control" id="type" name="type" required>
                </div>
                <div class="mb-3">
                  <label  
               for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                  <label for="text" class="form-label">Text</label> 
              
                  <textarea class="form-control" id="text" name="text" rows="3" required></textarea>
                </div>
                <button  class="btn btn-primary" id="createSubmitBtn">Save</button>  
                <button  class="btn btn-secondary" id="updateSubmitBtn">Update</button>  
              </form>
        </div>
        <div class="modal-footer">
            <h3>Textdata</h3>
        </div>
    </div>





      

<!-- Embed the variable in a script tag -->
<script>
    var appUrl = @json($appUrl);
</script>

<script src="{{ asset('js/textdata/index.js') }}"></script>


@include('partials.footer')

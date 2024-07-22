@include('partials.header')


  {{-- CONTAINER MAIN --}}


    <div class="flex text-center">
        <a href="{{ route('textdata.create')}}" >
            <button class="btn btn-hero w-100">Create</button>
        </a>

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
                        <a href="{{ route('textdata.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm" onclick="deleteTextData({{ $data->id }})">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
   
    </div>



<script>



function deleteTextData(id) {
        var appUrl = @json($appUrl);
        if (confirm('Are you sure you want to delete this item?')) {
            fetch(appUrl + `/api/textdata/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                if (response.ok) {
                    document.getElementById(`textdata-${id}`).remove();
                } else {
                    alert('Failed to delete the item.');
                }
            })
            .catch(error => console.error('Error:', error));
        }
    }
    </script>

  @include('partials.footer')

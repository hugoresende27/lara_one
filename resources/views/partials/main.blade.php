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

      
        @if (isset($config) || isset ($textdata))
          <a class="btn btn-hero p-3 m-2 w-100 playwrite-pe"href="{{ route('home')}}" id="">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Home
          </a>
          <a class="btn btn-hero p-3 m-2 w-100 playwrite-pe"href="{{ route('textdata.all')}}" id="">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            TextData
          </a>

       
    
  
        @else

       

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
            Config
          </a>

        @endif
      </div>

      <div class="col-9 align-items-center">

        @if (isset($textdata))

          
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
        
          </div>
          
    
    
      
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
        @else
          <div class="info-box hidden hi-melody-regular"></div>

        @endif
      </div>
    </div>
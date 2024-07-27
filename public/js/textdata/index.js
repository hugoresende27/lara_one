

////// ----------------------------------------------------------- CREATE NEW ENTRY

// Get the modal
var modal = document.getElementById("inputForm");

// Get the button that opens the modal
var btn = document.getElementById("createBtn");


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";

    document.getElementById('updateSubmitBtn').style.display = 'none';
    // Access form fields in the modal
    const typeInput = document.getElementById('type');
    const nameInput = document.getElementById('name');
    const textInput = document.getElementById('text');
    
    // Populate form fields with the passed data
    typeInput.value = '';
    nameInput.value = '';
    textInput.value = '';
}


// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}



var createTextDataForm = document.getElementById('createTextDataForm');

const createBtn = document.getElementById('createSubmitBtn'); // Assuming you have an update button

createBtn.addEventListener('click', function() {


console.log('CREATE NEW');
// Handle form submission logic (fetch API or other methods)
// Get form data
const formData = new FormData(createTextDataForm);

// Convert form data to JSON object
const data = Object.fromEntries(formData.entries());

// Send POST request to the API
fetch('/api/textdata', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Replace with your CSRF token
    },
    body: JSON.stringify(data)
})
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log('Success:', data);

        // Close the modal
        var modal = document.getElementById("inputForm");
        modal.style.display = "none";

        // Add new row to the table
        const tableBody = document.querySelector('tbody');
        const newRow = document.createElement('tr');

        
        newRow.innerHTML = `
                                <td>${data.id}</td>
                                <td>${data.type}</td>
                                <td>${data.name}</td>
                                <td>${data.text}</td>
                                <td>${data.created_at}</td>
                                <td>${data.updated_at}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#updateTextDataModal" 
                                                        data-id="${ data.id }" 
                                                        data-type="${ data.type }" 
                                                        data-name="${ data.name }" 
                                                        data-text="${ data.text }" 
                                                        id="editBtn">Edit</button>

                                    <button class="btn btn-danger btn-sm" onclick="deleteTextData(${ data.id })">Delete</button>
                                </td>
                                `;
        tableBody.appendChild(newRow);
    })
    .catch(error => {
        console.error('Error:', error);
        // Handle error, e.g., display error message
    });

})

////// ----------------------------------------------------------- DELETE ENTRY
function deleteTextData(id) {

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


////// ----------------------------------------------------------- EDIT ENTRY
function editTextData(data) {

    const editBtn = document.getElementById("editButton_" + data.id);


    if (editBtn) {
       

        modal.style.display = "block";
        document.getElementById('createSubmitBtn').style.display = 'none';
        const id = data.id;
        const type = data.type;
        const name = data.name;
        const text = data.text;
    
        showUpdateModal(id, type, name, text);
        
    }
}





function showUpdateModal(id, type, name, text) {
    const modal = document.getElementById('inputForm');
  

    // Access form fields in the modal
    const typeInput = document.getElementById('type');
    const nameInput = document.getElementById('name');
    const textInput = document.getElementById('text');
  
    // Populate form fields with the passed data
    typeInput.value = type;
    nameInput.value = name;
    textInput.value = text;
  
    modal.style.display = "block";
  // Add event listener to the update button within the modal
  const updateBtn = document.getElementById('updateSubmitBtn'); // Assuming you have an update button

  updateBtn.addEventListener('click', function() {
    // Get updated form data
    const updatedData = {
      type: typeInput.value,
      name: nameInput.value,
      text: textInput.value,
    };

    // Send PUT request to the API, including the ID in the URL
    fetch(`/api/textdata/${id}`, {
      method: 'PUT',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Replace with your CSRF token
      },
      body: JSON.stringify(updatedData)
    })
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json();
    })
    .then(data => {
      console.log('Update Success:',  data);

      // Update the existing table row (replace with your logic)
      const tableRow = document.getElementById(`textdata-${id}`);
      // Update content of table cells or replace the entire row with new data based on "data"
      console.log(tableRow)
      // Close the modal
      modal.style.display = "none";
    })
    .catch(error => {
      console.error('Update Error:', error);
      // Handle error, e.g., display error message
    });
  });
}


  

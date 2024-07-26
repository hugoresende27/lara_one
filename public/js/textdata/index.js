// Get the modal
var modal = document.getElementById("inputForm");

// Get the button that opens the modal
var btn = document.getElementById("createBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
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

// Add event listener to the form
var createTextDataForm = document.getElementById('createTextDataForm');
createTextDataForm.addEventListener('submit', function (event) {
    event.preventDefault();

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
                                    <td></td>
                                    <td>
                                        <a href="{{ route('textdata.edit', ':id') }}" class="btn btn-warning btn-sm">Edit</a>
                                        <button class="btn btn-danger btn-sm" onclick="deleteTextData(:id)">Delete</button>
                                    </td>
                                    `;
            tableBody.appendChild(newRow);
        })
        .catch(error => {
            console.error('Error:', error);
            // Handle error, e.g., display error message
        });





});

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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Users List</h2>

<!-- Create User Form -->
<form id="userForm">
    @csrf
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Create</button>
</form>

<table id="userTable">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr id="user_{{ $user->id }}">
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <button onclick="deleteUser({{ $user->id }})">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
document.getElementById('userForm').addEventListener('submit', function(event) {
    event.preventDefault();
    let formData = new FormData(this);

    fetch("{{ route('users.store') }}", {
        method: "POST",
        body: formData,
        headers: {
            "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
            "Accept": "application/json" // Add this line
        },
        credentials: "same-origin" // Add this line
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(user => {
        location.reload();
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to create user');
    });
});

function deleteUser(id) {
    if(!confirm('Are you sure you want to delete this user?')) return;
    
    fetch(`/users/${id}/delete`, {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
            "Accept": "application/json"
        },
        credentials: "same-origin"
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(() => {
        document.getElementById(`user_${id}`).remove();
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to delete user');
    });
}
</script>
</body>
</html>

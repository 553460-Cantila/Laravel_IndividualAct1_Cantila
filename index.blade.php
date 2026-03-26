<!DOCTYPE html>
<html>
<head>
    <title>Candidates</title>
</head>
<body>
    <h1>Add candidate</h1>
    <form method="POST" action="/candidates/store">
        @csrf
        <label>First Name:</label><br>
        <input type="text" name="first_name" required><br><br>
        <label>Middle Name:</label><br>
        <input type="text" name="middle_name"><br><br>
        <label>Last Name:</label><br>
        <input type="text" name="last_name" required><br><br>
        <label>Gender:</label><br>
        <input type="text" name="gender" required><br><br>  
        <label>Address:</label><br>
        <input type="text" name="address" required><br><br>
        <label>Position:</label><br>
        <input type="text" name="position" required><br><br>
        <label>Party:</label><br>
        <input type="text" name="party"><br><br>

        <button type="submit">Save</button>
    </form>

    <hr>

    <h1>Candidate List</h1>

    <form method="GET" action="{{ url('/candidates') }}">
        <input type="text" name="search" placeholder="Search" value="{{ request('search') }}">
        <button type="submit">Search</button>
        @if(request('search'))
            <a href="{{ url('/candidates') }}">Clear</a>
        @endif
    </form>
    <br>

    <table border="1" cellpadding="10">
        <tr>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Position</th>
            <th>Party</th>
            <th>Actions</th>
        </tr>

        @foreach($candidates as $candidate)
        <tr>
            <td>{{ $candidate->first_name }}</td>
            <td>{{ $candidate->middle_name }}</td>
            <td>{{ $candidate->last_name }}</td>
            <td>{{ $candidate->gender }}</td>
            <td>{{ $candidate->address }}</td>
            <td>{{ $candidate->position }}</td>
            <td>{{ $candidate->party }}</td>
            <td>
                <a href="/candidates/edit/{{ $candidate->id }}">Edit</a>
                |
                <a href="/candidates/delete/{{ $candidate->id }}" onclick="return confirm('Are you sure you want to delete this candidate?')">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
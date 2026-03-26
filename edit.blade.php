<!DOCTYPE html>
<html>
<head>
    <title>Edit candidate</title>
</head>
<body>
    <h1>Edit candidate</h1>
        <form method="POST" action="/candidates/update/{{ $candidate->id }}">
        @csrf
        <label>First Name:</label><br>
        <input type="text" name="first_name" value="{{ $candidate->first_name }}" required><br><br>
        <label>Middle Name:</label><br>
        <input type="number" name="middle_name" value="{{ $candidate->middle_name }}"><br><br>
        <label>Last Name:</label><br>
        <input type="text" name="last_name" value="{{ $candidate->last_name }}" required><br><br>
        <label>Gender:</label><br>
        <input type="text" name="gender" value="{{ $candidate->gender }}" required><br><br>
        <label>Address:</label><br>
        <input type="text" name="address" value="{{ $candidate->address }}" required><br><br>
        <label>Position:</label><br>
        <input type="text" name="position" value="{{ $candidate->position }}" required><br><br>
        <label>Party:</label><br>
        <input type="text" name="party" value="{{ $candidate->party }}"><br><br>

        <button type="submit">Update</button>
        </form>
        <br>
        <a href="/candidates">Back to Candidate List</a>
</body>
</html>
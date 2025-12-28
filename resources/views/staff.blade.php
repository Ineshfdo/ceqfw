<!DOCTYPE html>
<html>
<head>
    <title>Staff Members</title>
</head>
<body>
<a href="/">Go Back</a>
    <h2>Staff List</h2>

    <table border="1">
        <tr>
            <th>Name</th>
            <th>Experience</th>
            <th>Salary</th>
            <th>Position</th>
        </tr>

        @foreach ($staffMembers as $staff)
            <tr>
                <td>{{ $staff['name'] }}</td>
                <td>{{ $staff['experience'] }} years</td>
                <td>Rs. {{ number_format($staff['salary']) }}</td>
                 <td>
                    @if ($staff['experience'] < 2)
                        Junior
                    @else
                        Senior
                    @endif
                 </td>
            </tr>
        @endforeach
    </table>

</body>
</html>
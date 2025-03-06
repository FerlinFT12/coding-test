<h2>Employee & Manager List</h2>
<form action="{{ route('employees.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email">
    <input type="text" name="phone" placeholder="Phone">
    <input type="text" name="position" placeholder="Position" required>
    <input type="number" name="salary" placeholder="Salary" required>
    <label>
        <input type="checkbox" name="is_manager"> Is Manager?
    </label>
    <input type="number" name="bonus" placeholder="Bonus (for Manager)">
    <button type="submit">Add Employee</button>
</form>

<h3>Employee List</h3>
<table border="1">
    <tr><th>Name</th><th>Position</th><th>Salary</th><th>Status</th><th>Action</th></tr>
    @foreach($employees as $employee)
    <tr>
        <td>{{ $employee->name }}</td>
        <td>{{ $employee->position }}</td>
        <td>{{ $employee->salary }}</td>
        <td>{{ $employee->salary_status }}</td>
        <td>
            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                @csrf @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<h3>Manager List</h3>
<table border="1">
    <tr><th>Name</th><th>Position</th><th>Salary</th><th>Bonus</th><th>Total Earnings</th><th>Action</th></tr>
    @foreach($managers as $manager)
    <tr>
        <td>{{ $manager->name }}</td>
        <td>{{ $manager->position }}</td>
        <td>{{ $manager->salary }}</td>
        <td>{{ $manager->bonus }}</td>
        <td>{{ $manager->totalEarnings() }}</td>
        <td>
            <form action="{{ route('employees.destroy', $manager->id) }}" method="POST">
                @csrf @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

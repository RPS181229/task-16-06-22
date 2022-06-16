@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6"><h2>Employee</h2></div>
        <div class="col-md-6">
            <a class="btn btn-primary" href="{{ route('employee.create') }}">Add Employee </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table id="employee" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @if(!empty($employees))
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{ $employee->first_name }}</td>
                            <td>{{ $employee->last_name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td style="display: flex;">
                                <a href="{{ route('employee.edit', $employee->id) }}" title="Update" class="btn btn-primary">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a href="{{ route('changePassword', $employee->id) }}" title="Update Password" class="btn btn-secondary">
                                    <i class="fa fa-key"></i>
                                </a>

                                <form action="{{ route('employee.destroy', $employee->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" title="delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?');">
                                        <i class="fas fa-trash fa-lg"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>


    <script>
        $(document).ready(function () {
            $('#employee').DataTable();
        });
    </script>
@endsection

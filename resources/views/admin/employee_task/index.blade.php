<x-admin>
    @section('title')
        {{ 'task' }}
    @endsection
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">task Table</h3>


        </div>
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th> title</th>
                    <th>employee</th>
                    <th>status</th>
                    <th>Created</th>
                    <th>control</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->manager->full_name }}</td>
                        <td>{{ $item->employeeTask->status }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <a href="{{route('admin.employee_task.edit' , $item->id)}}" class="nav-link btn-info col-4">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-admin>

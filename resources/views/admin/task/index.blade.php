<x-admin>
    @section('title')
        {{ 'task' }}
    @endsection
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">task Table</h3>

            <div class="col-2 float-right ml-3 ">
                <a type="button" href="{{route('admin.task.create')}}"
                   class="btn btn-block  btn-primary float-right">add</a>
            </div>
            <div class="row float-right">
                <form>
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="key_word" class="form-control rounded-0">
                        <span class="input-group-append">
                    <button type="submit" class="btn btn-info btn-flat">Search!</button>
                </span>
                    </div>
                </form>
            </div>

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
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->employeeTask?->employee->full_name }}</td>
                        <td>{{ $item->employeeTask->status }}</td>
                        <td>{{ $item->created_at }}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-admin>

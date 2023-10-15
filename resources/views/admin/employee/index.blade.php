<x-admin>
    @section('title')
        {{ 'Employee' }}
    @endsection
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Employee Table</h3>

            <div class="col-2 float-right ml-3 ">
                <a type="button" href="{{route('admin.employee.create')}}"
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
                    <th>Full name</th>
                    <th>Email</th>
                    <th>Created</th>
                    <th>control</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->full_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            @if(auth()->user()->user_type == 'super_admin')
                                <a href="{{route('admin.employee.edit' , $user->id)}}" class="nav-link btn-info col-4">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="post" action="{{route('admin.employee.destroy' , $user->id)}}">
                                    @csrf  @method('DELETE')
                                    <button type="submit" class="nav-link btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-admin>

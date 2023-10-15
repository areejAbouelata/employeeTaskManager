<x-admin>
    @section('title')
        {{ 'Employee' }}
    @endsection
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Employee </h3>
        </div>

        <div class="card-body p-0">
                {!! Form::model($user,['route' => ['admin.employee.update',$user->id] , 'method' => 'PUT' , 'files' => true ,'class' => '' ]) !!}

                @include('admin.employee.form')
                <div class="input-group mb-3">

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block float-left">Save</button>
                    </div>
                    <!-- /.col -->
                </div>

            {!! Form::close() !!}

        </div>

    </div>
</x-admin>

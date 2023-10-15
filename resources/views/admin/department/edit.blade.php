<x-admin>
    @section('title')
        {{ 'department' }}
    @endsection
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">department </h3>
        </div>

        <div class="card-body p-0">
                {!! Form::model($department,['route' => ['admin.department.update',$department->id] , 'method' => 'PUT' , 'files' => true ,'class' => '' ]) !!}

                @include('admin.department.form')
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

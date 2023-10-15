<x-admin>
    @section('title')
        {{ 'task' }}
    @endsection
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">task </h3>
        </div>

        <div class="card-body p-0">
            {!! Form::model($task,['route' => ['admin.employee_task.update',$task->id] , 'method' => 'PUT' , 'files' => true ,'class' => '' ]) !!}
                @include('admin.employee_task.form')
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

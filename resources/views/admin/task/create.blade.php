<x-admin>
    @section('title')
        {{ 'task' }}
    @endsection
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">task </h3>
        </div>

        <div class="card-body p-0">
            <form action="{{route('admin.task.store')}}"  method="post"  enctype="multipart/form-data">
                @include('admin.task.form')
                <div class="input-group mb-3">

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block float-left">Save</button>
                    </div>
                    <!-- /.col -->
                </div>

            </form>
        </div>

    </div>
</x-admin>

<x-admin>
    @section('title')
        {{ 'Employee' }}
    @endsection
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Employee </h3>
        </div>

        <div class="card-body p-0">
            <form action="{{route('admin.employee.store')}}"  method="post"  enctype="multipart/form-data">
                @include('admin.employee.form')
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

@csrf
<div class="input-group mb-3">
    <input id="name" class="form-control" type="text" name="title"
           value="{{isset($task)? $task->title :null  }}"
           required autofocus autocomplete="title" placeholder="Enter title">
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-user"></span>
        </div>
    </div>
    <x-input-error :messages="$errors->get('title')" class="text-danger"/>
</div>

{{--select manager --}}
<div class="input-group mb-3">
    <div class="form-group">
        <label for="exampleSelectBorder">employee </label>
        <select class="custom-select form-control-border" id="exampleSelectBorder" name="employee_id">
            <option></option>
            @foreach($employees as $employee)
                    <option value="{{$employee->id}}">{{$employee->name}}</option>
            @endforeach
        </select>
    </div>
</div>
<!-- /.col -->

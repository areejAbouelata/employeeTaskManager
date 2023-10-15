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
        <label for="exampleSelectBorder">status </label>
        <select class="custom-select form-control-border" id="exampleSelectBorder" name="status">
            <option></option>
            <option value="started_by_employee">started</option>
            <option value="finished_by_employee">finished</option>
        </select>
    </div>
</div>
<!-- /.col -->

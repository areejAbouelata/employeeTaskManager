@csrf
<div class="input-group mb-3">
    <input id="name" class="form-control" type="text" name="name"
           value="{{isset($department)? $department->name :null  }}"
           required autofocus autocomplete="name" placeholder="Enter name">
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-user"></span>
        </div>
    </div>
    <x-input-error :messages="$errors->get('name')" class="text-danger"/>
</div>

{{--select manager --}}
<div class="input-group mb-3">
    <div class="form-group">
        <label for="exampleSelectBorder">manager </label>
        <select class="custom-select form-control-border" id="exampleSelectBorder" name="manager_id">
            <option></option>
            @foreach($managers as $manager)
                @if(isset($department)&&$department->manager_id == $manager->id)

                    <option value="{{$manager->id}}" selected>{{$manager->name}}</option>
                @else
                    <option value="{{$manager->id}}">{{$manager->name}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>
<!-- /.col -->

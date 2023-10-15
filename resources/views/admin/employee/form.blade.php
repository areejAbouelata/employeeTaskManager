@csrf
<div class="input-group mb-3">
    <input id="name" class="form-control" type="text" name="name" value="{{isset($user)? $user->name :null  }}"
           required autofocus autocomplete="name" placeholder="Enter name">
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-user"></span>
        </div>
    </div>
    <x-input-error :messages="$errors->get('name')" class="text-danger"/>
</div>
<div class="input-group mb-3">
    <input id="name" class="form-control" type="text" name="last_name" value="{{isset($user)? $user->last_name :null  }}"
           required autofocus autocomplete="last_name" placeholder="Enter last name">
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-user"></span>
        </div>
    </div>
    <x-input-error :messages="$errors->get('last_name')" class="text-danger"/>
</div>
<div class="input-group mb-3">
    <input id="email" class="form-control" type="email" name="email" value="{{isset($user)? $user->email :null  }}"
           required autocomplete="username" placeholder="Enter email address">
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-envelope"></span>
        </div>
    </div>
    <x-input-error :messages="$errors->get('email')" class="text-danger"/>
</div>
<div class="input-group mb-3">
    <input id="password" class="form-control" type="password" name="password"
           autocomplete="new-password" placeholder="Enter password">
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-lock"></span>
        </div>
    </div>
    <x-input-error :messages="$errors->get('password')" class="text-danger"/>
</div>
<div class="input-group mb-3">
    <input id="salary" class="form-control" type="number" name="salary" value="{{isset($user)? $user->employee->salary :null  }}"
           required autocomplete="salary" placeholder="Enter salary">
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-envelope"></span>
        </div>
    </div>
    <x-input-error :messages="$errors->get('salary')" class="text-danger"/>
</div>
<div class="input-group mb-3">
    <input id="image" class="form-control" type="file" name="image" :value="old('image')"
            autocomplete="image" placeholder="Enter image">
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-envelope"></span>
        </div>
    </div>
    <x-input-error :messages="$errors->get('image')" class="text-danger"/>
</div>
{{--select manager --}}
<div class="input-group mb-3">
    <div class="form-group">
        <label for="exampleSelectBorder">manager </label>
        <select class="custom-select form-control-border" id="exampleSelectBorder" name="manager_id">
            <option></option>
            @foreach($managers as $manager)
                @if(isset($user)&&$user->employee->manager_id == $manager->id)

                <option value="{{$manager->id}}" selected >{{$manager->name}}</option>
                @else
                <option value="{{$manager->id}}" >{{$manager->name}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>
<div class="input-group mb-3">
    <div class="form-group">
        <label for="exampleSelectBorder">department </label>
        <select class="custom-select form-control-border" id="exampleSelectBorder" name="department_id">
            <option></option>
            @foreach($departments as $department)
                @if(isset($user)&&$user->employee->department_id == $department->id)

                <option value="{{$department->id}}" selected >{{$department->name}}</option>
                @else
                <option value="{{$department->id}}" >{{$department->name}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>
<!-- /.col -->

<div class="box-body">
    {!! Form::normalInput('name', 'Tên tiệm', $errors,$qlytiems) !!}
    {!! Form::normalTextarea('description', 'Mô tả tiệm', $errors,$qlytiems) !!}

    <div class="form-group dropdown" id="khachhang">
        <label for="user_id">Quản lý tiệm</label>
        <select name="user_id" id="user_id" class="form-control blah">
            <option value="">Chọn quản lý tiệm</option>
            <?php foreach ($users as $user) {?>
                <option data-id-user="{{$user->id}}" <?php echo $user_id == $user->id ? 'selected' : '';?> value="{{$user->id}}">{{$user->first_name .' '.$user->last_name}} </option>
            <?php }?>
        </select>
    </div> 
</div>

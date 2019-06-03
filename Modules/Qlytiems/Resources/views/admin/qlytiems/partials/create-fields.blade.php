<div class="box-body">
    {!! Form::normalInput('name', 'Tên tiệm', $errors) !!}
    {!! Form::normalTextarea('description', 'Mô tả tiệm', $errors) !!}

    <div class="form-group dropdown" id="khachhang">
        <label for="user_id">Quản lý tiệm</label>
        <select name="user_id" id="user_id" class="form-control blah">
            <option value="">Chọn quản lý tiệm</option>
            <?php foreach ($users as $user) {?>
                <option data-id-user="{{$user->id}}" value="{{$user->id}}">{{$user->first_name .' '.$user->last_name}} </option>
            <?php }?>
        </select>
    </div> 
</div>
    


<div class="box-body">
<div class ="row">
    <div class ="col-sm-6">
        <div class="form-group ">
            <label for="firstname">Họ và tên</label>
            <input placeholder="Họ và tên" name="fullname" type="text" id="fullname" class="form-control" value="{{$qlyuser->firstname .' '.$qlyuser->lastname}}">
        </div>   
        <div class="form-group dropdown">
            <label for="country_id">Giới tính</label>
            <select id="gender" name="gender" class="form-control">
                <option value="1" <?php echo $gender_id == 1 ? 'selected' : ''?>>Nam</option>
                <option value="2" <?php echo $gender_id == 2 ? 'selected' : ''?>>Nữ</option>           
            </select>
        </div>
    </div>
    <div class ="col-sm-6">
        {!! Form::normalInput('mail', 'Email', $errors, $qlyuser) !!}
        {!! Form::normalInput('phone', 'Số điện thoại', $errors, $qlyuser) !!}
    </div>
    <div class ="col-sm-12">
        {!! Form::normalInput('address', 'Địa chỉ', $errors, $qlyuser) !!}
    </div>
</div>    
</div>

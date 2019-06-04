
<div class="box-body">   
    <div class ="row">
        <div class ="col-sm-6">
            <div class="form-group ">
                <label for="firstname">Họ và tên</label>
                <input placeholder="Họ và tên" name="fullname" type="text" id="fullname" class="form-control">
            </div>       

            <div class="form-group dropdown">
                <label for="gender">Giới tính</label>
                <select id="gender" name="gender" class="form-control">
                    <option value="1">Nam</option>
                    <option value="2">Nữ</option>           
                </select>
            </div>  
        </div>
        <div class ="col-sm-6">
            {!! Form::normalInput('mail', 'Email', $errors) !!}
            {!! Form::normalInput('phone', 'Số điện thoại', $errors) !!}            
        </div>   
        <div class ="col-sm-12">
         {!! Form::normalInput('address', 'Địa chỉ', $errors) !!}
        </div>
       
    </div>
 
</div>

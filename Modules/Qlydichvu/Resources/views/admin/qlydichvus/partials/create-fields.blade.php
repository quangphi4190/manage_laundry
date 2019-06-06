<div class="box-body">
    {!! Form::normalInput('name', 'Tên dịch vụ', $errors) !!}    
    {!! Form::normalInput('code', 'Mã dịch vụ', $errors) !!}    
    <div class="form-group ">
        <label for="price">Giá dịch vụ</label>
        <input type="text" class="form-control" name="price" value="0" step=".01" data-variavel="price"   >
    </div>
    <div class="form-group dropdown">
        <label for="type">Loại dịch vụ</label>
        <select name="type" id="type" class="form-control blah">
            <option value="">Chọn loại dịch vụ</option>
            <option value="giac"> Giặc</option>
            <option value="say"> Sấy</option>
            <option value="la"> Là </option>
            <option value="giacsay"> Giặc sấy</option>        
        </select>
    </div> 
    {!! Form::normalTextarea('note', 'Ghi chú', $errors) !!}
</div>

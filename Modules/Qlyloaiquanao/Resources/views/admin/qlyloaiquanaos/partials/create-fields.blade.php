<div class="box-body">
    {!! Form::normalInput('name', 'Tên', $errors) !!}    

    <div class="form-group dropdown">
        <label for="type">Loại sản phẩm</label>
        <select name="type" id="type" class="form-control blah">
            <option value="">Chọn loại sản phẩm</option>
            <option value="quanjean">Quần Jean</option>
            <option value="quankaki">Quần Kaki</option>
            <option value="quantay">Quần Tây</option>
            <option value="aothun">Áo thun</option>
            <option value="aosomi">Áo Sơ mi</option>    
            <option value="aoquanda">Áo/Quần Da</option>
            <option value="gaubong">Gấu bông</option>      
            <option value="khac">Khác</option>           
        </select>
    </div> 
    <!-- {!! Form::normalInput('number', 'Số lương', $errors) !!}     -->
    <div class="form-group ">
        <label for="number">Số lương</label>
        <input class="form-control" placeholder="Số lương" name="number" type="number" id="number">
    </div>
    {!! Form::normalTextarea('note', 'Ghi chú', $errors) !!}
</div>
    
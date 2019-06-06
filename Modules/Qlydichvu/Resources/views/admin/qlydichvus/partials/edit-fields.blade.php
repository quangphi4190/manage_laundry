<?php
$arr_type =[
    'giac' =>  'Giặc',
    'say' =>  'Sấy',
    'la' =>  'Là',
    'giacsay' =>  'Giặc sấy'
]
 ?>
<div class="box-body">
    {!! Form::normalInput('name', 'Tên dịch vụ', $errors,$qlydichvu) !!}    
    {!! Form::normalInput('code', 'Mã dịch vụ', $errors,$qlydichvu) !!}    
    <div class="form-group ">
        <label for="price">Giá dịch vụ</label>
        <input type="text" class="form-control" name="price" step=".01" data-variavel="price"  value ="{{$qlydichvu->price}}"  >
    </div>
     
    <div class="form-group dropdown">
        <label for="type">Loại dịch vụ</label>
        <select name="type" id="type" class="form-control blah">
            <option value="">Chọn loại dịch vụ</option>
            <option value="giac"> Giặc</option>
            <?php foreach ($arr_type as $key => $value ):?>  
                <option <?php echo $type ===  $key ? 'selected' : ''?> value="{{$key}}">{{$value}}</option>
            <?php endforeach?>        
        </select>
    </div> 
    {!! Form::normalTextarea('note', 'Ghi chú', $errors,$qlydichvu) !!}
</div>

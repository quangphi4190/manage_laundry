<?php
$arr_type =[
    'quanjean' =>  'Quần Jean',
    'quankaki' =>  'Quần Kaki',
    'quantay' =>  'Quần Tây',
    'aothun' =>  'Áo thun',
    'aosomi' =>  'Áo Sơ mi',
    'aoquanda' =>  'Áo/Quần Da',
    'gaubong' =>  'Gấu bông',
    'khac' =>  'Khác',
]
 ?>
<div class="box-body">
    {!! Form::normalInput('name', 'Tên', $errors,$qlyloaiquanao) !!}    

    <div class="form-group dropdown">
        <label for="type">Loại sản phẩm</label>
        <select name="type" id="type" class="form-control blah">
            <option value="">Chọn loại sản phẩm</option>
            <?php foreach ($arr_type as $key => $value ):?>  
                <option <?php echo $type ===  $key ? 'selected' : ''?> value="{{$key}}">{{$value}}</option>
            <?php endforeach?>    
        </select>
    </div> 
    {!! Form::normalInput('number', 'Số lượng', $errors,$qlyloaiquanao) !!}    
    
    {!! Form:: normalTextarea('note', 'Ghi chú', $errors, $qlyloaiquanao) !!}
</div>
    
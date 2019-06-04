<div class="box-body">
<div class = "row">
    <div class ="col-sm-12">
    @mediaSingle('Hình ảnh thiết bị')
    </div>   
    <div class ="col-sm-6">
    {!! Form::normalInput('name', 'Tên thiết bị', $errors) !!}
    {!! Form::normalInput('model', 'Model', $errors) !!}
    {!! Form::normalInput('noisanxuat', 'Nơi sản xuất', $errors) !!}
    {!! Form::normalInput('congsuat', 'Công suất', $errors) !!}
    </div>
    <div class="col-sm-6">    
    {!! Form::normalInput('dongco', 'Động cơ', $errors) !!}
    {!! Form::normalInput('kichthuoc', 'Kích thước', $errors) !!}
    {!! Form::normalInput('trongluong', 'Trọng lượng', $errors) !!}
    {!! Form::normalInput('dienap', 'Điện áp', $errors) !!}
    </div>
</div> 
    {!! Form::normalTextarea('description', 'Mô tả thiết bị', $errors) !!}
</div>
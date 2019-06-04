<div class="box-body">
<div class = "row">
<div class ="col-sm-12">
@mediaSingle('Hình ảnh thiết bị', $qlythietbi)
</div>
    <div class ="col-sm-6">
    {!! Form::normalInput('name', 'Tên thiết bị', $errors,$qlythietbi) !!}
    {!! Form::normalInput('model', 'Model', $errors,$qlythietbi) !!}
    {!! Form::normalInput('noisanxuat', 'Nơi sản xuất', $errors,$qlythietbi) !!}
    {!! Form::normalInput('congsuat', 'Công suất', $errors,$qlythietbi) !!}
    </div>
    <div class="col-sm-6">    
    {!! Form::normalInput('dongco', 'Động cơ', $errors,$qlythietbi) !!}
    {!! Form::normalInput('kichthuoc', 'Kích thước', $errors,$qlythietbi) !!}
    {!! Form::normalInput('trongluong', 'Trọng lượng', $errors,$qlythietbi) !!}
    {!! Form::normalInput('dienap', 'Điện áp', $errors,$qlythietbi) !!}
    </div>
</div> 
    {!! Form::normalTextarea('description', 'Mô tả thiết bị', $errors,$qlythietbi) !!}
</div>

<?php

namespace Modules\Qlythietbi\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class Qlythietbi extends Model
{
    use Translatable,MediaRelation;

    protected $table = 'qlythietbi__qlythietbis';
    public $translatedAttributes = [];
    protected $fillable = ['name','description','status','model','noisanxuat','congsuat','duongkinhlong','dosaulong','tocdogiac','tocdovat','congsuatbom','dongco','kichthuoc','trongluong','dienap'];
    protected $with = ['files'];
}

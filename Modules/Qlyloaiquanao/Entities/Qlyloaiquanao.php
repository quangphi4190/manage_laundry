<?php

namespace Modules\Qlyloaiquanao\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Qlyloaiquanao extends Model
{
    use Translatable;

    protected $table = 'qlyloaiquanao__qlyloaiquanaos';
    public $translatedAttributes = [];
    protected $fillable = ['name','type','note','number'];
}

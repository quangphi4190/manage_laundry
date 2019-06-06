<?php

namespace Modules\Qlydichvu\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Qlydichvu extends Model
{
    use Translatable;

    protected $table = 'qlydichvu__qlydichvus';
    public $translatedAttributes = [];
    protected $fillable = ['name','note','type','status','price','code'];
}

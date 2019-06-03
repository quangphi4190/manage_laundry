<?php

namespace Modules\Qlygoithang\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Qlygoithang extends Model
{
    use Translatable;

    protected $table = 'qlygoithang__qlygoithangs';
    public $translatedAttributes = [];
    protected $fillable = [];
}

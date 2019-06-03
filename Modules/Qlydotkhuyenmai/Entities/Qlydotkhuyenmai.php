<?php

namespace Modules\Qlydotkhuyenmai\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Qlydotkhuyenmai extends Model
{
    use Translatable;

    protected $table = 'qlydotkhuyenmai__qlydotkhuyenmais';
    public $translatedAttributes = [];
    protected $fillable = [];
}

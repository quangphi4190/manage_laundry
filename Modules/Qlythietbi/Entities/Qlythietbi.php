<?php

namespace Modules\Qlythietbi\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Qlythietbi extends Model
{
    use Translatable;

    protected $table = 'qlythietbi__qlythietbis';
    public $translatedAttributes = [];
    protected $fillable = [];
}

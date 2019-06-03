<?php

namespace Modules\Qlythuebaocuakhach\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Qlythuebaocuakhach extends Model
{
    use Translatable;

    protected $table = 'qlythuebaocuakhach__qlythuebaocuakhaches';
    public $translatedAttributes = [];
    protected $fillable = [];
}

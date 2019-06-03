<?php

namespace Modules\Qlyuser\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Qlyuser extends Model
{
    use Translatable;

    protected $table = 'qlyuser__qlyusers';
    public $translatedAttributes = [];
    protected $fillable = [];
}

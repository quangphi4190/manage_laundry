<?php

namespace Modules\Qlytiems\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Qlytiems extends Model
{
    use Translatable;

    protected $table = 'qlytiems__qlytiems';
    public $translatedAttributes = [];
    protected $fillable = [
        'name',
        'description',
        'status',
        'user_id'
    ];
}

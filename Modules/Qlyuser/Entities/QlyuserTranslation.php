<?php

namespace Modules\Qlyuser\Entities;

use Illuminate\Database\Eloquent\Model;

class QlyuserTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'qlyuser__qlyuser_translations';
}

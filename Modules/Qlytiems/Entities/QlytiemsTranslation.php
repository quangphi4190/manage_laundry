<?php

namespace Modules\Qlytiems\Entities;

use Illuminate\Database\Eloquent\Model;

class QlytiemsTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'qlytiems__qlytiems_translations';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PisoWifi_parts_accessories extends Model
{
    protected $table = 'pisowifi_parts_accessories';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = false;

    protected $guarded = [];
}

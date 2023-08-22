<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackagingMonitoring_Model extends Model
{
    use HasFactory;

    public $table = '_packaging_monitoring';
        public $primaryKey = 'id';
        public $incrementing = 'true';
        public $timestamps = 'false';
}

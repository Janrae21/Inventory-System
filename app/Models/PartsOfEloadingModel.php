<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartsOfEloadingModel extends Model
{
    protected $table = '_parts_of_eloading';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;


    protected $guarded = [];

}

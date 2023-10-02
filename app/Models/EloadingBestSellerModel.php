<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class EloadingBestSellerModel extends Model
{
    use HasFactory;

    protected $table = '_eloading_best_seller';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;


    protected $fillable = [

        'Item',
        'Quantity',
        'Category',
        'Date',

    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';

    public $timestamps = false;

    function Category(){
        return $this->belongsTo(Category::class, 'id_category', 'id_category');
    }
}

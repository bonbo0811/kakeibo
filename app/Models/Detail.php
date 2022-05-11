<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{

    protected $table = 'detail';

    protected $fillable =
    ['genre','name','price','user_id','use_at'];

    use HasFactory;
}

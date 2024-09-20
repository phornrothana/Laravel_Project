<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class information extends Model
{
    use HasFactory;
    //can get array
    protected $guarded =[];
    //one by one
    // protected $fillable =[
    //     'short_title',
    //     'long_title'
    // ]
    // protected $fillable = [
    //     'short_title',
    //     'long_title',
    //     'url'
    // ];
}

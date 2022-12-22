<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    // fillable a amra j j column a data insert korte chai tha dia ditam
    // protected $fillable = ['name', 'is_active', 'image'];
    // r guarded a sob column ai data auto insert kora jabe konotai jodi data insert nhh kore thahole oita ulta dia dibo
    protected $guarded = [];
    // aikhane amra product model ar modde tar parent category ar sathe relation koraise one to many
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;
    protected $fillable =[
        'title','slug','description','image','user_id','video_src'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    use HasFactory;
    protected $fillable =[
        'title','slug','image_cover','equipe','team_logo','team_name','match_date','match_time','user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}

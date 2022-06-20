<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Grade;
class Post extends Model
{
    use HasFactory;

    public function grade(){
        return $this->hasMany(Grade::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public $timestamps = false;
    protected $fillable = [
        'header', 'desc', 'ip'
    ];
}

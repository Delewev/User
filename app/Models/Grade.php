<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post;

/**
 * @property mixed $grades
 */
class Grade extends Model
{
    use HasFactory;
    public function post(){
        return $this->belongsTo(Post::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    // public $timestamps = false;

    protected $fillable = [
        'grades', 'user_id'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Discussion;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['body'];

    public function isAuthor () {
        return $this->user->name === $this->discussion->user->name;
    }

    public function isBestComment () {
        return $this->discussion->best_comment_id === $this->id;
    }

    public function showMarkAsBestComment () {
        return $this->discussion->best_comment_id !== $this->id;
    }

    public function discussion () {
        return $this->belongsTo(Discussion::class);
    }
    
    public function user () {
        return $this->belongsTo(User::class);
    }
}

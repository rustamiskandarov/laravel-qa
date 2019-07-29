<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * @property mixed answers
 * @property mixed created_at
 * @property mixed best_answer_id
 */
class Question extends Model
{
    protected $fillable = ['title', 'body'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function bodyLimit()
    {
        return Str::limit($this->attributes['body'], 100);
    }

    public function getUrlAttribute()
    {
        return route('questions.show', $this->id);
    }

    public function getCreateDateAttribute()
    {
        //return $this->created_at->format("d/m/Y H:i:s");
        return $this->created_at->diffForHumans();
    }

    public function getStatusAttribute()
    {
        if ($this->answers > 0) {
            if ($this->best_answer_id) {
                return "answers-right";
            } else {
                return "answers-exist";
            }
        } else {
            return "";
        }
    }
}

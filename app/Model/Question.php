<?php

namespace App\Model;

use App\User;
use App\Model\Answer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * @property mixed user_id
 * @property mixed created_at
 * @property mixed best_answer_id
 * @property mixed answers_count
 */
class Question extends Model
{
    protected $fillable = ['title', 'body', 'views'];

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
        return route('question.show', $this->slug);
    }

    public function getCreateDateAttribute()
    {
        //return $this->created_at->format("d/m/Y H:i:s");
        return $this->created_at->diffForHumans();
    }

    public function getStatusAttribute()
    {
        if ($this->answers_count > 0) {
            if ($this->best_answer_id) {
                return "answers-right";
            }
            return "answers-exist";
        }
        return "";

    }

    public function getHtmlAttribute(){
        return \Parsedown::instance()->text($this->body);
    }

    public function answers(){
        return $this->hasMany(Answer::class);
    }
}

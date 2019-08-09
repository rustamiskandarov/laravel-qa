<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed body
 */
class Answer extends Model
{
    public function question(){
        return $this->belongsTo(Question::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getHtmlAttribute(){
        return \Parsedown::instance()->text($this->body);
    }

    public static function boot(){
        parent::boot();
        static::created(function ($answers){
            $answers->question->increment('answers_count');
            $answers->question->save();
        });
    }
}

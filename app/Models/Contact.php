<?php

namespace App\Models;

use App\Mail\TestMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

use function Illuminate\Events\queueable;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'message'
    ];

    protected function getNameAttribute(){
        return "{$this->firstname} {$this->lastname}";
    }

    protected static function booted(){
        // static::created(queueable(function(Contact $contact){
        //     Mail::to('admin@gmail.com')->send(new TestMail($contact));
        // })->delay(now()->addSeconds(5)));

        static::created(function(Contact $contact){
            Mail::to('admin@gmail.com')->later(now()->addMinute(1),new TestMail($contact));
        });
    }
}

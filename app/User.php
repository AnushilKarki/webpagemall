<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
 public function shop()
    {
        return $this->hasOne(Shop::class,'user_id');
    }
    public function client()
    {
        return $this->hasOne(Client::class,'user_id');
    }
    public function credit()
    {
        return $this->hasOne(Credit::class,'user_id');
    }
    public function employee()
    {
        return $this->hasOne(Employee::class,'user_id');
    }
    public function note()
    {
        return $this->hasMany(Note::class,'user_id');
    }
    public function feedback()
    {
        return $this->hasMany(Feedback::class,'user_id');
    }
    public function report()
    {
        return $this->hasMany(Report::class,'user_id');
    }
    public function message()
    {
        return $this->hasMany(Message::class,'user_id');
    }
    public function sale()
    {
        return $this->hasMany(Sale::class,'user_id');
    }
    public function invoice()
    {
        return $this->hasMany(Invoice::class,'user_id');
    }
    public function payment()
    {
        return $this->hasMany(Payment::class,'user_id');
    }
    public function post()
    {
        return $this->hasMany(Post::class,'user_id');
    }
    public function comment()
    {
        return $this->hasMany(Comment::class,'user_id');
    }
}


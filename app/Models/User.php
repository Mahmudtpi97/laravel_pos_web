<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\usersGroup;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table        = 'users';
    protected $primaryKey   = 'id';
    protected $fillable     = ['group_id','name','email','phone','address','birthday','photo'];

    public function usersGroup() {
    	return $this->belongsTo(usersGroup::class,'group_id','id');
    }
    public function payment(){
        return $this->hasMany(Payment::class);
    }
    public function receipt(){
        return $this->hasMany(Receipt::class);
    }
    public function sales(){
        return $this->hasMany(SalesInvoice::class);
    }
    public function purchases(){
        return $this->hasMany(PurchaseInvoice::class);
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

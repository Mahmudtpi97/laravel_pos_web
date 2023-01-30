<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usersGroup extends Model
{
    use HasFactory;
    protected $table        = 'usersgroups';
    protected $primaryKey   = 'id';

    protected $fillable     = ['title'];

public function users(){
    return $this->hasMany(User::class);
}

public static function arrForGroupSelect(){
    $arr=[];
    $groups =usersGroup::all();

    foreach ($groups as $group) {
        $arr[$group->id] = $group->title;
    }

    return $arr;

}

}

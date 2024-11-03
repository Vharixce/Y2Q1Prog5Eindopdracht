<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ClassType extends Model
{
    protected $table = 'class_types';

    protected $fillable = [
        'class',
        'ability',
        'damage',
        'cooldown',
        'user_id',
        'active',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

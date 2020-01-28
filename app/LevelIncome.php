<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LevelIncome extends Model
{
    protected $fillable = [
        'user_id',
        'level1',
        'level2',
        'level3',
        'level4',
        'level5',
        'level6',
        'level7',
        'level8',
        'level9',
        'level10',
        'level11',
    ];
}

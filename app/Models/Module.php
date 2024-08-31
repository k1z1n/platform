<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'comment',
        'theory',
        'task',
        'stat',
        'status',
        'course_id',
    ];

    public function course(){
        return $this->belongsTo(Module::class);
    }
}

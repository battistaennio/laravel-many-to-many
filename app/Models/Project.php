<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }

    protected $fillable = [
        'name',
        'slug',
        'start_date',
        'repo_link',
        'description',
        'type_id',
        'img_path',
        'img_name'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'private',
        'collaborators',
        'type_id'
    ];

    // Relazione onetomany con Type
    public function type()
    {

        return $this->belongsTo(Type::class);
    }

    // Relazione manytomany con technology
    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
}

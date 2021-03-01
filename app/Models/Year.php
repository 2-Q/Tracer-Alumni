<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function studens()
    {
        return $this->belongsToMany(Student::class);
    }
}

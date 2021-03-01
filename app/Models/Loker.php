<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loker extends Model
{
    use HasFactory;

    protected $table = 'loker';
    protected $guarded = [];
    use HasFactory;

    public function author()
    {
        return $this->BelongsTo(User::class, 'user_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Profession extends Model
{
	use SoftDeletes;
    public function User()
    {
        return $this->BelongsTo(new User);
    }
	// protected $table = 'loker';
 //    protected $guarded = [];
 //    use HasFactory;

 //    public function author()
 //    {
 //        return $this->BelongsTo(User::class, 'user_id');
 //    }

}

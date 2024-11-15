<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialty extends Model
{
    use HasFactory;
    use SoftDeletes;

        protected $fillable = ['name', 'description'];
    
        public function doctors()
        {
            return $this->hasMany(Doctor::class);
        }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    /**
     * [texts description]
     *
     * @return  [type]  [return description]
     */
    public function texts()
    {
        return $this->hasMany(Text::class, "language", "code");
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToobaTime extends Model
{
    use HasFactory;

    /**
     * [title description]
     *
     * @return  [type]  [return description]
     */
    public function title()
    {
        return $this->belongsTo(Text::class, "title_id", "text_id");
    }

    /**
     * [description description]
     *
     * @return  [type]  [return description]
     */
    public function description()
    {
        return $this->belongsTo(Text::class, "description_id", "text_id");
    }

    /**
     * [creator description]
     *
     * @return  [type]  [return description]
     */
    public function creator()
    {
        return $this->belongsTo(User::class, "creator_id", "id");
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
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

    /**
     * [date description]
     *
     * @return  [type]  [return description]
     */
    public function date()
    {
        return $this->belongsTo(ToobaDate::class, "date_id", "id");
    }

    /**
     * [date description]
     *
     * @return  [type]  [return description]
     */
    public function time()
    {
        return $this->belongsTo(ToobaTime::class, "time_id", "id");
    }

    /**
     * [time description]
     *
     * @return  [type]  [return description]
     */
    public function place()
    {
        return $this->belongsTo(Place::class, "place_id", "id");
    }

    /**
     * [action description]
     *
     * @return  [type]  [return description]
     */
    public function action()
    {
        return $this->belongsTo(Action::class, "action_id", "id");
    }
}

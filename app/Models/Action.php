<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
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
     * [actions description]
     *
     * @return  [type]  [return description]
     */
    public function actions()
    {
        return $this->belongsToMany(Action::class, "actions_relation");
    }

    /**
     * [child_actions description]
     *
     * @return  [type]  [return description]
     */
    public function child_actions()
    {
        return $this->belongsToMany(
            Action::class,
            "actions_relation",
            "parent_action_id",
            "action_id"
        )->withPivot("order");
    }

    /**
     * [parent_actions description]
     *
     * @return  [type]  [return description]
     */
    public function parent_actions()
    {
        return $this->belongsToMany(
            Action::class,
            "actions_relation",
            "action_id",
            "parent_action_id"
        )->withPivot("order");
    }

    /**
     * [texts description]
     *
     * @return  [type]  [return description]
     */
    public function texts()
    {
        return $this->belongsToMany(
            Text::class,
            "action_texts_relation",
            "action_id",
            "text_id"
        )->withPivot("order");
    }

    /**
     * [notifications description]
     *
     * @return  [type]  [return description]
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class, "action_id", "id");
    }
}

<?php

namespace App\GraphQL\Queries;

use App\Models\Text;

class App
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        $input = $args["input"];
        return Text::where("type", "app")
            ->where("language_id", $input["language"])
            ->get();
    }
}

<?php

namespace App\GraphQL\Queries;

class Test
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        return "hello World";
    }
}

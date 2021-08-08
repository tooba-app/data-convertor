<?php

namespace Tests\Unit\Helpers;

use App\Http\Controllers\Helper\SalamQuranHelper;
use PHPUnit\Framework\TestCase;

class SalamQuranTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_request()
    {
        $sura_list = SalamQuranHelper::execute("sura/list", "GET");
        $this->assertTrue($sura_list["ok"]);
    }
}

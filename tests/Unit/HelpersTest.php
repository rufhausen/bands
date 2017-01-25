<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HelpersTest extends TestCase
{
    /**
     * testPrepareDateInputForDb.
     *
     * @return void
     */
    public function testPrepareDateInputForDb()
    {
        $expected = '2000-01-01 00:00:00';
        $actual = prepareDateInputForDb('01-01-2000');

        $this->assertEquals($expected, $actual);
    }
}

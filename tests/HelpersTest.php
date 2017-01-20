<?php

class HelpersTest extends TestCase
{
    /**
     * [testprepareDateInputForDb description]
     * @method testprepareDateInputForDb
     * @return [type]                    [description]
     */
    public function testprepareDateInputForDb()
    {
        $expected = '2000-01-01 00:00:00';
        $actual   = prepareDateInputForDb('01-01-2000');

        $this->assertEquals($expected, $actual);
    }
}

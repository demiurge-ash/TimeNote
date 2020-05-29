<?php

namespace Tests\Feature;

use App\Helpers\Routines;
use Tests\TestCase;

class RoutinesTest extends TestCase
{
    public function testformatDate()
    {
        $date = Routines::formatDate('2020-05-23 21:10:12');
        $this->assertEquals($date,'23/05/2020 21:10:12');
    }
}

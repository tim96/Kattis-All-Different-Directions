<?php declare(strict_types=1);

namespace Tests;

use App\Application;
use PHPUnit\Framework\TestCase;

final class ApplicationTest extends TestCase
{
    public function testSuccess()
    {
        $instructions = [];
        $instructions[] = '87.342 34.30 start 0 walk 10.0';
        $instructions[] = '2.6762 75.2811 start -45.0 walk 40 turn 40.0 walk 60';
        $instructions[] = '58.518 93.508 start 270 walk 50 turn 90 walk 40 turn 13 walk 5';

        $app = new Application($instructions);
        $result = $app->calculate();

        $this->assertEquals(97.1547, round($result->getPoint()->getX(), 4));
        $this->assertEquals(40.2334, round($result->getPoint()->getY(), 4));
        $this->assertEquals( 7.63097, round($result->getDistance(), 5));
    }

    public function testSuccess1()
    {
        $instructions = [];
        $instructions[] = '30 40 start 90 walk 5';
        $instructions[] = '40 50 start 180 walk 10 turn 90 walk 5';

        $app = new Application($instructions);
        $result = $app->calculate();

        $this->assertEquals(30, round($result->getPoint()->getX(), 4));
        $this->assertEquals(45, round($result->getPoint()->getY(), 4));
        $this->assertEquals( 0, round($result->getDistance(), 5));
    }

    public function testSuccess2()
    {
        $instructions = [];
        $instructions[] = '87.342 34.30 start 0 walk 10.0';
        $instructions[] = '2.6762 75.2811 start -45.0 walk 40 turn 20.0 turn 20.0 walk 20 walk 20 walk 20';
        $instructions[] = '58.518 93.508 start 270 walk 50 turn 90 walk 40 turn 13 walk 5';

        $app = new Application($instructions);
        $result = $app->calculate();

        $this->assertEquals(97.1547, round($result->getPoint()->getX(), 4));
        $this->assertEquals(40.2334, round($result->getPoint()->getY(), 4));
        $this->assertEquals( 7.63097, round($result->getDistance(), 5));
    }
}

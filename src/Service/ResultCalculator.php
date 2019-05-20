<?php declare(strict_types=1);

namespace App\Service;

use App\Model\Point;
use App\Model\Result;

class ResultCalculator
{
    public function execute(array $points): Result
    {
        $totalX = 0.0;
        $totalY = 0.0;
        $distance = 0.0;

        foreach ($points as $point) {
            $totalX += $point->getX();
            $totalY += $point->getY();
        }

        $totalPoints = count($points);
        $averagePoint = new Point($totalX / $totalPoints, $totalY / $totalPoints);

        foreach ($points as $point) {
            $calcDistance = $this->calcDistance($point, $averagePoint);
            if ($calcDistance > $distance) {
                $distance = $calcDistance;
            }
        }

        return new Result($averagePoint, $distance);
    }

    private function calcDistance(Point $point, Point $nextPoint): float
    {
        return sqrt(
            pow($point->getX() - $nextPoint->getX(), 2) +
            pow($point->getY() - $nextPoint->getY(), 2)
        );
    }
}

<?php declare(strict_types=1);

namespace App\Model;

class Result
{
    /**
     * @var Point
     *
     * Coordinates of the average destination
     */
    private $point;

    /**
     * @var float
     *
     * The distance between the worst directions and the averaged destination
     */
    private $distance;

    public function __construct(Point $point, float $distance)
    {
        $this->point = $point;
        $this->distance = $distance;
    }

    public function getPoint(): Point
    {
        return $this->point;
    }

    public function getDistance(): float
    {
        return $this->distance;
    }
}

<?php declare(strict_types=1);

namespace App\Model;

class Instruction
{
    /**
     * @var Point
     */
    private $point;

    /**
     * @var float
     */
    private $degrees = 0.0;

    /**
     * @var array
     */
    private $actions = [];

    public function __construct(Point $point, array $actions)
    {
        $this->point = $point;
        $this->actions = $actions;
    }

    public function setDegrees(float $degrees): void
    {
        $this->degrees = $degrees;
    }

    public function getDegrees(): float
    {
        return $this->degrees;
    }

    public function setPoint(Point $point): void
    {
        $this->point = $point;
    }

    public function getPoint(): Point
    {
        return $this->point;
    }

    public function getActions(): array
    {
        return $this->actions;
    }
}

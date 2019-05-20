<?php declare(strict_types=1);

namespace App\Service;

use App\Action\Start;
use App\Action\Turn;
use App\Action\Walk;
use App\Model\Instruction;
use App\Model\Point;

class Applier
{
    public function execute(Instruction $instruction): Point
    {
        foreach ($instruction->getActions() as $action) {
            if ($action instanceof Start) {
                $instruction->setDegrees($action->getValue());
            } elseif ($action instanceof Turn) {
                $instruction->setDegrees($instruction->getDegrees() + $action->getValue());
            } elseif ($action instanceof Walk) {
                $x = $instruction->getPoint()->getX() + $action->getValue() * cos(deg2rad($instruction->getDegrees()));
                $y = $instruction->getPoint()->getY() + $action->getValue() * sin(deg2rad($instruction->getDegrees()));

                $point = new Point($x, $y);
                $instruction->setPoint($point);
            } else {
                throw new \InvalidArgumentException('Wrong Action type');
            }
        }

        return $instruction->getPoint();
    }
}

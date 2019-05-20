<?php declare(strict_types=1);

namespace App\Service;

use App\Action\Start;
use App\Action\Turn;
use App\Action\Walk;
use App\Model\Instruction;
use App\Model\Point;

class Parser
{
    private const START_ACTION = 'start';
    private const TURN_ACTION = 'turn';
    private const WALK_ACTION = 'walk';

    public function execute(string $instruction): Instruction
    {
        /** @var string[] $result */
        $result = explode(' ', $instruction);

        if (count($result) < 2) {
            throw new \InvalidArgumentException('Wrong amount of instruction arguments');
        }

        $x = (float) array_shift($result);
        $y = (float) array_shift($result);

        $actions = $this->parseActions($result);

        return new Instruction(new Point($x, $y), $actions);
    }

    private function parseActions(array $actions): array
    {
        $results = [];

        while ($actions) {
            $action = array_shift($actions);

            if ($action === static::START_ACTION) {
                $value = array_shift($actions);

                $results[] = new Start((float) $value);
            } elseif ($action === static::TURN_ACTION) {
                $value = array_shift($actions);

                $results[] = new Turn((float) $value);
            } elseif ($action === static::WALK_ACTION) {
                $value = array_shift($actions);

                $results[] = new Walk((float) $value);
            }
        }

        return $results;
    }
}

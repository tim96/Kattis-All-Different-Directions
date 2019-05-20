<?php declare(strict_types=1);

namespace App;

use App\Model\Result;
use App\Service\Applier;
use App\Service\Parser;
use App\Service\ResultCalculator;

class Application
{
    /**
     * @var string[]
     */
    private $rawInstructions;

    public function __construct(array $instructions)
    {
        $this->rawInstructions = $instructions;
    }

    public function calculate(): Result
    {
        $points = [];
        $parser = new Parser();
        $applier = new Applier();
        $resultCalculator = new ResultCalculator();

        foreach ($this->rawInstructions as $rawInstruction) {
            $instruction = $parser->execute($rawInstruction);
            $points[] = $applier->execute($instruction);
        }

        return $resultCalculator->execute($points);
    }
}

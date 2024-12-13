<?php
namespace ChocoBillyFarm;

/**
 * The Order class is responsible for managing the selection of "chocobos"
 * (representing the weights) to meet a required weight using the smallest possible number of weights.
 */
Class Order {
    /* @var int[] */
    public array $available_weights;
    /* @var int */
    public int $required_weight;
    public array $chocobos = [];

    public function __construct(array $available_weights, int $required_weight)
    {
        rsort($available_weights);
        $this->available_weights = $available_weights;
        $this->required_weight = $required_weight;
    }

    public function __toString() {
        echo "Required weight:" . $this->required_weight . PHP_EOL;
        echo "Available weights:" . json_encode($this->available_weights, JSON_PRETTY_PRINT) . PHP_EOL;

        $this->addChocobos();

        return count($this->chocobos) . ":" . implode(",", $this->chocobos);
    }

    /**
     * @return void
     */
    private function addChocobos(): void
    {
        foreach ($this->available_weights as $available_weight) {
            while (array_sum($this->chocobos) < $this->required_weight) {
                if (array_sum($this->chocobos) + $available_weight <= $this->required_weight) {
                    $this->chocobos[] = $available_weight;
                } else {
                    break;
                }

                echo "Added a chocobo of weight $available_weight, total weight:" . array_sum($this->chocobos) . PHP_EOL;
            }
        }
    }
}
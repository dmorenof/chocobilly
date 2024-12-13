<?php

namespace ChocoBillyFarm;

use Exception;

/**
 * Computes the orders based on the provided input data.
 *
 * This method processes the input string, calculates the orders, and prepares the results.
 * It saves the output to a file named `output.txt` and also returns the formatted result as a string.
 *
 * @param string $input The raw input data to be processed.
 *
 * @return string A formatted string representation of the computation result.
 */
class Parser
{
    /**
     * @var Order[]
     */
    public static array $Orders = [];

    /**
     * @throws Exception
     */
    public static function computeOrders(string $input): string
    {
        self::parseInput($input);
        $result = implode(PHP_EOL, self::$Orders);
        file_put_contents("output.txt", $result);
        return PHP_EOL . "Saved to output.txt. Result: <<" . PHP_EOL . $result . PHP_EOL . ">>" . PHP_EOL;
    }

    /**
     * @throws Exception
     */
    private static function parseInput(string $input): void
    {
        $lines = explode(PHP_EOL, $input);
        echo "Lines count:" . count($lines) . PHP_EOL;

        $orders_count = (int)array_shift($lines);
        echo "Orders count:" . $orders_count . PHP_EOL;

        $orders = array_chunk($lines, 2);

        foreach ($orders as $index => $order) {
            self::$Orders[] = new Order(array_map("intval", explode(",", $order[0])), (int)$order[1]);
        }

        if (count(self::$Orders) !== $orders_count) {
            throw new Exception("Invalid number of orders" . PHP_EOL);
        }
    }
}
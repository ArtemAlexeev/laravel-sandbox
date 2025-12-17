<?php

class CalculateService
{
    //n^2
    public function getTwoElementsIndexies(array $numbers, int $target): array
    {
        $iterations = 0;

        //tagert = numbers[i] + numbers[j]
        //[2,5,66,7,111,22,33,44,555,6666,7,233,11]
        //target = 33
        $cache = [];
        foreach ($numbers as $index => $number) {
            $cache[$number] = $index;
            $iterations++;
        }

        foreach ($numbers as $index => $number) {
            $s = $target - $number;
            $iterations++;
            if (isset($cache[$s])) {
                var_dump($iterations);
                return [$index, $cache[$s]];
            }
        }

//        for($i = 0; $i < count($numbers); $i++) {
//            for($j = $i + 1; $j < count($numbers); $j++) {
//                $iterations++;
//                if ($numbers[$i] + $numbers[$j] == $target) {
//                    var_dump($iterations);
//                    return [$i, $j];
//                }
//            }
//        }
        throw new \Exception('No two elements found that sum to target');
        //мне нужно вернуть индексы двух элементов, которые в сумме дают таргет
    }
}

$service = new CalculateService();
$result = $service->getTwoElementsIndexies([2,5,66,7,111,221,33,44,555,6666,7,22,11], 33);
try {
    var_dump($result);
} catch (\Throwable $e) {
    echo 'Error: ' . $e->getMessage();
}

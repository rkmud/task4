<?php

declare(strict_types=1);

namespace App;

// Используйте array_filter() для создания нового массива, содержащего только пользователей старше 18 лет.
$arr = [
    ['name' => 'Person1', 'age' => 12],
    ['name' => 'Person2', 'age' => 18],
    ['name' => 'Person3', 'age' => 21],
    ['name' => 'Person4', 'age' => 16],
    ['name' => 'Person5', 'age' => 31],
];

$arrFilter = array_filter($arr, function (array $item) : bool {
    return $item['age'] >= 18;
});

foreach ($arrFilter as $value)
{
    printf("%s age: %d \n", $value['name'], $value['age']);
}

// Используйте sort() или rsort() для сортировки массива по возрастанию/убыванию.
$arrNum = [1, 13, 42, 4, 8, -1];
sort($arrNum);

foreach ($arrNum as $item)
{
    printf("%s ", $item);
}

echo PHP_EOL;

// Используйте in_array() или array_search() для поиска specific string in the array.
$arr = [1, 'qwerty', 42, 4, 8, -1];

echo (array_search('qwerty', $arr ) ? 'Has item' : "Doesn't have") . PHP_EOL;

// Используйте array_merge() или array_merge_recursive() для объединения двух массивов.
$arr1 = [1, 42, 4];
$arr2 = [1, 2, 3, 4];
$arrMerge = array_merge($arr1, $arr2);

foreach ($arrMerge as $item)
{
    printf("%s ", $item) ;
}
echo PHP_EOL;

// Используйте unset(), array_splice(), or array_shift() or array_pop() для удаления specific elements from the array.
$arr = [1, 13, 42, 4, 8, -1];
unset($arr[2]);

foreach ($arr as $item)
{
    printf("%s ", $item) ;
}
echo PHP_EOL;

// Создайте массив, содержащий ассоциативные значения (ключ-значение).
// Используйте array_keys(), array_values(), or array_flip() to transform the array.
$countries = ["Germany" => "Berlin", "France" => "Paris", "Spain" => "Madrid"];
$cities = array_flip($countries);

foreach ($cities as $city => $country)
{
    printf("%s => %s\n", $city, $country);
}

// Создайте многомерный массив, содержащий данные вложенных массивов.
// Используйте foreach or nested loops to iterate through the multidimensional array.
$arr = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];

foreach ($arr as $item)
{
    foreach ($item as $value)
    {
        printf("%d ", $value);
    }
    echo "\n";
}

// Создайте массив, содержащий данные о продажах.
// Используйте функции array_filter(), array_count_values(), array_sum() or array_reduce() to analyze and summarize the data.
$sale = [ 'TV' => 120, 'laptop' => 200, 'computer' => 666];

echo array_reduce($sale, function (int $carry, int $item): int {
    return $item >= 200 ? $carry + $item : $carry;
}, 0);

echo PHP_EOL;

// Реализуйте алгоритм сортировки, например, пузырьковую сортировку или сортировку слиянием, используя массивы.
$arr = [1, 4, 3, 8, 2];

for ($i = 0; $i < count($arr) - 1; $i++)
{
    for ($j = 0; $j < count($arr) - $i - 1; $j++)
    {
        if ($arr[$j] > $arr[$j + 1])
        {
            $temp = $arr[$j];
            $arr[$j] = $arr[$j + 1];
            $arr[$j + 1] = $temp;
        }
    }
}

foreach ($arr as $item)
{
    printf("%s ", $item);
}

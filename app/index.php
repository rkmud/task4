<?php

declare(strict_types=1);

namespace App;

// 3. Работа с файлами:
//  Извлеките информацию об ошибках из файла лога.
function showErrorLogs(string $filename): void
{
    if (($file = fopen($filename, 'r')) !== false)
    {
        while (($data = fgets($file)) !== false)
        {
            if ((stripos($data,'ERROR') !== false) || (stripos($data,'WARNING') !== false) )
            {
                printf("%s", $data);
            }
        }
        fclose($file);
    }
}

$filename = './src/logfile.log';
showErrorLogs($filename);

// Подсчитайте количество запросов к серверу за определенный период.
function countRequestsInPeriod(string $filename, string $startTime, string $endTime): int
{
    $startTimestamp = strtotime($startTime);
    $endTimestamp = strtotime($endTime);
    $requestCount = 0;

    if (($file = fopen($filename, 'r')) !== false)
    {
        while (($line = fgets($file)) !== false)
        {
            if (preg_match('/\[(.*?)\]/', $line, $matches))
            {
                $logTimestamp = strtotime($matches[1]);
                if ($logTimestamp >= $startTimestamp && $logTimestamp <= $endTimestamp)
                {
                    $requestCount++;
                }
            }
        }
        fclose($file);
    }

    return $requestCount;
}

$filename = './src/access.log';
$startTime = '2024-10-23 12:00:00';
$endTime = '2024-10-23 13:00:00';

$requestCount = countRequestsInPeriod($filename, $startTime, $endTime);
echo "$requestCount\n";

// Извлеките и обработайте данные из CSV-файла.
function getDataCSV(string $filename): void
{
    if (($file = fopen($filename, 'r')) !== false)
    {
        while (($data = fgetcsv($file, 0, ';')) !== false)
        {
            for ($i = 0; $i < count($data); $i++)
            {
                printf("%s ", $data[$i]);
            }
            echo "\n";
        }
        fclose($file);
    }
}

$filename = './src/test.csv';
getDataCSV($filename);

// Обновите значения в CSV-файле в соответствии с заданными критериями.
function changeCSV(string $filename): void
{
    $updatedContent = [];

    if (($file = fopen($filename, 'r')) !== false)
    {
        while (($data = fgetcsv($file, 0, ';')) !== false)
        {
            if (isset($data[2]) && (int)$data[2] === 12)
            {
                $data[2] = 111;
            }
            $updatedContent[] = $data;
        }
        fclose($file);
    }

    if (($file = fopen($filename, 'w')) !== false)
    {
        foreach ($updatedContent as $row)
        {
            fputcsv($file, $row, ';');
        }
        fclose($file);
    }
}

$filename1 = './src/test.csv';
changeCSV($filename1);

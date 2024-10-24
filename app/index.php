<?php

declare(strict_types=1);

// Напишите код для поиска анаграмм слов.
function areAnagrams(string $str1, string $str2): bool
{
    $str1 = str_split($str1);
    $str2 = str_split($str2);

    sort($str1);
    sort($str2);

    return implode("", $str1) === implode("", $str2);
}

echo areAnagrams('qwerty', 'wertyq') ? 'true' : 'false';
echo PHP_EOL;

// Реализуйте алгоритм проверки палиндрома.
function isPalindrome(string $str): string
{
    return $str === strrev($str) ? 'true' : 'false';
}

$str = 'abba';
printf("%s \n", isPalindrome($str));

// Создайте шаблон регулярного выражения для поиска строк, содержащих заданное количество слов.
function regexForCount(int $count): string
{
    return '/^(\w+(\s+|$)){'.$count.'}$/';
}

$regex = regexForCount(3);
$str = 'Qwerty yr uewi dsaad';
echo preg_match($regex, $str) ? 'true' : 'false';
echo PHP_EOL;

// Напишите код, который генерирует HTML-ссылки из URL-адресов.
function makeLinks(array $urls): string
{
    $html = '';
    foreach ($urls as $url)
    {
        $html .= '<a href="' . htmlspecialchars($url) . '">' . htmlspecialchars($url) . '</a><br>';
    }
    return $html;
}

$urls = [
    'qwerty@gmail.com',
    'tyt@mail.ru'
];

echo makeLinks($urls);

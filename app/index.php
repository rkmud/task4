<?php

declare(strict_types=1);

namespace App;

// Напишите функцию, которая удаляет лишние пробелы и символы из строки.
// Используйте функции trim(), str_replace(), preg_replace() для выполнения задачи.
function removeSpaces(string $str): string
{
    $str = trim($str);
    $str = preg_replace('/\s+/', ' ', $str);
    $str = str_replace("\n", ' ', $str);

    return $str;
}

$stringsToTest = [
    "   Qwerty,   qwerty!   ",
    "\nQwerty q a e ttyy.",
];

foreach ($stringsToTest as $string)
{
    echo "Original: " . $string . "\n";
    echo "Cleaned: " . removeSpaces($string) ."\n";
    echo "------------------------------------\n";
}

// Напишите функцию, которая находит все вхождения заданной подстроки в другой строке и заменяет их на другую подстроку.
// Используйте функции strpos(), str_replace(), preg_replace() для выполнения задачи.
function replaceSubstring(string $substr, string $str, string $replace): string
{
    return str_replace($substr, $replace, $str);
}

printf("%s \n", replaceSubstring("123", "QWErty 123 akdajk", "456"));
printf("%s \n", replaceSubstring("123", "QWErty akdajk", "456"));

// Напишите функцию, которая извлекает email-адреса из текста.
// Используйте регулярные выражения (preg_match(), preg_match_all()) для поиска email-адресов.
function searchEmail(string $text): array
{
    $pattern = '/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/u';
    $emails = [];
    preg_match_all($pattern, $text, $emails);

    return $emails[0];
}

$emails = searchEmail("xzczcx dsdsd@gmail.com  example@mail.ru czcz");

foreach ($emails as $email)
{
    printf("%s ", $email);
}

// Напишите функцию, которая преобразует дату из одного формата в другой (например, из dd.mm.yyyy в yyyy-mm-dd).
// Используйте функции date(), strtotime(), strftime() для выполнения задачи.
function convertDateFormat(string $date, string $format): string
{
    $timestamp = strtotime($date);

    if(!$timestamp) {
        return "Invalid date format";
    }

    return date($format, $timestamp);
}

$date1 = "25.10.2024";
$format1 = "Y-m-d";
$date2 = "2024-10-26";
$format2 = "d.m.Y";

printf("%s \n", convertDateFormat($date1, $format1));
printf("%s \n", convertDateFormat($date2, $format2));

// Напишите функцию, которая шифрует строку с помощью base64_encode() или других методов.
function encodeData(string $text): string
{
    return base64_encode($text);
}

// Напишите функцию, которая дешифрует зашифрованную строку.
function  decodeData(string $text): string
{
    return base64_decode($text);
}

$encodeData = encodeData("qwerty");
$decodeDate = "MTIzNDU=";

printf("%s \n", $encodeData);
printf("%s \n", decodeData($encodeData));
printf("%s \n", decodeData($decodeDate));

// Напишите функцию, которая сравнивает две строки без учета регистра.
// Используйте функции strcasecmp(), strnatcmp() для выполнения задачи.
// Сравните несколько пар строк с помощью написанной функции.
function compareStr(string $str1, string $str2): string
{
    return strcasecmp($str1, $str2) === 0 ? "equal" : "not equal";
}

printf("%s \n", compareStr("qwerty", "qweRty"));
printf("%s \n", compareStr("hello", "world"));

// Напишите функцию, которая сортирует массив строк по возрастанию/убыванию с учетом регистра.
// Используйте функции strnatcmp(), sort(), asort() для выполнения задачи.
// Продемонстрируйте работу функции сортировки на примере массива строк.
function sortStr(array $arr): void
{
    sort($arr);

    foreach ($arr as $item)
    {
        printf('%s ', $item);
    }
}

$arr = ['S','qwerty', 'S', 'A', 'a'];

sortStr($arr);

echo PHP_EOL;

// Напишите функцию, которая удаляет из HTML-строки все теги.
// Используйте регулярные выражения (preg_replace()) для выполнения задачи.
// Проверьте работу функции на примерах с разными HTML-строками.
function removeTags($text): string
{
    $pattern = '/<[^>]*>/';

    return preg_replace($pattern, '',$text);
}

printf("%s \n",removeTags("<br/>kajjfjjfd <p> ifdskfks</p>"));
printf("%s \n",removeTags("<h1>kajjfjjfd <b> ifdskfks</b></h1>"));

// Напишите функцию, которая извлекает из HTML-строки ссылки (URL-адреса).
// Используйте регулярные выражения (preg_match_all()) для выполнения задачи.
// Продемонстрируйте работу функции на примерах с разными HTML-строками.
function getLinks(string $text): array
{
    $pattern = '/\b(?:https?:\/\/|www\.)[^\s"\'<>]+/i';
    preg_match_all($pattern, $text, $matches);

    return $matches[0];
}

$str = '<a href="https://www.php.net/">link text</a> <p>http://exaple.com</p>';
$links = getLinks($str);

foreach ($links as $link)
{
    printf("%s \n", $link);
}

// Напишите функцию, которая подсчитывает количество слов в тексте.
// Используйте функции str_word_count(), explode() для выполнения задачи.
// Проверьте работу функции на примерах с разными текстами.
function countWords(string $str): int
{
    return str_word_count($str);
}

$text = 'Qwerty ghdga  hhjhhj djdj ddn nd ';

printf("Count: %d \n", countWords($text));

// Напишите функцию, которая удаляет из текста повторяющиеся слова.
// Используйте функции array_unique(), explode(), implode() для выполнения задачи.
function removeDuplicateWords(string $str): string
{
    $arr = array_unique(explode(" ", $str));

    return implode(" ", $arr);
}

$text = "qwerty ue qwerty ddhdh dudu";

printf("%s \n", removeDuplicateWords($text));

// Реализуйте алгоритм поиска анаграмм слов.
// Используйте функции str_split(), sort(), array_diff() для выполнения задачи.
// Протестируйте алгоритм на примерах с разными словами.

function areAnagrams(string $word1, string $word2): bool
{
    $arr1 = str_split($word1);
    $arr2 = str_split($word2);
    sort($arr1);
    sort($arr2);

    return $arr1 === $arr2;
}

$words = [
    ['qwerty', 'ytrewq'],
    ['1234', '1453'],
    ['asdf', 'dsfa']
];

foreach ($words as [$word1, $word2])
{
    $text = areAnagrams($word1, $word2) ?  "$word1, $word2 are anagrams" :  "$word1, $word2 aren't anagrams";
    printf("%s \n", $text);
}

// Реализуйте алгоритм проверки палиндрома (строки, читающейся одинаково слева направо и справа налево).
// Используйте функции str_split(), strtolower(), array_diff() для выполнения задачи.
// Протестируйте алгоритм на примерах с разными строками.
function isPalindrome(string $str): bool
{
    $arr = str_split(strtolower($str));
    $reverseArr = array_reverse($arr);

    return $arr === $reverseArr;
}

$text = 'adada';
$text2 = 'erty';

$message = isPalindrome($text) ?  "$text is palindrome" :  "$text isn't palindrome";
printf("%s \n", $message);

$message = isPalindrome($text2) ?  "$text2 is palindrome" :  "$text2 isn't palindrome";
printf("%s \n", $message);

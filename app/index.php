<?php

declare(strict_types=1);

// 1. Базовые операции:
// Напишите код, который проверяет, является ли строка действительным email-адресом.
function checkEmail(string $email): string
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) ? 'true' : 'false';
}

printf("%s \n", checkEmail('qwerty@gmail.com'));

// Используйте регулярное выражение для поиска строк, начинающихся с заглавной буквы.
function startWithUpperLetter(string $str): bool
{
    $pattern = '/^[A-Z]/';

    return preg_match_all($pattern, $str) === 1;
}

printf("%s \n", startWithUpperLetter("Qwerty") ? 'true' : 'false');

// Напишите код, который извлекает все URL-адреса из HTML-текста.
function getURL(string $str): array
{
    $pattern = '/\b(?:https?:\/\/|www\.)[^\s"\'<>]+/i';
    preg_match_all($pattern, $str, $matches);

    return $matches[0];
}

$str = "<h1>https://exaple.com</h1> <link href='https://php.net'></link>";
$arr = getURL($str);

foreach ($arr as $item)
{
    printf("%s \n", $item);
}

// Извлеките группу слов, разделенных запятыми, из строки.
function getWords(string $str): array
{
    return explode(", ", $str);
}

$str = "qwerty, utre, oeoe, jeje nf";
$arr = getWords($str);

foreach ($arr as $item) {
    printf("%s \n", $item);
}

// Замените все вхождения слова "привет" на "здравствуйте" во всех строках текста.
function replaceWord(string $str): string
{
    $words = explode(" ", $str);

    return implode(" ", array_map(function($item) {
        return mb_strtolower($item) === "привет" ? "здравствуйте" : $item;
    }, $words));
}

$str = "привет пар привет Привет";

printf("%s \n",replaceWord($str));

// Удалите все HTML-теги из строки.
function removeTags(string $text): string
{
    return strip_tags($text);
}

printf("%s \n",removeTags("<br>qwerty <p>asdf</p>"));

<?php

declare(strict_types=1);

namespace App;

// 2. Работа с текстом:
// Преобразуйте номер телефона в формат "+7 (9XX) XXX-XXXX".
function convertPhone(string $phone): string
{
    $phone = preg_replace('/\D/', '', $phone);
    $pattern = '/^7?(\d{3})(\d{3})(\d{4})$/';

    if(strlen($phone) === 11)
    {
        return preg_replace($pattern, '+7 ($1) $2-$3', $phone);
    }

    return $phone;
}

echo convertPhone("79990202231") . PHP_EOL;
echo convertPhone("+7 199 6202 231") . PHP_EOL;

// Отформатируйте дату в виде "ДД.ММ.ГГГГ".
function formatDate(string $date): string
{
    $timestamp = strtotime($date);
    return date('d.m.y', $timestamp);
}

echo formatDate("1 October 2020") . PHP_EOL;
echo formatDate("2021-12-12") . PHP_EOL;

// Проверьте, является ли введенный пользователем пароль надежным.
function checkPassword(string $password): string
{
    $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';
    return preg_match($pattern, $password) === 1 ? "secure password" : "weak password";
}

echo checkPassword('12345678') . PHP_EOL;
echo checkPassword('Qwerty1234') . PHP_EOL;

// Убедитесь, что IP-адрес имеет правильный формат.
function checkIPAdress(string $str): bool
{
    return filter_var($str, FILTER_VALIDATE_IP) !== false;
}

echo checkIPAdress("192.158.1.38") ? "true" : "false";
echo PHP_EOL;
echo checkIPAdress("192.158.1.") ? "true" : "false";
echo PHP_EOL;

// Удалите из текста все повторяющиеся слова.
function removeDuplicate(string $str): string
{
    $str = explode(" ", $str);
    $arr = array_unique($str);
    return implode(" ", $arr);
}

echo removeDuplicate("Qwerty chunk chunk ii") . PHP_EOL;

// Найдите и замените в тексте слова-ошибки на их правильные варианты.
function correctText(string $str, array $mistakes): string
{
    return str_replace(array_keys($mistakes), array_values($mistakes), $str);
}

$mistakes = [
    "qwerty" => "Qwerty",
    "cat" => "dog"
];

echo correctText("cat eats qwerty", $mistakes) . PHP_EOL;

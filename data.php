<?php
// ставки пользователей, которыми надо заполнить таблицу
/*
$bets = [
    ['name' => 'Иван', 'price' => 11500, 'ts' => strtotime('-' . rand(1, 50) .' minute')],
    ['name' => 'Константин', 'price' => 11000, 'ts' => strtotime('-' . rand(1, 18) .' hour')],
    ['name' => 'Евгений', 'price' => 10500, 'ts' => strtotime('-' . rand(25, 50) .' hour')],
    ['name' => 'Семён', 'price' => 10000, 'ts' => strtotime('last week')]
];
*/

$is_auth = (bool) rand(0, 1);
$user_name = 'Brad';
$user_avatar = 'img/user.jpg';
$title_page = 'Главная';

$categories = [
    'boards-skis' => 'Доски и лыжи', 
    'bracing' => 'Крепления', 
    'boots' => 'Ботинки', 
    'clothing' => 'Одежда', 
    'instruments' => 'Инструменты', 
    'miscellaneous' => 'Разное'
];
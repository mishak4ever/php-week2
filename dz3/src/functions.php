<?php

function task1($count = 50) {
    $result = [];
    for ($index = 0; $index < $count; $index++) {
        $names = ['Петя', 'Вася', 'Таня', 'Света', 'Вальдемар'];
        $result[] = [
            'id' => $index,
            'name' => $names[array_rand($names)],
            'age' => random_int(18, 45),
        ];
    }
    return json_encode($result, 1);
}

function task2($json) {
    $users = json_decode($json, 1);
    if (!is_array($users) || empty($users))
        return "Пустой массив";
    $res = [
        'средний возраст' => array_sum(array_column($users, 'age')) / count($users),
        'статистика имен' => array_count_values(array_column($users, 'name')),
    ];
    return $res;
}

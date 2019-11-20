<?php

require_once('Users.php');

$users = new Users();

$users->setUser([
    "id" => 1,
    "lastName" => "Иванов",
    "firstName" => "Иван",
    "MiddleName" => "Иванович",
    "age" => "53",
    "profession" => "слесарь"
]);

$users->saveJson();

$users->clearData();

$users->loadData('./users.json');

$users->getUsers();

$users->getUser(2);

$users->deleteUsers(["MiddleName" => "Иванович"]);

$users2 = new Users('./users.json');

var_dump($users2);
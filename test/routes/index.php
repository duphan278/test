<?php

$action = $_GET['action'] ?? '/';

$homeController = new HomeController;
match ($action) {
    '/'         => $homeController->index(),
    'chitiet' => $homeController->chitiet(),
    'delete' => $homeController->delete(),
    'create' => $homeController->create(),
    'add' => $homeController->add(),
};
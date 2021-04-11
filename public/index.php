<?php

require_once '../includes/MyRouter.php';
require_once '../includes/autoloader.php';

Route::add('/messages', function(){
    $response = Controller\MessageController::writeMessages($_POST);

    echo json_encode($response);
}, 'POST');

Route::add('/user/([a-zA-Z0-9-]*)/messages', function(string $userId){
    $response = Controller\MessageController::CountUserMessages($userId, $_GET);

    echo json_encode($response);
}, 'GET');

Route::add('/user/groups', function(){
    $response = Controller\MessageController::groupUsersByMessages($_GET);

    echo json_encode($response);
}, 'GET');

Route::run('/');
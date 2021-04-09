<?php

require_once '../includes/MyRouter.php';

Route::add('/messages', function(){
    $response = Controller\MessageController::writeMessages($_POST);

    echo json_encode($response);
}, 'POST');

Route::add('user/messages', function(){
    $response = Controller\MessageController::CountUserMessages($_GET);

    echo json_encode($response);
}, 'GET');

Route::add('user/groups', function(){
    $response = Controller\MessageController::groupUsersByMessages($_GET);

    echo json_encode($response);
}, 'GET');

Route::run('/');
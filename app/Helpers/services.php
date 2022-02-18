<?php

function verifyTransfer(): array
{
    $messages = ['Autorizado', 'Nao_Autorizado'];
    return ['message' => $messages[array_rand($messages, 1)]];
}


function sendMail(): array
{
    $messages = ['Success', 'Error'];
    return ['message' => $messages[array_rand($messages, 1)]];
}

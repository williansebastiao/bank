<?php

function verifyTransfer(): array
{
    $messages = ['Autorizado', 'Nao_Autorizado'];
    return ['message' => $messages[array_rand($messages, 1)]];
}

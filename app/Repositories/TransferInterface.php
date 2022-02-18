<?php


namespace App\Repositories;


interface TransferInterface
{
    public function make(Array $data): object;
}

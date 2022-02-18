<?php


namespace App\Services;


use App\Repositories\TransferRepository;

class TransferService
{

    /**
     * @var TransferRepository
     */
    private $repository;

    /**
     * TransferService constructor.
     * @param TransferRepository $repository
     */
    public function __construct(TransferRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $data
     * @return object
     */
    public function make(Array $data): object
    {
        return $this->repository->make($data);
    }
}

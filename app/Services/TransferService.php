<?php


namespace App\Services;


use App\Repositories\TransferRepository;
use Symfony\Component\HttpFoundation\Response;

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
        try {
            $type = $data['type'];
            if($type === 1) {
                return response()->json(['message' => 'Você não tem permissão para fazer transferência'], Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            return $this->repository->make($data);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }
}

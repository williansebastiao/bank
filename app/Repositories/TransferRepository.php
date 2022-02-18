<?php


namespace App\Repositories;
use App\Models\Transfer;
use Symfony\Component\HttpFoundation\Response;

class TransferRepository implements TransferInterface
{

    private $model;

    public function __construct(Transfer $model)
    {
        $this->model = $model;
    }

    public function make(Array $data): object
    {
        try {

        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

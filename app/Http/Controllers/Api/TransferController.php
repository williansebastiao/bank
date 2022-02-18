<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\TransferService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransferController extends Controller
{

    /**
     * @var TransferService
     */
    private $service;

    /**
     * TransferController constructor.
     * @param TransferService $service
     */
    public function __construct(TransferService $service)
    {
        $this->service = $service;
    }

    /**
     * @param Request $request
     * @return object
     */
    public function make(Request $request): object
    {
        try {
            $obj = $request->only(['value', 'transfer_date', 'sender', 'receiver', 'type']);
            return $this->service->make($obj);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }
}

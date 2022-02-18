<?php


namespace App\Repositories;
use App\Models\Transfer;
use App\Models\Wallet;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class TransferRepository implements TransferInterface
{

    private $model, $wallet;

    public function __construct(Transfer $model, Wallet $wallet)
    {
        $this->model = $model;
        $this->wallet = $wallet;
    }

    public function make(Array $data): object
    {
        try {
            DB::beginTransaction();

            $user_id = $data['sender'];
            $receiver = $data['receiver'];
            $value = (float) $data['value'];
            $balance = (float) $this->wallet->where('user_id', $user_id)->first()->value;
            $balanceReceiver = (float) $this->wallet->where('user_id', $receiver)->first()->value;

            if($balance < $value) {
                return response()->json(['message' => 'Saldo insuficiente'], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            $approved = verifyTransfer()['message'];
            if($approved === 'Autorizado') {
                $save = $this->model->create($data);
                if($save) {

                    $subtract = $balance - $value;
                    $this->wallet->find($user_id)->update(['value' => $subtract]);

                    $sum = $balanceReceiver + $value;
                    $this->wallet->find($receiver)->update(['value' => $sum]);
                    DB::commit();
                    return response()->json(['message' => 'Transferência realizada com sucesso'], Response::HTTP_OK);
                }
            }

            DB::rollBack();
            return response()->json(['message' => 'Algo de deu errado... :('], Response::HTTP_UNPROCESSABLE_ENTITY);


        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

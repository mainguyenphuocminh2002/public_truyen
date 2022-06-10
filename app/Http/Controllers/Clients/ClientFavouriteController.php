<?php

namespace App\Http\Controllers\Clients;

use Illuminate\Http\Request;
use App\Models\Clients\Favourite;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Admin\Products;
use Illuminate\Support\Facades\Validator;

class ClientFavouriteController extends Controller
{
    //
    private $favourite;
    public function __construct(Favourite $favourite)
    {
        $this->favourite = $favourite;
        # code...
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $rules = [
                'product_id' => ['bail', 'required', 'integer'],
                'user_id' => ['bail', 'required', 'integer'],
            ];

            $messages = [
                'product_id.required' => 'Có Lỗi Bất Ngờ Xảy Ra',
                'product_id.integer' => 'Có Lỗi Bất Ngờ Xảy Ra',
                'user_id.required' => 'Có Lỗi Bất Ngờ Xảy Ra',
                'user_id.integer' => 'Có Lỗi Bất Ngờ Xảy Ra',
            ];
            $data = $request->except('_token');
            $validation = Validator::make($data, $rules, $messages);
            $this->favourite->create($data);
            $quantity = count($this->favourite->where('product_id', $request->product_id)->get());
            $product = Products::find($request->product_id);
            $product->favorites = $quantity;
            $product->save();
            $favourite = [];
            $favourite['quantity'] = $quantity;
            $favourite['status'] = 'success';
            $favourite = collect($favourite);
            DB::commit();
            return $favourite;
            //code...
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            if ($validation->fails()) {
                // $validation->status = 'errors';
                return $validation->errors()->add('status', 'errors');
            }
        }
        # code...
    }

    public function delete(Request $request)
    {
        try {
            DB::beginTransaction();
            $rules = [
                'product_id' => ['bail', 'required', 'integer'],
                'user_id' => ['bail', 'required', 'integer'],
            ];

            $messages = [
                'product_id.required' => 'Có Lỗi Bất Ngờ Xảy Ra',
                'product_id.integer' => 'Có Lỗi Bất Ngờ Xảy Ra',
                'user_id.required' => 'Có Lỗi Bất Ngờ Xảy Ra',
                'user_id.integer' => 'Có Lỗi Bất Ngờ Xảy Ra',
            ];
            $data = $request->except('_token');
            $validation = Validator::make($data, $rules, $messages);
            $favouriteFind = $this->favourite->where('user_id',$request->user_id)->where('product_id',$request->product_id)->first();
            $this->favourite->destroy($favouriteFind->id);
            $quantity = count($this->favourite->where('product_id', $request->product_id)->get());
            $favourite = [];
            $favourite['quantity'] = $quantity;
            $favourite['status'] = 'success';
            $favourite = collect($favourite);
            DB::commit();
            return $favourite;
            //code...
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            if ($validation->fails()) {
                return $validation->errors()->add('status', 'errors');
            }
        }
        # code...
    }
}

<?php

namespace App\Http\Controllers\Clients;

use Illuminate\Http\Request;
use App\Models\Clients\Comment;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Admin\Products;
use Illuminate\Support\Facades\Validator;

class ClientCommentController extends Controller
{
    //
    private $comment;
    public function __construct(Comment $comment)
    {
        # code...
        $this->comment = $comment;
    }

    public function store(Request $request)
    {
        # code...
        try {
            DB::beginTransaction();
            $rules = [
                'body' => ['bail', 'required'],
                'product_id' => ['bail', 'required', 'integer'],
                'user_id' => ['bail', 'required', 'integer'],
            ];

            $messages = [
                'body.required' => 'Phải Điền Nội Dung Comment',
                'product_id.required' => 'Có Lỗi Bất Ngờ Xảy Ra',
                'product_id.integer' => 'Có Lỗi Bất Ngờ Xảy Ra',
                'user_id.required' => 'Có Lỗi Bất Ngờ Xảy Ra',
                'user_id.integer' => 'Có Lỗi Bất Ngờ Xảy Ra',
            ];
            $data = $request->except('_token');
            $validation = Validator::make($data, $rules, $messages);
            $this->comment->create($data);
            $quantity = count($this->comment->where('product_id', $request->product_id)->get());
            $products = Products::find($request->product_id);
            $products->comments = $quantity;
            $products->save();
            $comment = [];
            $comment['quantity'] = $quantity;
            $comment['status'] = 'success';
            $comment = collect($comment);
            DB::commit();
            return $comment;
            //code...
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            if ($validation->fails()) {
                // $validation->status = 'errors';
                return $validation->errors()->add('status', 'errors');
            }
        }
    }
}

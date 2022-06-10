<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\Categorys;
use Illuminate\Http\Request;

class CategorysApi extends Controller
{
    //
    private $categorys;

    public function __construct(Categorys $categorys)
    {
        # code...
        $this->categorys = $categorys;
    }

    public function category($id = null)
    {

        $category  = $this->categorys->find($id);
        $products = $category->products;
        if($products){

            return $products;
        }
        // $products->append($author);
        # code...
    }


}

<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function listProducts(){
        $dataProduct =  DB::table('products')
        ->select('products.id','products.name', 'products.price', 'products.description', 'categories.name as CategoryName')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->get();
        return view('list-product',['dataProduct' => $dataProduct]);
    }

    public function add(Request $request){
        $product = new Product();
        $product->name = $request->nameProduct;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->save();
        return redirect('/list-products');
    }

    public function delete($id){
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Sản phẩm không tồn tại'], 404);
        }
        $product->delete();
        return back();
    }
    public function editForm($id)
        {
            $product = Product::find($id);
            $categories = Categorie::all();
            return view('edit-product', ['product' => $product, 'categories' => $categories]);
        }

        public function update(Request $request, $id)
        {
            $request->validate([
                'nameProduct' => 'required',
                'price' => 'required|numeric',
                'description' => 'required',
                'category_id' => 'required|exists:categories,id',
            ]);
        
            $product = Product::find($id);
            $product->name = $request->input('nameProduct');
            $product->price = $request->input('price');
            $product->description = $request->input('description');
            $product->category_id = $request->input('category_id');
            $product->save();
        
            return redirect('/list-products')->with('success', 'Cập nhật sản phẩm thành công');
        }
}

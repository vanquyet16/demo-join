<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{

    public function listProducts(){
        $dataProduct =  DB::table('products')
        ->select('products.id','products.name', 'products.price', 'products.description','products.image', 'categories.name as CategoryName')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->get();
        return view('list-product',['dataProduct' => $dataProduct]);
    }
    public function add(Request $request){
        $request->validate([
            'nameProduct' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'file_upload' => 'required|file|mimes:jpeg,png,jpg,gif',
            'category_id' => 'required|integer',
        ]);
    
        if($request->hasFile('file_upload')){
            $file = $request->file_upload;
            $ext = $file->getClientOriginalExtension();
            $file_name = time().'-'.'product.'.$ext;
            $file->move(public_path('uploads'), $file_name);
        } else {
            $file_name = null;
        }
        $product = new Product();
        $product->name = $request->input('nameProduct');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->image = $file_name;
        $product->category_id = $request->input('category_id');
        $product->save();
        return redirect('/list-products')->with('success', 'Product added successfully');
    }
    

    public function delete($id){
        $product = Product::find($id);
    
        if (!$product) {
            return response()->json(['message' => 'Sản phẩm không tồn tại'], 404);
        }
        $imagePath = public_path('uploads/' . $product->image);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $product->delete();
        return back()->with('success', 'Product deleted successfully');
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

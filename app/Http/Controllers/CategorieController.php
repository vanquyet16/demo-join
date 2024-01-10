<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\alert;

class CategorieController extends Controller
{

    public function index(){
        return view('add-category');
    }

    public function listCategory(){
        $dataCategory = DB::table('categories')->get();
        return view('list-catergory', ['dataCategory' => $dataCategory]);
    }

    public function add(Request $request){
        // $data = $request->all();
        $categorie = new Categorie();
        $categorie -> name = $request->name;
        $categorie->save();
        return redirect('/list-category');
    }

    public function delete($id)
    {
        $productsCount = DB::table('products')->where('category_id', $id)->count();
        if ($productsCount > 0) {
            return back()->with('err', 'Loại còn sản phẩm');
        } 
        $category = Categorie::find($id);
            if (!$category) {
            return back()->with('err', 'Danh mục không tồn tại');
        }
            $category->delete();
        return back()->with('success', 'Xóa danh mục thành công');
    }

    public function editForm($id)
    {
        $categorie = Categorie::find($id);
        return view('edit-category', ['categorie' => $categorie]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nameCategorie' => 'required',
        ]);
    
        $category = Categorie::find($id);
        $category->name = $request->input('nameCategorie');   
        $category->save();
        return redirect('/list-category');
    }
}

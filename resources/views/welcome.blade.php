@extends('layout.format')
@section('body')
<h1 style="text-align: center;" class="mt-4">Thêm Product</h1>
<form method="POST" action="/add-product" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-2">
        <label for="exampleInputEmail1" class="mb-2">Name</label>
        <input type="text" name="nameProduct" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập name product">
    </div>

    <div class="form-group mb-2">
        <label for="exampleInputEmail1 " class="mb-2">Price</label>
        <input type="number" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập price">
    </div>

    <div class="form-group mb-2">
        <label for="exampleInputEmail1" class="mb-2">Description</label>
        <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập description">
    </div>
    <div class="mb-3">
        <label for="formFileMultiple" class="form-label">Image</label>
        <input class="form-control" name="file_upload" type="file" id="formFileMultiple" multiple>
    </div>
    <label for="exampleInputEmail1" class="mb-2">Chọn Loại</label>
    <select name="category_id" class="form-select" aria-label="Default select example">
        @foreach($dataCategory as $item)
        <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
    <div class="d-grid gap-2 mt-4">
        <button class="btn btn-primary bg-slate-500" type="submit">ADD</button>
    </div>
</form>
<a href="/list-products" class="d-grid gap-2 mt-4 bg-slate-500">
    <button class="btn btn-primary bg-slate-500" type="submit">VIEW LIST PRODUCT</button>
</a>
<a href="add-category" class="d-grid gap-2 mt-4 bg-slate-500">
    <button class="btn btn-primary bg-slate-500" type="submit">ADD CATEGORY</button>
</a>
@endsection
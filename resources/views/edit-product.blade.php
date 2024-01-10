@extends('layout.format')
@section('body')
    <h1 style="text-align: center;">Edit product</h1>
      <form method="POST" action="/edit-product/{{$product->id}}">
            @csrf
            @method('PUT')
            <div class="form-group mb-2">
                <label for="exampleInputEmail1" class="mb-2">Name</label>
                <input value="{{$product->name}}" type="text" name="nameProduct" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập name product">
            </div>

            <div class="form-group mb-2">
                <label for="exampleInputEmail1 " class="mb-2">Price</label>
                <input value="{{$product->price}}" type="number" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập price">
            </div>

            <div class="form-group mb-2">
                <label for="exampleInputEmail1" class="mb-2">Description</label>
                <input value="{{$product->description}}" type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập description">
            </div>

            <label for="exampleInputEmail1" class="mb-2">Chọn Loại</label>
            <select name="category_id" class="form-select" aria-label="Default select example">
            @foreach($categories as $category)
            <option value="{{$category->id}}" {{$product->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                @endforeach
            </select>
            <div class="d-grid gap-2 mt-4">
                <button class="btn btn-primary" type="submit">ADD</button>
            </div>
        </form>
        @endsection
         
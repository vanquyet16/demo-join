@extends('layout.format')
@section('body')
            <h1 style="text-align: center; margin-top:50px">Danh sách sản phẩm</h1>
            @foreach($dataProduct as $item)
            <ul style="border: 1px solid black; padding:10px" class="list-group list-group-flush mt-5">
            <li class="list-group-item">id: {{$item -> id}}</li>
            <li class="list-group-item">name: {{$item -> name}}</li>
            <li class="list-group-item">price: {{$item -> price}}</li>
            <li class="list-group-item">CategoryName: {{$item -> CategoryName}}</li>
            <a href="/delete-product/{{$item -> id}}"> <button class="btn btn-primary w-100" type="submit">Xoá</button></a>
            <a href="/edit-product/{{$item -> id}}"> <button class="btn btn-primary w-100 mt-3" type="submit">Sửa</button></a>
            </ul>
            @endforeach
 @endsection
@extends('layout.format')
@section('body')
    <h1 style="text-align: center; margin-top: 50px">Danh sách sản phẩm</h1>
    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th scope="col" class="text-center align-middle">Ảnh</th>
                <th scope="col" class="text-center align-middle">ID</th>
                <th scope="col" class="text-center align-middle">Tên sản phẩm</th>
                <th scope="col" class="text-center align-middle">Giá</th>
                <th scope="col" class="text-center align-middle">Danh mục</th>
                <th scope="col" class="text-center align-middle">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataProduct as $item)
            <tr>
                <td class="text-center align-middle">
                    <img width="80px" height="80px" src="{{ asset('uploads/' . $item->image) }}" alt="">
                </td>
                <td class="text-center align-middle">{{ $item->id }}</td>
                <td class="text-center align-middle">{{ $item->name }}</td>
                <td class="text-center align-middle">{{ $item->price }}</td>
                <td class="text-center align-middle">{{ $item->CategoryName }}</td>
                <td class="text-center align-middle">
                    <a href="/delete-product/{{ $item->id }}" class="btn btn-primary">Xoá</a>
                    <a href="/edit-product/{{ $item->id }}" class="btn btn-primary">Sửa</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

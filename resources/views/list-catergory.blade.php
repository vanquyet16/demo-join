@extends('layout.format')
@section('body')
    <div>
        <h1 style="text-align: center;">Danh sách Loại</h1>
        @if(session('err'))
            <div><span style="color: red;">{{ session('err') }}</span></div>
        @endif

        <table class="table table-bordered mt-5 text-center">
            <thead>
                <tr>
                    <th scope="col">Tên Loại</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataCategory as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>
                            <a href="/delete-category/{{ $item->id }}" class="btn btn-primary">Xoá</a>
                            <a href="/edit-category/{{ $item->id }}" class="btn btn-primary">Sửa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

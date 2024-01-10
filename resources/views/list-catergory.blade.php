@extends('layout.format')
@section('body')
           <div>
           <h1 style="text-align: center;">Danh sách Loại</h1>
            @if(session('err'))
            <div><span style="color: red;">{{ session('err') }}</span></div>
            @endif
            @foreach($dataCategory as $item)
            <ul style="border: 1px solid black; padding:10px" class="list-group list-group-flush mt-5">
                <li class="list-group-item">name: {{$item -> name}}</li>
                <a href="/delete-category/{{$item -> id}}"> <button class="btn btn-primary w-100" type="submit">Xoá</button></a>
                <a href="/edit-category/{{$item -> id}}"> <button class="btn btn-primary w-100 mt-3" type="submit">Sửa</button></a>
            </ul>
            @endforeach
           </div>
           @endsection
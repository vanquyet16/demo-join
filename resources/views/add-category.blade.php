@extends('layout.format')
@section('body')
            <h1 style="text-align: center;" class="mt-4">Thêm Category</h1>
            <div style="margin-top: 50px;">
                <form method="POST" action="/add">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="exampleInputEmail1" class="mb-2">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập name">
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <button class="btn btn-primary" type="submit">ADD</button>
                    </div>
                </form>
            </div>
            <a href="/list-category" class="d-grid gap-2 mt-4">
                <button class="btn btn-primary" type="submit">VIEW LIST CATEGORY</button>
            </a>
@endsection
@extends('layout.format')
@section('body')
                <h1 style="text-align: center;">Update categorie</h1>
            <form method="POST" action="/edit-category/{{$categorie->id}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label for="exampleInputEmail1" class="mb-2">Name</label>
                        <input value="{{$categorie->name}}" type="text" name="nameCategorie" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập name">
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <button class="btn btn-primary" type="submit">EDIT</button>
                    </div>
                </form>
                @endsection
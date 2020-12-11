@extends('layouts.app')

@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Изменить категорию</h1>
        </div>

        <form action="{{ route('category-update', $category->id) }}" method="POST">

            @csrf
            @method('patch')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Название:</strong>
                        <input type="text" name="name" value="{{ $category->name }}" class="form-control"
                               placeholder="Название">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </div>

        </form>

    </main>

@endsection

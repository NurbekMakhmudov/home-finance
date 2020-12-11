@extends('layouts.app')

@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Категории</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary"
                            data-toggle="modal" data-target="#createModal">Добавить категории
                    </button>
                </div>
            </div>
        </div>

        {{--Create Modal--}}
        @include('modal.category_create_modal')

        {{--Table--}}
        <div class="table-responsive">

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                    <th>№</th>
                    <th>Название</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>

                @foreach($categories as $category)

                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>
                            <a href="{{ route('category-edit', $category)  }}"
                               class="btn btn-sm btn-outline-secondary">
                                Редактировать
                            </a>
                            <a href="{{ route('category-delete', $category->id) }}"
                               class="btn btn-sm btn-outline-secondary">
                                Удалить
                            </a>
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>

    </main>

@endsection

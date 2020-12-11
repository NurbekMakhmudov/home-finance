@extends('layouts.app')

@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Панель управления</h1>
            {{--<div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Поделиться</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Экспорт</button>
                </div>
            </div>--}}
        </div>

        <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

    </main>

@endsection

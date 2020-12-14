@extends('layouts.app')

@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Панель управления</h1>

            {{--Не закончен

            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Поделиться</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Экспорт</button>
                </div>
            </div>--}}

        </div>

        @if(!$transactions->isEmpty())
            {{-- Не закончен
            <div class="col-lg-12">
                <canvas id="transactionsChart" class="rounded shadow"></canvas>
            </div>--}}
            <h5>Статистика на разработке </h5>
        @else
            <h5>Создавайте сначала категория а потом можете использовать транзакциями.</h5>
        @endif

    </main>

@endsection

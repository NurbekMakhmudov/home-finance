@extends('layouts.app')

@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Транзакции</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">

                    <button type="button" class="btn btn-sm btn-outline-secondary"
                            data-toggle="modal" data-target="#creteModal">Добавить транзакции
                    </button>
                </div>

            </div>
        </div>

        {{--Create Modal--}}
        @include('modal.transaction_create_modal')


        <div class="table-responsive">

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                    <th>ТИП</th>
                    <th>КАТЕГОРИЯ</th>
                    <th>ДАТА</th>
                    <th>СУММА</th>
                    <th>ИТОГО</th>
                    <th>КОММЕНТАРИЙ</th>
                    <th>Действия</th>
                </tr>
                </thead>

                <tbody>

                @foreach($transactions as $transaction)
                    <tr>
                        <td>{{$transaction->type}}</td>
                        <td>{{$transaction->category}}</td>
                        <td>{{$transaction->create_date}}</td>
                        <td>{{number_format((float)$transaction->amount, 2, '.', ' ')}}</td>
                        <td>{{number_format((float)$transaction->total, 2, '.', ' ')}}</td>
                        <td>{{$transaction->comments}}</td>
                        <td>
                            <a href="{{ route('transaction-edit', $transaction)  }}"
                               class="btn btn-sm btn-outline-secondary">
                                Редактировать
                            </a>
                            <a href="{{ route('transaction-delete', $transaction->id) }}"
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



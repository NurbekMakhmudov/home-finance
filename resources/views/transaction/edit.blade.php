@extends('layouts.app')

@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Изменить транзакция</h1>
        </div>

        <form action="{{ route('transaction-update', $transaction->id) }}" method="POST">

            @csrf
            @method('patch')
            <div class="row">

                <div class="container">
                    <div class="form-group">
                        <label for="select1">Добавления категория транзакция:</label>
                        <select class="form-control" id="select5" name="category">
                            @foreach($categories as $category)
                                <option @if($transaction->category === $category->name) selected @endif>
                                    {{$category->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Дата транзакции:</label>
                                <input required value="{{$transaction->create_date}}" type="date" class="form-control"
                                       name="create_date">
                            </div>
                        </div>
                        <div class="col-sm-6 other">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Тип счета:</label>
                                <select class="form-control" id="select5" name="type">
                                    <option @if($transaction->type === 'Доход') selected @endif>
                                        Доход
                                    </option>
                                    <option @if($transaction->type === 'Расход') selected @endif>
                                        Расход
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Сумма транзакции:</label>
                                <input required type="number" value="{{$transaction->amount}}" class="form-control"
                                       name="amount">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Комментарий :</label>
                        <textarea required type="text" class="form-control" rows="3"
                                  name="comments">@if($transaction->comments !== ''){{$transaction->comments}} @endif</textarea>
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </div>
            </div>

        </form>

    </main>

@endsection

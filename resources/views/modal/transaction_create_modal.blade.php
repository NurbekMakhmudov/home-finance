{{--Create Modal--}}
<div class="modal fade" id="creteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            @if($categories->isEmpty())
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Необходимо создать категорию</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @else

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавить транзакции</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="POST" action="{{ route('transaction-create') }}">
                        @csrf

                        <div class="container">

                            <div class="form-group">
                                <label for="select1">Добавления категория транзакция:</label>
                                <select class="form-control" id="select5" name="category">
                                    @foreach($categories as $category)
                                        <option>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Дата транзакции:</label>
                                        <input required value="{{date('Y-m-d')}}" type="date" class="form-control"
                                               name="create_date">
                                    </div>
                                </div>
                                <div class="col-sm-6 other">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Тип счета:</label>
                                        <select class="form-control" id="select5" name="type">
                                            <option>Доход</option>
                                            <option>Расход</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Сумма транзакции:</label>
                                        <input required type="number" class="form-control" name="amount">
                                    </div>
                                </div>
                                <div class="col-sm-6 other">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Итого:</label>
                                        <input required type="number" class="form-control" name="total">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Комментарий :</label>
                                <textarea required type="text" class="form-control" rows="3" name="comments"></textarea>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </div>

                    </form>

                </div>

            @endif

        </div>
    </div>
</div>

{{--Filter Modal--}}
<div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <h5 class="modal-title" id="exampleModalLabel">Фильтроват транзакции</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="POST" action="{{ route('transaction-filter') }}">
                        @csrf

                        <div class="container">
                            <div class="row">

                                <div class="col-sm-12 other">

                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Тип счета:</label>
                                        <select class="form-control" id="select5" name="type">
                                            <option value="all">Все</option>
                                            <option value="income">Доход</option>
                                            <option value="consumption">Расход</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">ПО ДАТА:</label>
                                        <input required value="{{date('Y-m-d')}}" type="date" class="form-control"
                                               name="start_date">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">ДО ДАТА:</label>
                                        <input required value="{{date('Y-m-d')}}" type="date" class="form-control"
                                               name="end_date">
                                    </div>
                                </div>

                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                <button type="submit" class="btn btn-primary">Фильтр</button>
                            </div>
                        </div>

                    </form>

                </div>

            @endif

        </div>
    </div>
</div>

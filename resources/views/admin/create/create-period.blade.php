<h4>Voeg periode toe</h4>
<form id="create-form" action="{{ action('PeriodController@store') }}" method="POST">
    @csrf
    <div class="form-row">
        <div class="col">
            <input type="number" class="form-control" placeholder="periode" id="period" name="period">
        </div>
        <div class="col">
            <input type="number" class="form-control" placeholder="semester" id="semester" name="semester">
        </div>
        <div class="col">
            <button id="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
<h3>Voeg docent toe<h3>
<form id="create-form" action="{{ action('TeacherController@store') }}" method="POST">
    @csrf
    <div class="form-row">
        <div class="col">
            <input type="text" class="form-control" placeholder="voornaam" id="firstname" name="firstname">
        </div>
        <div class="col">
            <input type="text" class="form-control" placeholder="achternaam" id="lastname" name="lastname">
        </div>
        <div class="col">
            <button id="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
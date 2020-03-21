<h4>Voeg docent toe</h4>
<form id="create-form" action="{{ route('teacher.store') }}" method="POST">
    @csrf
    <div class="form-row">
        <div class="col">
            <input type="text" class="form-control" placeholder="voornaam" id="firstname" name="firstname" required>
        </div>
        <div class="col">
            <input type="text" class="form-control" placeholder="achternaam" id="lastname" name="lastname" required>
        </div>
        <div class="col">
            <button id="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
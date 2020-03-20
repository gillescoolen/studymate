@if(count($deadlines) > 0)
    <h3>Assessments & Tentamens</h3>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Naam</th>
                <th scope="col">Vak</th>
                <th scope="col">Type</th>
                <th scope="col">Docent</th>
                <th scope="col">Categorieën</th>
                <th scope="col">Gedaan</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($deadlines as $deadline)
                <form id="deadline-form" action="{{ route('update-deadline', $deadline->id) }}" method="POST">
                    @CSRF
                    @method('PATCH')
                    <tr>
                        <td style="width: 25%">{{$deadline->date}}</td>
                        <td style="width: 25%">{{$deadline->exam->name}}</td>
                        <td style="width: 25%">{{$deadline->exam->type->type}}</td>
                        <td style="width: 25%">{{$deadline->exam->module->teacher->firstname}}</td>
                        <td style="width: 25%">{{$deadline->tag}}</td>
                        <td style="width: 25%"><input type="checkbox" name="done" value="1" {{$deadline->done === 1 ? 'checked' : ''}}></td>
                        <td style="width: 25%"><button type="submit" class="btn btn-sm btn-primary">Save</button></td>
                    </tr>
                </form>
            @endforeach
        </tbody>
    </table>
@else
    Geen vakken beschikbaar.
@endif
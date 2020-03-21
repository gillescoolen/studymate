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
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($deadlines as $deadline)

        <tr>
            <td>{{$deadline->date}}</td>
            <td>{{$deadline->exam->name}}</td>
            <td>{{$deadline->exam->type->type}}</td>
            <td>{{$deadline->exam->module->teacher->firstname}}</td>
            <td>{{$deadline->tag}}</td>
            <td>
                <form id="deadline-form" action="{{ route('update-deadline', $deadline->id) }}" method="POST">
                    @CSRF
                    @method('PATCH')
                    <input type="checkbox" name="done" value="1" {{$deadline->done === 1 ? 'checked' : ''}}>

                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                </form>
            </td>
            <td>
                <form action="{{route('delete-deadline',[$deadline->id])}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
Geen vakken beschikbaar.
@endif
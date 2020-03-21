@if(count($teachers) > 0)
    <h3>Docenten</h3>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Voornaam</th>
                <th scope="col">Achternaam</th>
                <th scope="col">Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teachers as $teacher)
                <tr>
                    <td style="width: 25%">{{$teacher->firstname}}</td>
                    <td style="width: 25%">{{$teacher->lastname}}</td>
                    <td style="width: 40%">
                        <form action="{{ route('teacher.destroy', $teacher->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-warning" href="{{ route('teacher.edit', $teacher->id) }}">Edit</a>
                            <button id="submit" type="submit" class="btn btn-danger">X</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    Geen vakken beschikbaar.
@endif
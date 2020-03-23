@if(count($exams) > 0)
    <h3>Assessments & Tentamens</h3>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Naam</th>
                <th scope="col">Vak</th>
                <th scope="col">Type</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($exams as $exam)
                    <tr>
                        <td style="width: 25%">{{$exam->name}}</td>
                        <td style="width: 25%">{{$exam->module->name}}</td>
                        <td style="width: 25%">{{$exam->type}}</td>
                        <td style="width: 25%">
                        <form action="{{ route('exam.destroy', $exam->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-sm btn-warning" href="{{ route('exam.edit', $exam->id) }}">Edit</a>
                            <button id="submit" type="submit" class="btn btn-sm btn-danger">X</button>
                        </form>
                    </td>
                    </tr>
            @endforeach
        </tbody>
    </table>
@else
    Er zijn geen Assessments of Tentamens beschikbaar.
@endif
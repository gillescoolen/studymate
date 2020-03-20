@if(count($exams) > 0)
    <h3>Assessments & Tentamens</h3>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Naam</th>
                <th scope="col">Vak</th>
                <th scope="col">Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach($exams as $exam)
                    <tr>
                        <td style="width: 33%">{{$exam->name}}</td>
                        <td style="width: 33%">{{$exam->module->name}}</td>
                        <td style="width: 33%">{{$exam->type->type}}</td>
                    </tr>
            @endforeach
        </tbody>
    </table>
@else
    Geen vakken beschikbaar.
@endif
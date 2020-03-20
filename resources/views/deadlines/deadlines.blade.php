@if(count($deadlines) > 0)
    <h3>Assessments & Tentamens</h3>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Naam</th>
                <th scope="col">Vak</th>
                <th scope="col">Type</th>
                <th scope="col">Datum</th>
            </tr>
        </thead>
        <tbody>
            @foreach($deadlines as $exam)
                    <tr>
                        <td style="width: 25%">{{$exam->date}}</td>
                    </tr>
            @endforeach
        </tbody>
    </table>
@else
    Geen vakken beschikbaar.
@endif
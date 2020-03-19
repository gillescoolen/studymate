@if(count($teachers) > 0)
    <h3>Docenten</h3>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Voornaam</th>
                <th scope="col">Achternaam</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teachers as $teacher)
                    <tr>
                        <td style="width: 25%">{{$teacher->firstname}}</td>
                        <td style="width: 25%">{{$teacher->lastname}}</td>
                    </tr>
            @endforeach
        </tbody>
    </table>
@else
    Geen vakken beschikbaar.
@endif
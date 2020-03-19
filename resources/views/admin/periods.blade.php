@if(count($periods) > 0)
    <h3>Periodes</h3>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Periode</th>
                <th scope="col">Semester</th>
            </tr>
        </thead>
        <tbody>
            @foreach($periods as $period)
                    <tr>
                        <td style="width: 25%">{{$period->period}}</td>
                        <td style="width: 25%">{{$period->semester}}</td>
                    </tr>
            @endforeach
        </tbody>
    </table>
@else
    Geen vakken beschikbaar.
@endif
@if(count($periods) > 0)
    <h3>Periodes</h3>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Periode</th>
                <th scope="col">Semester</th>
                <th scope="col">Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach($periods as $period)
                <tr>
                    <td style="width: 40%">{{$period->period}}</td>
                    <td style="width: 40%">{{$period->semester}}</td>
                    <td style="width: 20%">
                        <form action="{{ route('period.destroy', $period->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
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
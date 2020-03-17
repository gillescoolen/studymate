@if(count($modules) > 0)
    <h3>Modules</h3>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Vak</th>
                <th scope="col">Docent</th>
                <th scope="col">EC</th>
                <th scope="col">Periode</th>
                <th scope="col">Semester</th>
            </tr>
        </thead>
        <tbody>
            @foreach($modules as $module)
            <tr>
                <td style="width: 25%">{{$module->name}}</td>           
                <td style="width: 25%">{{$module->teacher->firstname}} {{$module->teacher->lastname}}</td>
                <td style="width: 25%">{{$module->ec}}</td>
                <td style="width: 25%">{{$module->period->id}}</td>
                <td style="width: 25%">{{$module->period->semester}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    Geen vakken beschikbaar.
@endif
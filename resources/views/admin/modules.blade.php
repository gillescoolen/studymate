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
                <th scope="col">Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach($modules as $module)
                <tr>
                    <td style="width: 25%">{{$module->name}}</td>           
                    <td style="width: 25%">{{$module->teacher->firstname}} {{$module->teacher->lastname}}</td>
                    <td style="width: 10%">{{$module->ec}}</td>
                    <td style="width: 10%">{{$module->period->period}}</td>
                    <td style="width: 10%">{{$module->period->semester}}</td>
                    <td style="width: 25%">
                        <form action="{{ route('module.destroy', $module->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-warning" href="{{ route('module.edit', $module->id) }}">Edit</a>
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

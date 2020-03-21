@if(count($deadlines) > 0)
<h3>Assessments & Tentamens</h3>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col"><a href="?sort=date">Datum</a></th>
            <th scope="col"><a href="?sort=exam">Naam</a></th>
            <th scope="col"><a href="?sort=module">Module</a></th>
            <th scope="col"><a href="?sort=teacher">Docent</a></th>
            <th scope="col"><a href="?sort=tags">Tags</a></th>
            <th scope="col"><a href="?sort=done">Voldaan</a></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($deadlines as $deadline)

        <tr>
            <td>{{$deadline['date']}}</td>
            <td>{{$deadline['exam']}}</td>
            <td>{{$deadline['module']}}</td>
            <td>{{$deadline['teacher']}}</td>
            <td>
                @if(count($deadline['tags']) > 0)
                    @foreach($deadline['tags'] as $tag)
                        <span class="badge badge-primary">{{$tag->name}}</span>
                    @endforeach
                @endif
            </td>
            <form id="deadline-form" action="{{ route('deadline.update', $deadline['id']) }}" method="POST">
                @CSRF
                @method('PATCH')
                <td>
                   
                    <input type="checkbox" name="done" value="1" {{$deadline['done'] === 1 ? 'checked' : ''}}>
                </td>
                <td>
                    <button type="submit" class="btn btn-sm btn-success">Save</button>
                </td>
            </form>
            <td>
                <a class="btn btn-sm btn-warning" href="{{ route('deadline.edit', $deadline['id']) }}">Edit</a>
            </td>
            <td>
                <form action="{{ route('deadline.destroy', $deadline['id']) }}" method="POST">
                    @CSRF
                    @method('DELETE')
                    <button id="submit" type="submit" class="btn btn-sm btn-danger">X</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
Geen vakken beschikbaar.
@endif
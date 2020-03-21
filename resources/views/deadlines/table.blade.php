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
        </tr>
    </thead>
    <tbody>
        @foreach($deadlines as $deadline)

        <tr>
            <td>{{$deadline['date']}}</td>
            <td>{{$deadline['exam']}}</td>
            <td>{{$deadline['module']}}</td>
            <td>{{$deadline['teacher']}}</td>
            <form id="deadline-form" action="{{ route('update-deadline', $deadline['id']) }}" method="POST">
                <td>
                    @if(count($deadline['tags']) > 0)
                        @foreach($deadline['tags'] as $tag)
                            <span class="badge badge-primary">{{$tag->name}}</span>
                        @endforeach
                    @endif
                </td>
                <td>
                    @CSRF
                    @method('PATCH')
                    <input type="checkbox" name="done" value="1" {{$deadline['done'] === 1 ? 'checked' : ''}}>
                </td>
                <td>
                    <button type="submit" class="btn btn-sm btn-success">Save</button>
                </td>
            </form>
            <td>
                <a href="/deadlines/edit" class="btn btn-sm btn-primary">Edit</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
Geen vakken beschikbaar.
@endif
@if(count($deadlines) > 0)
<h3>Assessments & Tentamens</h3>
<table class="table" dusk="deadline-table">
    <thead class="thead-dark">
        <tr>
            <th scope="col"><a dusk="sort-date" href="?sort=date">Datum</a></th>
            <th scope="col"><a dusk="sort-exam" href="?sort=exam">Naam</a></th>
            <th scope="col"><a dusk="sort-module" href="?sort=module">Module</a></th>
            <th scope="col"><a dusk="sort-teacher" href="?sort=teacher">Docent</a></th>
            <th scope="col"><a dusk="sort-tags" href="?sort=tags">Tags</a></th>
            <th scope="col"><a dusk="sort-done" href="?sort=done">Voldaan</a></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($deadlines as $deadline)
            <tr dusk="row-{{$loop->index}}">
                <td dusk="date-{{$loop->index}}">{{$deadline['date']}}</td>
                <td dusk="exam-{{$loop->index}}">{{$deadline['exam']}}</td>
                <td dusk="module-{{$loop->index}}">{{$deadline['module']}}</td>
                <td dusk="teacher-{{$loop->index}}">{{$deadline['teacher']}}</td>
                <td dusk="tags-{{$loop->index}}">
                    @if(count($deadline['tags']) > 0)
                        @foreach($deadline['tags'] as $tag)
                            <span class="badge badge-primary">{{$tag->name}}</span>
                        @endforeach
                    @endif
                </td>
                <form dusk="checked-form" id="deadline-form" action="{{ route('deadline.update', $deadline['id']) }}" method="POST">
                    @CSRF
                    @method('PATCH')
                    <td>
                        <input dusk="done-{{$loop->index}}" type="checkbox" name="done" value="1" {{$deadline['done'] === 1 ? 'checked' : ''}}>
                    </td>
                    <td>
                        <button dusk="save-{{$loop->index}}" type="submit" class="btn btn-sm btn-success">Save</button>
                    </td>
                </form>
                <td>
                    <a dusk="edit-{{$loop->index}}" class="btn btn-sm btn-warning" href="{{ route('deadline.edit', $deadline['id']) }}">Edit</a>
                </td>
                <td>
                    <form action="{{ route('deadline.destroy', $deadline['id']) }}" method="POST">
                        @CSRF
                        @method('DELETE')
                        <button dusk="delete-{{$loop->index}}" id="submit" type="submit" class="btn btn-sm btn-danger">X</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@else
Geen deadlines beschikbaar.
@endif
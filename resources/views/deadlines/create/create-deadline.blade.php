<h4>Voeg een deadline toe</h4>
<form id="create-form" action="{{ action('DeadlineController@store') }}" method="POST">
    @csrf
    <div class="form-row">
        <div class="col">
            <select class="form-control" id="exam_id" name="exam_id">
                @if(count($exams) > 0)
                    @foreach($exams as $exam)
                        <option value="{{$exam->id}}">{{$exam->name}}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="col">
            <div class="col">
                <input type="date" class="form-control" placeholder="datum" id="date" name="date">
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col">
            <button id="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
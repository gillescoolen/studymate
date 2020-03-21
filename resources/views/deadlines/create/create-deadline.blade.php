@if(count($exams) > 0)
<h4>Voeg een deadline toe</h4>
<form id="create-form" action="{{ action('DeadlineController@store') }}" method="POST">
    @csrf
    <div class="form-row">
        <div class="col-6">
            <select class="form-control" id="exam_id" name="exam_id">
                @if(count($exams) > 0)
                    @foreach($exams as $exam)
                        <option value="{{$exam->id}}">{{$exam->name}}</option>
                    @endforeach
                @endif
            </select>
            <input type="date" class="form-control" placeholder="datum" id="date" name="date">
            <button id="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="col-6">
            <select multiple class="form-control" id="tags" name="tags[]">
                @if(count($tags) > 0)
                    @foreach($tags as $tag)
                        <option value="{{$tag->name}}">{{$tag->name}}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
</form>
@else
    <h4>Er zijn momenteel geen examens om een deadline aan te hangen.</h4>
@endif
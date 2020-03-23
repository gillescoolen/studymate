@if(count($exams) > 0)
<h4>Voeg een deadline toe</h4>
<form id="create-form" action="{{ route('deadline.store') }}" method="POST">
    @csrf
    <div class="form-row">
        <div class="col-6">
            <select dusk="exam" class="form-control" id="exam_id" name="exam_id">
                @if(count($exams) > 0)
                    @foreach($exams as $exam)
                        <option value="{{$exam->id}}">{{$exam->name}}</option>
                    @endforeach
                @endif
            </select>
            <input dusk="date" type="date" class="form-control" placeholder="datum" id="date" name="date">
            <button dusk="submit" id="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="col-6">
            <select dusk="tags" multiple class="form-control" id="tags" name="tags[]">
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
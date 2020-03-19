<h4>Voeg module toe</h4>
<form id="create-form" action="{{ action('ModuleController@store') }}" method="POST">
    @csrf
    <div class="form-row">
        <div class="col">
            <input type="text" class="form-control" placeholder="naam" id="name" name="name">
        </div>
        <div class="col">
            <input type="number" class="form-control" placeholder="ec" id="ec" name="ec">
        </div>
    </div>
    
    <div class="form-row">
        <div class="col">
            <select class="form-control" id="period_id" name="period_id">
                @if(count($periods) > 0)
                    @foreach($periods as $period)
                        <option value="{{$period->id}}">Periode: {{$period->period}}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="col">
            <select class="form-control" id="teacher_id" name="teacher_id">
                @if(count($teachers) > 0)
                    @foreach($teachers as $teacher)
                        <option value="{{$teacher->id}}">{{$teacher->firstname}} {{$teacher->lastname}}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="col">
            <button id="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
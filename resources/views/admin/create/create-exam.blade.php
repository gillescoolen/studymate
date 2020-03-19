<h3>Voeg tentamen/assessment toe<h3>
<form id="create-form" action="{{ action('ExamController@store') }}" method="POST">
    @csrf
    <div class="form-row">
        <div class="col">
            <input type="text" class="form-control" placeholder="examen naam" id="name" name="name">
        </div>
        <div class="col">
            <input type="number" class="form-control" placeholder="ec" id="ec" name="ec">
        </div>
    </div>
    <div class="form-row">
        <div class="col">
            <select class="form-control" id="module_id" name="module_id">
                @if(count($modules) > 0)
                    @foreach($modules as $module)
                        <option value="{{$module->id}}">Module: {{$module->name}}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="col">
            <select class="form-control" id="type_id" name="type_id">
                @if(count($types) > 0)
                    @foreach($types as $type)
                        <option value="{{$type->id}}">{{$type->type}}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="col">
            <input type="date" class="form-control" placeholder="datum" id="date" name="date">
        </div>
    </div>
    <div class="form-row">
        <div class="col">
            <button id="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
<h4>Voeg examen toe</h4>
<form id="create-form" action="{{ route('exam.store') }}" method="POST">
    @csrf
    <div class="form-row">
        <div class="col">
            <input type="text" class="form-control" placeholder="examen naam" id="name" name="name" required>
        </div>
    </div>
    <div class="form-row">
        <div class="col">
            <select class="form-control" id="module_id" name="module_id" required>
                @if(count($modules) > 0)
                    @foreach($modules as $module)
                        <option value="{{$module->id}}">Module: {{$module->name}}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="col">
            <select class="form-control" id="type" name="type" required>
                @if(count($types) > 0)
                    @foreach($types as $type)
                        <option value="{{$type->type}}">{{$type->type}}</option>
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
<br>
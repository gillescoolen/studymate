@extends('dashboard')

@section('content')
@if(count($periods) > 0)
    @foreach($periods as $period)
        <div class="col-12">
            Te behalen EC: {{$period->percentage}}
        </div>
        <h3>Blok {{$period->id}}</h3>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                  <th scope="col">Vak</th>
                  <th scope="col">EC</th>
                  <th scope="col">Behaald cijfer</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($period->modules as $module)
                    <tr>
                        <td style="width: 25%">{{$module->name}}</td>
                        <td style="width: 25%">{{$module->ec}}</td>
                        <td style="width: 25%">
                            @if ($module->grade != null)
                                {{$module->grade}}
                            @else
                                n.v.t
                            @endif
                        </td>
                    </tr>
                @endforeach 
              </tbody>
        </table>
    @endforeach
@else
    Geen vakken beschikbaar.
@endif

@endsection
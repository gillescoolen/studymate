@extends('layouts.app')

@section('content')
@if(count($periods) > 0)
    @foreach($periods as $period)
        <h3>Blok {{$period->period}} - Semester {{$period->semester}}</h3> Te behalen EC: {{$period->ec}}
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="{{$period->percentage}}" style="width: {{$period->percentage}}%" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                  <th scope="col">Vak</th>
                  <th scope="col">EC</th>
                  <th scope="col">Docent</th>
                  <th scope="col">Behaald cijfer</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($period->modules as $module)
                    <tr>
                        <td style="width: 25%">{{$module->name}}</td>
                        <td style="width: 10%">{{$module->ec}}</td>
                        <td style="width: 25%">{{$module->teacher->firstname}} {{$module->teacher->lastname}}</td>
                        <td style="width: 25%">
                            @if ($module->grade != null)
                                {{$module->grade}}
                            @else
                                -
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
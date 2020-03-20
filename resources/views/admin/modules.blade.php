@if(count($modules) > 0)
    <h3>Modules</h3>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Vak</th>
                <th scope="col">Docent</th>
                <th scope="col">EC</th>
                <th scope="col">Periode</th>
                <th scope="col">Semester</th>
                <th scope="col">Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach($modules as $module)
                <tr>
                    <td style="width: 25%">{{$module->name}}</td>           
                    <td style="width: 25%">{{$module->teacher->firstname}} {{$module->teacher->lastname}}</td>
                    <td style="width: 10%">{{$module->ec}}</td>
                    <td style="width: 10%">{{$module->period->period}}</td>
                    <td style="width: 10%">{{$module->period->semester}}</td>
                    <td style="width: 10%">
                        <a class="btn btn-warning" href="/module/{{$module->id}}/edit">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    Geen vakken beschikbaar.
@endif

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


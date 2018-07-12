@extends('master')
@section('title')
|Chapos
@endsection
@section('content')
<div class='row'>
    <div class='col md-6 col-lg-6 col-xs-6'>
      @if ($errors->any())
      <br>
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      <form name="chapoh" method='post' action="{{URL::to('chapo/save')}}">
        {{csrf_field()}}
        <div class="form-group">
          <label for="cname">Chapo Name</label>
          <input type="text" class="form-control" id="cname" name="cname" placeholder="Enter chapo name">
        </div>
        <div class="form-group">
          <label for="cvalue">Chapo value</label>
          <input type="number" class="form-control" id="cvalue" name="cvalue" placeholder="Enter chapo value">
       </div>
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      </div>
      <div class='col md-6 col-lg-6 col-xs-6'>
        <table class="table">
          <thead>
            <tr class="thead-dark">
              <th>#</th>
              <th>Name</th>
              <th>Cost</th>
              <th>Created</th>
              <th>Updated</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($chapos as $chapo)
            <tr>
              <td>{{$chapo->chapo_id}}</td>
              <td>{{$chapo->chapo_name}}</td>
              <td>{{$chapo->chapo_value}}</td>
              <td>{{$chapo->chapo_created_at}}</td>
              <td>{{$chapo->chapo_updated_at}}</td>
              <td>
                <form method="post"
                id="frm_{{$chapo->chapo_id}}"
                action="{{URL::to('chapo/del')}}"
                >
                {{csrf_field()}}
                <input type="hidden" value="{{$chapo->chapo_id}}" name="chapo_id" />
                <button type="submit" class="btn btn-primary">
                  <i class="fa fa-trash"></i>
                </button>
              </form>
              </td>
              <td>
                <!-- Button trigger modal -->

                  <i class="fa fa-edit"  data-toggle="modal" data-target="#exampleModal"></i>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Chapo Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form name="chapoh" method='post' id="frm_{{$chapo->chapo_id}}" action="{{URL::to('chapo/edit')}}">
                          <input type="hidden" value="{{$chapo->chapo_id}}" name="chapo_id" />
                          {{csrf_field()}}
                          <div class="form-group">
                            <label for="cname">Chapo Name</label>
                            <input type="text" class="form-control" id="cname" name="cname" value="{{$chapo->chapo_name}}" placeholder="Enter chapo name" >
                          </div>
                          <div class="form-group">
                            <label for="cvalue">Chapo value</label>
                            <input type="number" class="form-control" id="cvalue" name="cvalue" value="{{$chapo->chapo_value}}" placeholder="Enter chapo value">
                         </div>
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
              </td>
            </tr>
              @endforeach
          </tbody>
        </table>

      </div>
</div>



@endsection

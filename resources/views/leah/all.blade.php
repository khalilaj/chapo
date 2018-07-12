@extends('master')

@section('content')
  <div class="row">

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
      <form name='add' method='post'
      action="{{URL::to('add')}}">
      {{csrf_field()}}

      <div class="form-group">
        <label for="lname">Name</label>
        <input type="text" class="form-control" name='lname' id="lname" aria-describedby="emailHelp" placeholder="Enter name">
        <small id="emailHelp" class="form-text text-muted">We'll never share your name with anyone else.</small>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
      <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Created at</th>
          <th scope="col">Updated at</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
      @foreach($rows as $row)
        <tr>
          <td>{{$row->leah_id}}</td>
          <td>{{$row->leah_name}}</td>
          <td>{{$row->created_at}}</td>
          <td>{{$row->updated_at}}</td>
          <td>
            <a href="{{URL::to('del').'/'.$row->leah_id}}"
            title="Delete?">
              <i class="fa fa-trash"></i>
            </a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
    </div>

  </div>
@endsection

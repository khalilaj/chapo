@extends('welcome');

@section('content')

<div class="columns">

  <div class="column is-10 is-offset-1">
    <h3>Add</h3>
    @if ($errors->any())
    <div class="notification is-danger">
      <button class="delete"></button>
      <ul>
        @foreach ($errors->all()
        as $error)

        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <form name='frm' method='post' action="{{URL::to('save')}}">

      {{ csrf_field() }}

      <div class="input-field">
        <label class="field">
          <input type="text" class="input" name="jname" placeholder="name">
        </label>
      </div>

      <label class="field">
        <input type="submit" name="submit" class="button is-primary">
      </label>

    </form>
    <br/>
    <h3>My List</h3>
    <table class="table is-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($rows as $row)
        <tr>
          <td>{{$row->jaribu_id}}</td>
          <td>{{$row->jaribu_name}}</td>
          <td><a href="{{URL::to('delete').'/'.$row->jaribu_id}}"> <i class="fa fa-trash" aria-hidden="true"></i> </a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection

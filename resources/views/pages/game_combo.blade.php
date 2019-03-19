@extends('layouts.admin')
@section('content')
<section class="content">
    <!-- Small boxes (Stat box) -->
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-12 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        @include('components.feedback')
        <table class="table table-striped">
          <thead>
              <tr>
                  <th>#</th>
                  <th>Game</th>
                  <th>Update</th>
                  <th>Delete</th>
              </tr>
          </thead>
          <tbody>
              @foreach($games as $g)
              <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$g->title}}</td>
              <td>
              <a href="{{url('/game/update/')}}/{{$g->id}}" class="btn btn-primary">
                Update
              </a>
              

              </td>
              <td>
              <form action="{{asset('/game/delete')}}" method="post">
               @csrf
              <input type="hidden" name="id" value="{{$g->id}}" />
                <button class="btn btn-primary" type="submit">Delete</button>

              </form>
                  
                  
              </td>
              </tr>
              @endforeach
          </tbody>
      </table>
      </section>
      <!-- /.Left col -->
      <!-- right col (We are only adding the ID to make the widgets sortable)-->
      <!-- right col -->
    </div>
    <!-- /.row (main row) -->

  </section>
  @endsection
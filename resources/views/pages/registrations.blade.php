@extends('layouts.admin')
@section('content')
<section class="content">
    <!-- Small boxes (Stat box) -->
    @include("components.admin.user_options")
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-12 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <table class="table table-striped">
          <thead>
              <tr>
                  <th>#</th>
                  <th>User</th>
                  <th>Registered At</th>
              </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
              <tr>
              <td>{{$loop->index}}</td>
              <td>{{$user->username}}</td>
                  <td>{{$user->created_at}}</td>
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
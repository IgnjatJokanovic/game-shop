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
                  <th>Page</th>
                  <th>Update</th>
              </tr>
          </thead>
          <tbody>
              @foreach($pages as $p)
              <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$p->id==1?'About':'Partners'}}</td>
              <td>
              <a href="{{url('/page/update/')}}/{{$p->id}}" class="btn btn-primary">
                Update
              </a>
              

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
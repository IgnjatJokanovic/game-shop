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
        <table class="table table-striped">
          <thead>
              <tr>
                  <th>Page</th>
                  <th>Created at</th>
                  <th>Updated at</th>
              </tr>
          </thead>
          <tbody>
              @foreach($pages as $p)
              <tr>
              <td>{{$p->id==1?'About':'Partners'}}</td>
              <td>
              {{$p->created_at}}
              

              </td>
              <td>
              {{$p->created_at==$p->updated_at?'NONE':$p->updated_at}}
                  
                  
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
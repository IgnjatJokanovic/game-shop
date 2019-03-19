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
                  <th>Category</th>
                  <th>Created at</th>
                  <th>Updated at</th>
                  <th>Deleted at</th>
              </tr>
          </thead>
          <tbody>
              @foreach($genres as $c)
              <tr>
              <td>{{$c->name}}</td>
              <td>
              {{$c->created_at}}
              

              </td>
              <td>
              {{$c->created_at==$c->updated_at?'NONE':$c->updated_at}}
                  
                  
              </td>
              <td>NONE</td>
              </tr>
              @endforeach
              @foreach($deletes->activities as $a)
              <tr>
              <td>{{$a->msg}}</td>
              <td>
              NONE
              

              </td>
              <td>
              NONE
                  
                  
              </td>
              <td>{{$a->created_at}}</td>
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
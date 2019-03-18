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
                  <th>Game</th>
                  <th>Created at</th>
                  <th>Updated at</th>
                  <th>Deleted at</th>
              </tr>
          </thead>
          <tbody>
              @foreach($games as $g)
              <tr>
              <td>{{$g->title}}</td>
              <td>
              {{$g->created_at}}
              

              </td>
              <td>
              {{$g->created_at==$g->updated_at?'NONE':$g->updated_at}}
                  
                  
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
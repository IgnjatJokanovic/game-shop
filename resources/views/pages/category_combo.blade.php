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
                  <th>Category</th>
                  <th>Update</th>
                  <th>Delete</th>
              </tr>
          </thead>
          <tbody>
              @foreach($categories as $c)
              <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$c->name}}</td>
              <td>
              <form action="{{asset('/category/update')}}" method="post">
               {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$c->id}}"/>
                    <input type="text" name="name"/>
    
               
                <button class="btn btn-primary" type="submit">Update</button>
              </form>
              

              </td>
              <td>
              <form action="{{asset('/category/delete')}}" method="post">
                {{csrf_field()}}
              <input type="hidden" name="id" value="{{$c->id}}" />
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
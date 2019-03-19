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
                  <th>Games</th>
                  <th>Ordered At</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>1</td>
                  <td>Thomas Hardy</td>
                  <td><p>IGRA1</p>
                    <p>IGRA2</p>
                  </td>
                  <td>DATUM</td>
              </tr>     
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
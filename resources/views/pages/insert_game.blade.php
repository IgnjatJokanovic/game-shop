@extends('layouts.admin')
@section('content')
<section class="content">
    <!-- Small boxes (Stat box) -->
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      @include('components.feedback')
      <section class="col-md-12">
        <!-- Custom tabs (Charts with tabs)-->
      <form action="{{url('/game/store')}}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
              <label for="price">Price</label>
              <input type="text" class="form-control" id="price" name="price">
            </div>
            <div class="form-group">
                <label for="main">Main Picture</label>
                <input type="file" class="form-control-file" id="main" name="picture">
            </div>
           
            <div class="form-group">
            <label for="galery">Choose 5 Galery Pictures</label>
            <input type="file" class="form-control-file" id="galery" name="galery[]" multiple>
            </div>
            <label>Categories</label>
            @foreach($categories as $c)
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="category" value="{{$c->id}}" name="category[]">
            <label class="form-check-label" for="exampleCheck1">{{$c->name}}</label>
            </div>
            @endforeach
          </form>
      </section>
      <!-- /.Left col -->
      <!-- right col (We are only adding the ID to make the widgets sortable)-->
      <!-- right col -->
    </div>
    <!-- /.row (main row) -->

  </section>
@endsection
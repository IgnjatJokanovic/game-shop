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
      <form action="{{url('/page/updateContent')}}" method="POST">
        @csrf
            <div class="form-group">
              <label for="title">Content</label>
            <input type="text" class="form-control" id="title" name="text" value="{{$page->content}}">
            </div>
              <input type="hidden" name="game_id" value="{{$page->id}}">
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
      </section>
      
          @foreach($page->images as $i)

          <section class="col-md-12 margin">
                <!-- Custom tabs (Charts with tabs)-->

              <form action="{{url('/page/updateImage')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <table>
                    <tr>
                   
                        <td>
                        <label for="galery">Edit Picture&nbsp;&nbsp;&nbsp;&nbsp;</label></br>
                        </td>
                        <td>
                        <img width="100" height="100" src="{{asset('/'.$i->src)}}"/>&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        <td>
                        <input type="file" class="form-control-file" id="galery" name="image">
                        <input type="hidden" name="id" value="{{$i->id}}">
                        <input type="hidden" name="page_id" value="{{$page->id}}">
                        </td>
                        <td>
                            Alt:&nbsp;&nbsp;
                        <input type="text" name="alt" value="{{$i->alt}}">&nbsp;&nbsp;
                        </td>
                        <td>
                        <button type="submit" class="btn btn-primary m-left">Update</button>
                        </td>
                </tr>
                </table>
                  </form>
            </section>
    

            @endforeach

           
      <!-- /.Left col -->
      <!-- right col (We are only adding the ID to make the widgets sortable)-->
      <!-- right col -->
    </div>
    <!-- /.row (main row) -->

  </section>
@endsection
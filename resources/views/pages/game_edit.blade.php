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
      <form action="{{url('/game/updateBasic')}}" method="POST">
        @csrf
            <div class="form-group">
              <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$game->title}}">
            </div>
            <div class="form-group">
              <label for="price">Price</label>
              <input type="text" class="form-control" id="price" name="price" value="{{$game->price}}">
              <input type="hidden" name="game_id" value="{{$game->id}}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
      </section>
      <section class="col-md-12 margin">
            <!-- Custom tabs (Charts with tabs)-->
          <form action="{{url('/game/updateImage')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <table>
                <tr>
                    <td>
                            <label for="galery">Edit main picture&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    </td>
                
                        <td>
                                <img width="100" height="100" src="{{asset('/'.$game->images->first()->src)}}"/>&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="hidden" name="id" value="{{$game->images->first()->id}}">
                                <input type="hidden" name="game_id" value="{{$game->id}}">
                                
                                    
                        </td>
                        <td>
                                <input type="file" class="form-control-file" id="main" name="picture">
                        </td>
                
                        <td>
                                <button type="submit" class="btn btn-primary">Update</button>
                        </td>
                </tr>
            </table> 
              </form>
            </table>
        </section>
          @foreach($game->images as $i)

          @if($loop->iteration != 1)
          <section class="col-md-12 margin">
                <!-- Custom tabs (Charts with tabs)-->

              <form action="{{url('/game/updateGalery')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <table>
                    <tr>
                   
                        <td>
                        <label for="galery">Edit galery Picture&nbsp;&nbsp;&nbsp;&nbsp;</label></br>
                        </td>
                        <td>
                        <img width="100" height="100" src="{{asset('/'.$i->src)}}"/>&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        <td>
                        <input type="file" class="form-control-file" id="galery" name="galery">
                        <input type="hidden" name="id" value="{{$i->id}}">
                        <input type="hidden" name="game_id" value="{{$game->id}}">
                        </td>
                        <td>
                        <button type="submit" class="btn btn-primary m-left">Update</button>
                        </td>
                </tr>
                </table>
                  </form>
            </section>
            @endif

            @endforeach

            @foreach($genres as $g)
            <section class="col-md-12 margin">
                    <!-- Custom tabs (Charts with tabs)-->
                  <form action="{{url('/game/UpdateCategory')}}" method="POST">
                    @csrf
                    <table>
                        <tr>
                            <td>
                                <label>Category:           &nbsp;&nbsp;&nbsp;&nbsp;</label>
                            </td>
                        <td>
                          <input type="hidden" name="category" value="{{$g->id}}">
                        <input type="hidden" name="action" value="{{in_array($g->id, $present)?'remove':'add'}}">&nbsp;&nbsp;&nbsp;&nbsp;
                        <label class="form-check-label m-left" for="exampleCheck1">{{$g->name}}</label>&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="hidden" name="game_id" value="{{$game->id}}">
                        </td>
                        <td>
                        <button type="submit" class="btn btn-primary m-left">{{in_array($g->id, $present)?'Remove':'Add'}}</button>
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
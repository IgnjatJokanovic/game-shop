@extends('layouts.home')

@section('content')

<div class="container minimalno">

      <div class="row">

        <div class="col-lg-3">

          <h1 class="my-4">Sort by</h1>
          
              
              <li class="list-group-item btn btn-outline-success" id="price">Genres</li>
                <ul class="list-group d-none" id="prices">
                    @foreach($genres as $genre)
                <li class="category list-group-item btn btn-outline-primary" value="{{$genre->id}}">{{$genre->name}}</li>
                    @endforeach
                </ul>
          </ul>
          
         

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

            <div class="games row mt-5 endless-pagination">
                <div class="row">
                        @foreach($games as $game)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="{{asset('/').'/game/show/'.$game->id}}"><img class="card-img-top" src="{{asset('/').$game->images->first()->src}}" alt="{{$game->images->first()->alt}}"></a>
                                <div class="card-body">
                                <h4 class="card-title">
                                    <a class="nounderline" href="{{asset('/').'/game/show/'.$game->id}}">{{$game->title}}</a>
                                </h4>
                                <h5>Price: &dollar;{{$game->price}}</h5>
                                <p class="card-text">
                                    @foreach($game->genres as $g)
                                        {{'#'.$g->name}}
                                    @endforeach
                                </p>
                                </div>
                                <div class="card-footer">
                                
                                <button class="dodaj btn btn-outline-success center-block" value="{{$game->id}}">
                            Add to shoping cart
                                </button>
                                    <p class="cart-postoji text-danger"></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                <div class="row">
                        {{$games->links()}}
                </div>
            </div>
           
                 
       

            
          <!-- /.row -->
          
        </div>
        
        <!-- /.col-lg-9 -->

       
    </div>
    
     
      <!-- /.row -->

</div>
    
    
 @endsection
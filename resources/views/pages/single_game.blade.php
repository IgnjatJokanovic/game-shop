@extends('layouts.home')

@section('title')
    | {{$game->title}}
@endsection
@section('content')





      <div class="container mt-5 minimalno">
          

      <div class="row">

        <div class="col-7">
            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                  @foreach($game->images as $g)
                  @if($loop->iteration == 2)
                  <img class="height-prostor" id="galeryMain" src="{{asset('/').$g->src}}" alt="{{$g->alt}}">
                  @endif
                @endforeach
              </div>
             
            </div>
            
          </div>
            </div><!--
          </div>
         

        </div>-->
          

              <div class="col-lg-4 col-md-6 mb-4 mt-4">
                  
                 
                 
                  
                  
                  
                  
              <div class="card h-100">
                  <img class="slika card-img-top" src="{{asset('/').$game->images->first()->src}}" alt="{{$game->images->first()->alt}}">
                <div class="card-body">
                  <h4 class="card-title">
                      
                      <h5 class="naslov text-primary">{{$game->title}}</h5>
                  </h4>
                    <h5 lass="cena">Genres: 
                          
                        
                       
        
                       @foreach($game->genres as $g)
                       
                       {{'#'.$g->name}}
                        
                        @endforeach
                        
                       
                      
                        
                       
                       
                        
                        
                        
                        
                        
                        
                        
                  
                   
                        
                    
                    </h5>

                    <h5 class="cena">Price: &dollar;{{$game->price}}</h5>
                    <h5>Rating: 
                      
                      @if($rating == 0)
                        Not yet rated
                      @else
                        @for($i = 0; $i < $rating; $i++)
                        <span>☆
                        @endfor
                      
                      @endif
                    </h5>
<!--                  <h5>Rate this game:</h5>
                  <form action="ocena" method="POST">
                     <div class="form-row">
                        
                        <div class="form-group col-md-7">
                          <select id="inputState" class="form-control">
                            <option selected value="Choose">Choose...</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="5">4</option>
                            <option value="5">5</option>
                          </select>
                        </div>
                        <div class="form-group col-md-2 ml-3">
                            <button type="submit" id="ocena" class="btn btn-outline-primary center-block">
           Submit
          </button>
                        </div>
                    </div>
                 </form>-->
                 <script>
                   const ID = "{{$game->id}}";
                  </script>
                 <div class="rating-system2">
                        <h3>Rate this game</h3>
                        <input class="input rate-game" type="radio" value="5" name='rate2' id="star5_2" />
                        <label class="labela" for="star5_2"></label>
                    
                        <input class="input rate-game" type="radio" value="4" name='rate2' id="star4_2" />
                        <label  class="labela" for="star4_2"></label>
                    
                        <input class="input rate-game" type="radio" value="3" name='rate2' id="star3_2" />
                        <label  class="labela" for="star3_2"></label>
                    
                        <input class="input rate-game" type="radio" value="2" name='rate2' id="star2_2" />
                        <label  class="labela" for="star2_2"></label>
                    
                        <input class="input rate-game" type="radio" value="1" name='rate2' id="star1_2" />
                        <label  class="labela" for="star1_2"></label>
                        
                        
                    
                </div>
                <div class="text"></div>
                </div>
                <div class="card-footer">
                    <button class="dodaj btn btn-outline-success center-block" value="{{$game->id}}">
            Add to shoping cart
          </button>
                    
                </div>
              </div>
            </div>
          

              
              
         
        <!-- /.col-lg-3 -->

        </div>
          <div class="row mt-5">
              <div class="col">
                  <ol class="list-inline">
                      @foreach($game->images as $g)
                      @if($loop->iteration != 1)
                      <li class="list-inline-item">
                          <img class="img-thumbnail width-height galery" src="{{asset('/').$g->src}}" alt="{{$g->alt}}">
                      </li>
                      @endif
                      @endforeach
                  </ol>
              </div>
              
          </div>
      </div>

@endsection
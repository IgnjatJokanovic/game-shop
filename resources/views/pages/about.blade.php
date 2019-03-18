@extends('layouts.home')

@section('title')
    | About us
@endsection
@section('content')
   
        <div class="wrapper minimalno">
            <div class="row mt-3">
                <div class="col align-self-center mt-3">
                 <img class="about mt-3" src="{{asset('/') }}{{$page->images->first()->src}}" alt="{{$page->images->first()->src}}"/>
                 </div>
                </div>
            
            
             <div class="row mt-3">
                <div class="col align-self-center mt-3">
                     <h4 class="text-center">
                       {{$page->content}}
                     </h4>
                 </div>
                </div>
           
            
        </div>
@endsection


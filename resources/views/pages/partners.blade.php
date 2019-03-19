@extends('layouts.home')

@section('title')
    | Our partners
@endsection
@section('content')
    
    
    <div class="wrapper minimalno">
            <div class="row mt-3">
                <div class="col align-self-center mt-3">
                <h1 class="text-center">{{$page->content}}</h1>
                 </div>
                </div>
            
            <div class="row mt-3 align-items-start">
            
             
              @foreach($page->images as $i)
                <div class="col  mt-3">
                <img class="companies" src="{{asset("/$i->src")}}" alt="{{$i->alt}}"/>
                 </div>
                @endforeach
              
            
            
            

 
            </div> 
            
        </div>
    
        

@endsection



@extends('layouts.home')

@section('title')
    | Contact
@endsection

@section('content')


<div class="col-lg-8 minimalno mt-5">
  <h1>Contact us</h1>
@include('components.feedback')
<form action="{{url('/sendMail')}}" method="POST">
                @csrf
                <div class="form-group">
                  
                  <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
              </form>

    </div>


   
@endsection
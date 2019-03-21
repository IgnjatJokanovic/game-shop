<div class="row">
        <div class="col-12">
            @isset($items)
            @foreach($items->cart as $item)
                <div class="row">
                    <div class="col-md-1 mt-3">
                        <img class="img-size mr-3" alt="{{$item->images->first()->alt}}" src="{{asset('/'.$item->images[0]->src)}}"/>
                    </div>
                    <div class="col-md-4 mt-3">
                        <p class="mr-3">{{$item->title}}</p>
                    </div>
                    <div class="col-md-2 mt-3">
                        <p class="mr-3">&dollar;{{$item->price}}</p>
                    </div>
                    
                <button class="brisanjeKorpa btn btn-primary ml-auto mt-3" value="{{$item->id}}">
                        Remove
                    </button>
                    
                    </div>
            
            @endforeach
            
            @endisset
        </div>
        
    </div>
    
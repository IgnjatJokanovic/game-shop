
<ul>
@foreach($games as $g)

<li><a href="{{url("/game/$g->id")}}">{{$g->title}}</a></li>
@endforeach
</ul>

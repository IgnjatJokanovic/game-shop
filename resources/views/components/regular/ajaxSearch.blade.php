
<ul>
@foreach($games as $g)

<li><a href="{{url("/game/show/$g->id")}}">{{$g->title}}</a></li>
@endforeach
</ul>

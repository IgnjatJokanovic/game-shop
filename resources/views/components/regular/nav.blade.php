<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    
    
    <a class="navbar-brand" href="{{ asset('/') }}"><img class="rounded float-left img-size" src="{{ asset('/') }}images/8ball.png"/></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ (Request::url("/"))? 'active' : '' }}">
                <a class="nav-link" href="{{asset("/")}}">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{ (Request::url() == "/about")? 'active' : '' }}">
            <a class="nav-link" href="{{asset("/")}}about">About<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{ (Request::url() == "/partners")? 'active' : '' }}">
                <a class="nav-link" href="{{asset("/")}}partners">Our Partners<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{ (Request::url() == "author")? 'active' : '' }}">
                <a class="nav-link" href="{{asset("/")}}author">Author<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{ (Request::url() == "author")? 'active' : '' }}">
              <a class="nav-link" href="{{asset("/")}}contact">Contact<span class="sr-only">(current)</span></a>
            </li>
              

        @if(session()->has('user') && session()->get('user')[0]->naziv_uloga == 'admin')
            <li class="nav-item">
                <a class="nav-link" href="{{ asset('/admin-panel') }}">Amin Pannel</a>
              </li>
        @endif
    </ul>
     </div>
<!--    <form class="form-inline my-2 ml-3" method="GET" action="bla.php">
        <div class="dropdown">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <div id="myDropdown" class="dropdown-content">
              <a href="#about">About</a>
              <a href="#base">Base</a>
              <a href="#blog">Blog</a>
              <a href="#contact">Contact</a>
              <a href="#custom">Custom</a>
              <a href="#support">Support</a>
              <a href="#tools">Tools</a>
            </div>
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </div>
    </form>-->

    <div class="dropdown">
         <input class="form-control mr-sm-2" id="searchBox" type="text" placeholder="Search">
<!--  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   
  </button>-->
  <div id="search" class="dropdown-content">
    
       
            
       
    
  </div>

</div>
    @if(session()->has('user'))
    
    <a class="btn btn-outline-success my-2 my-sm-0 ml-3 expand-lg-ml-0" href="{{asset('/logout')}}">
    Logout
    </a>
    @else
    
    <button type="button" class="btn btn-outline-success my-2 my-sm-0 ml-3 expand-lg-ml-0" data-toggle="modal" data-target="#login">
    Login
    </button>
    
     <button type="button" class="btn btn-outline-success my-2 my-sm-0 ml-3 expand-lg-ml-0" data-toggle="modal" data-target="#register">
    Register
    </button>
    @endif
    
    
    
    
    <img id="shopcartImg" class="pointer bg-dark ml-3 rounded float-left img-size" src="{{ asset('/') }}images/shopcart.png" alt="shoping cart" data-toggle="modal" data-target="#shopcart"/>
   <h3 id="cartSum" class="text-white ml-3"></h3>
    </nav>


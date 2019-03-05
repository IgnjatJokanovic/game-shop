<!DOCTYPE html>
<html lang="en">

    @include('components.regular.header')

  <body>

    <!-- Navigation -->
    @include('components.regular.nav')
    
    @include('components.regular.modals.login')
    @include('components.regular.modals.register')
    @include('components.regular.modals.login')
    
    
    

    @yield('content')
    @include('components.regular.footer')

  </body>

</html>




    <footer class="py-5 bg-dark">
        
        @if(session()->has('user') && session()->get('user')[0]->naziv_uloga == 'admin')
        <a href="{{asset('/download')}}">Documentation</a>>
        @endif
    
      <div class="container">
        <p class="m-0 text-center text-white">&copy; Ignjat Jokanovic 311/16</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('/')}}js/jquery.min.js"></script>
    <script src="{{asset('/')}}js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
         const baseAddress = "{{asset('/')}}";
         const token = '{{csrf_token()}}';
     </script>
     <script src="{{asset('/')}}js/kod.js"></script>
     

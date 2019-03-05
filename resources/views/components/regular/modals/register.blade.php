<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content w-75 p-3">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <form action="{{asset('/register')}}" method="POST">
                    {{csrf_field()}}
                <div class="form-group">
                    <label>Email address</label>
                    <input class="form-control" id="email" name="RegisterEmail" type="text" placeholder="Enter email">
                    <p class="text-danger" name="error1"></p>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" id="regUname" name="RegisterUsername" type="text" placeholder="Enter username">
                    <p class="text-danger" name="error1"></p>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" id="regPass" name="RegisterPass" type="password" placeholder="Enter password">
                    <p class="text-danger" name="error1"></p>
                    <div id="errAjax1">
                        @isset($errors)
                            @if($errors->any())
                            @foreach($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                            @endforeach
                            @endif
                        @endisset
                        
                        @empty(!session('error'))
                            <p class="text-danger">{{session('error')}}</p>
                        @endempty
                    
                            
                    
                    </div>
                </div>
                    <button id="btnRegister" type="submit" class="btn btn-outline-success">
                        Register
                    </button>
                </form>
                
            </div>
            </div>
        </div>
</div>
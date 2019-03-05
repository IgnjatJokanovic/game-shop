<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content w-75 p-3">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{asset('/').'login'}}" method="POST">
                        {{csrf_field()}}
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" id="uname" name="username" type="text" placeholder="Enter username">
                        <p class="text-danger" name="error"></p>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" id="pass" name="password" type="password" placeholder="Enter password">
                        <p class="text-danger" name="error"></p>
                    </div>
                        <div id="errAjax">
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
                    <button type="submit" class="btn btn-outline-success" id="loginSub">
                        Login
                    </button>
                    </form>
                </div>
            </div>
        </div>
</div>
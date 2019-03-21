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
                    <input class="form-control" id="reEmail" name="RegisterEmail" type="text" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" id="reUname" name="RegisterUsername" type="text" placeholder="Enter username">
                
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" id="rePass" name="RegisterPass" type="password" placeholder="Enter password">
                    <div id="errAjax1">
                            
                    
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
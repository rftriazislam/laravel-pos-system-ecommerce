
	        
            <div class="modal fade" id="login-modal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Log In</h4>
                        </div>

                        <div class="modal-body">
                            <b>If You Are Member, Login Here</b>
                            <form class="form-default" role="form" action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email Address:</label>
                                    <input type="email" class="form-control input-lg" id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Password:</label>
                                    <input type="password" class="form-control input-lg" id="password" name="password">
                                </div>
                                <div class="form-group">
                                    <b>New Member?</b> <a href="{{ route('user.registration') }}" style="color: green;">Register Here</a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="{{ route('password.request') }}" style="color: red;">Forgot Password?</a>
                                </div>
                                <button type="submit" class="btn btn-default">Log In</button>
                            </form>
                        </div>
                        {{-- <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div> --}}
                    </div>
                </div>
            </div>
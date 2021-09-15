
            <div class="login-wrapper">
                <form id="form-login" role="form" action="{{ route('login') }}" method="POST">
                    @csrf
                    <h4>Login</h4>
                    <p>If you're a member, login here.</p>
                    <div class="form-group">
                        <label for="inputusername">Email</label>
                        <input type="text" class="form-control input-lg" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="inputpassword">Password</label>
                        <input type="password" class="form-control input-lg" id="password" name="password" placeholder="Password">
                    </div>
                    <ul class="list-inline">
                        <li><a href="{{ route('user.registration') }}">Create new account</a></li>
                        <li><a href="#">Request new password</a></li>
                    </ul>
                    <button type="submit" class="btn btn-white">Log in</button>
                </form>
            </div>


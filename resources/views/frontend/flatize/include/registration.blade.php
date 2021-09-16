@extends('frontend.flatize.master.master_page')

@section('custom_css')
	<style type="text/css">
		.featured-boxes { margin-top: 25px; }
		/*.panel { width: 800px; }*/
		.panel-heading h2, h4 { margin: 0px 0px 0px 0px !important; font-weight: bold; }
		.checkbox { margin-top: 5px; }
		.error-msg { color: red; }
	</style>
@endsection

@section('page_content')
	<div class="container">			
		<div class="featured-boxes">
			<div class="row">
				<div class="col-md-7">
					<div class="panel panel-default">
						<div class="panel-heading text-center"><h4>Create An New Account</h4></div>
						<div class="panel-body">
							<form role="form" action="{{ route('register') }}" method="POST" onsubmit="return validate_form();">
								@csrf
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="full-name"><b>Full Name</b></b></label>
											<input type="text" class="form-control" id="name" name="name">
											<span id="name-error-msg" class="error-msg"></span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="email"><b>Email</b></label>
											<input type="text" class="form-control" id="email_add" name="email">
											<span id="email-error-msg" class="error-msg"></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="password"><b>Password</b></label>
											<input type="password" class="form-control" id="password" name="password">
											<span id="password-error-msg" class="error-msg"></span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="confirm-password"><b>Confirm Password</b></label>
											<input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
											<span id="password-confirmation-error-msg" class="error-msg"></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="checkbox">
											<label><input type="checkbox" name="terms_and_condition" required><b>By signing up you agree to our <a href="javascript:void(0)" style="color: green;">Terms and Conditions.</a></b></label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 text-right">
										<button type="submit" class="btn btn-default">Submit</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

				<div class="col-md-5">
					<div class="panel panel-default">
						<div class="panel-heading text-center"><h4>Already Have An Account? Login Here</h4></div>
						<div class="panel-body">
                            <form role="form" action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="email"><b>Email Address</b></label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="pwd"><b>Password</b></label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <div class="form-group">
                                    <a href="{{ route('password.request') }}" style="color: red;"><b>Forgot Password?</b></a>
                                </div>
                                <button type="submit" class="btn btn-default">Log In</button>
                            </form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('custom_js')
	<script type="text/javascript">
		function validate_form(argument) {
			var name = $('#name').val();
			if (name == "" || name == null) {
				$('#name-error-msg').html('Please Enter Your Full Name');
				$('#name').css('border-color','#ff0000');
				return false;
			} else {
				$('#name-error-msg').html('');
				$('#name').css('border-color','#dddddd');
			}

			var email = $("#email_add").val();
			const rule = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			if (rule.test(email) == false || email == "" || email == null) {
				$('#email-error-msg').html('Please Enter Valid Email');
				$('#email_add').css('border-color','#ff0000');
				return false;
			} else {
				$('#email-error-msg').html('');
				$('#email_add').css('border-color','#dddddd');
			}

			var password_confirmation = $("#password").val();
			var password_confirmation = $("#password_confirmation").val();
			if (password_confirmation == "" || password_confirmation == null) {
				$('#password-confirmation-error-msg').html('Please Re-Enter Your Password For Confirmation');
				$('#password_confirmation').css('border-color','#ff0000');
				return false;
			} else {
				if (password != password_confirmation) {
					$('#password-confirmation-error-msg').html('Password Not Matched, Try Again');
					$('#password_confirmation').css('border-color','#ff0000');
					return false;
				} else {
					$('#password-confirmation-error-msg').html('');
					$('#password_confirmation').css('border-color','#dddddd');
				}
			}

			return true
		}
	</script>
@endsection
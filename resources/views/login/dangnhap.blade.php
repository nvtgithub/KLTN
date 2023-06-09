@extends('.login.header')
@section('content')
<div class="container-login100" style="background-image: url('public/admin_assets/images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form class="login100-form validate-form" action="{{url('/login')}}" method="post">
				{{csrf_field()}}
				<span class="login100-form-title p-b-37">
					Đăng nhập
				</span>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username">
					<input class="input100" type="text" name="username" placeholder="username">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
					<input class="input100" type="password" name="pass" placeholder="password">
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<button type="submit" class="login100-form-btn">
						Đăng nhập
					</button>
				</div>

				<div class="text-center">
					<a href="dangky" class="txt2 hov1" style="text-decoration: none;color: #101010">
						Đăng ký tài khoản
					</a>
				</div>
			</form>


		</div>
	</div>
@endsection

@extends('layouts.master')

@section('content')
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<center>
					Twitter Application
				</center>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-4"></div>
						<div class="col-md-4">
							<div class="panel panel-default">
								<div class="panel-heading">
									LOGIN
								</div>
								<div class="panel-body">
									<div class="col-md-12">
										<form method="post" action="{{ route('login') }}" class="form-horizontal">
											{!! csrf_field() !!}
											<div class="form-group">
												<input type="email" name="email" placeholder="Email" class="form-control">
											</div>
											<div class="form-group">
												<input type="password" name="password" placeholder="Password" class="form-control">
											</div>
											<div class="form-group">
												<center>
													<button class="btn btn-primary" type="submit">Login</button>
												</center>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4"></div>
					</div>
				</div>
				<hr>

				<div class="row">
					<div class="col-md-12">
						<div class="col-md-4"></div>
						<div class="col-md-4">
							<div class="panel panel-default">
								<div class="panel-heading">
									REGISTER
								</div>
								<div class="panel-body">
									<div class="col-md-12">
										<form method="post" action="{{ route('register') }}" class="form-horizontal">
											{!! csrf_field() !!}
											<div class="form-group">
												<input type="email" name="email" placeholder="Email" class="form-control">
											</div>
											<div class="form-group">
												<input type="text" name="name" placeholder="Name" class="form-control">
											</div>
											<div class="form-group">
												<input type="password" name="password" placeholder="Password" class="form-control">
											</div>
											<div class="form-group">
												<center>
													<button class="btn btn-primary" type="submit">Register</button>
												</center>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
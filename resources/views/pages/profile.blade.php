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
					<div class="col-md-2">
						<center>
							<img src="{{ filter_var($user->photo, FILTER_VALIDATE_URL) ? 'http://www.gravatar.com/avatar/'.md5(strtolower(trim($user->email))).'?s=85&d=identicon' : asset('storage/'.$user->photo) }}" width="100" height="100">
							<br>
							<br>
							<form class="form-horizontal" method="post" action="{{ url('profile/picture/'.encrypt($user->id)) }}" enctype="multipart/form-data">
								{!! csrf_field() !!}
								<div class="form-group">
									<input type="file" name="foto" class="form-control">
								</div>
								<div class="form-group">
									<button class="btn btn-primary">Upload</button>
								</div>
							</form>
						</center>
					</div>
					<div class="col-md-10">
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="col-md-12">
									<form class="form-horizontal" method="post" action="{{ url('profile/'.encrypt($user->id)) }}">
										{!! csrf_field() !!}
										<div class="form-group">
											<input type="text" name="name" placeholder="name" value="{{ $user->name }}" class="form-control">
										</div>
										<div class="form-group">
											<input type="email" name="email" placeholder="email" value="{{ $user->email }}" class="form-control">
										</div>
										<div class="form-group">
											<input type="password" name="password" placeholder="password" class="form-control">
										</div>
										<div class="form-group">
											<button class="btn btn-primary">Update</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
@endsection
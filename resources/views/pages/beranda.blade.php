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
						<a href="{{ url('logout') }}">
							<button class="btn btn-danger" type="submit">Logout</button>
						</a>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="col-md-12">
									<form class="form-horizontal" method="post" action="{{ route('beranda.store') }}">
										{!! csrf_field() !!}
										<div class="form-group">
											<input type="text" name="status" placeholder="Update Status..." class="form-control">
										</div>
										<div class="form-group">
											<button class="btn btn-primary" type="submit">Update</button>
										</div>
									</form>	
								</div>
							</div>
						</div>
					</div>
				</div>

				@foreach($status as $stat)

					@if($stat->user_id != Auth::id())

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-body">
										<div class="row">
											<div class="col-md-1">
												<a href="{{ url('profile/'.encrypt($stat->user->id)) }}">
													<img src="{{ filter_var($stat->user->photo, FILTER_VALIDATE_URL) ? 'http://www.gravatar.com/avatar/'.md5(strtolower(trim($stat->user->email))).'?s=85&d=identicon' : asset('storage/'.$stat->user->photo) }}" width="100" height="100">
												</a>
											</div>
											<div class="col-md-10">
												<h4>{{ $stat->user->name }}</h4>
												{{ $stat->status }}
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					@else

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default" style="background: cyan;">
									<div class="panel-body">
										<div class="row">
											<div class="col-md-10" style="text-align: right;">
												<h4>{{ $stat->user->name }}</h4>
												{{ $stat->status }}
											</div>
											<div class="col-md-1">
												<a href="{{ url('profile/'.encrypt($stat->user->id)) }}">
													<img src="{{ filter_var($stat->user->photo, FILTER_VALIDATE_URL) ? 'http://www.gravatar.com/avatar/'.md5(strtolower(trim($stat->user->email))).'?s=85&d=identicon' : asset('storage/'.$stat->user->photo) }}" width="100" height="100">
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					@endif

				@endforeach

			</div>
		</div>
	</div>
@endsection
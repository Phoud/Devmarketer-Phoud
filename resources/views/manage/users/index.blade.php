@extends('layouts.manage')
@section('content')

<div class="flex-container">
	<div class="columns m-t-10">
		<div class="column">
			<h1 class="title">Manage Users</h1>
		</div>
		<div class="column">
			<a href="{{ route('users.create') }}" class="button is-primary is-pulled-right"><i class="fa fa-user-add m-r-10"></i>Create New User</a>
		</div>

	</div>
	<div class="card">
		<div class="card-content">
			<table class="table is-fullwidth">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Date Created</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr>
				<th>{{ $user->id }}</th>
				<th>{{ $user->name }}</th>
				<th>{{ $user->email }}</th>
				<th>{{ $user->created_at->toFormattedDateString() }}</th>
				<th><a href="{{ route('users.edit', $user->id) }}" class="button is-outlined">Edit</a></th>
			</tr>
			@endforeach
		</tbody>
	</table>
		</div>
	</div> {{-- end of the card --}}

	{{ $users->links('vendor.pagination.default') }}
</div>

@endsection
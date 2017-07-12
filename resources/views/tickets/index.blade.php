@extends('master')
@section('title','Show all tickets')
@section('content')
	<div class="container">
		<div class="col-lg-12">
			<h2>List of Tickets</h2>
			<hr>
			@if($tickets->isEmpty())
			<p class="text-center">There is no ticket.</p>
			@else
			<table class="table table-striped">
				<thead>
				<tr>
					<th>Title</th>
					<th>Slug</th>
					<th>Created at</th>
					<th>Updated at</th>
					<th>Status</th>
					<th>Actions</th>
				</tr>
				</thead>
				<tbody>
				@foreach($tickets as $ticket)
				<tr>
					<!-- Action function to generate a URL for the TicketsController's show action -->
					<td><a href="{!! action('TicketsController@show',$ticket->slug) !!}">{!! $ticket->title !!}</a></td>
					<td>{!!$ticket->slug !!}</td>
					<td>{!!$ticket->created_at !!}</td>
					<td>{!!$ticket->updated_at !!}</td>
					<td>{!! $ticket->status ? 'Pending' : 'Answered' !!}</td>
					<td></td>
				</tr>
				@endforeach
				</tbody>
			</table>
			@endif
		</div>
	</div>
@endsection
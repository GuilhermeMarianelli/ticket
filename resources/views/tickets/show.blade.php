@extends('master')
@section('title','View ticket')
@section('content')
<div class="container">
	<div class="col-lg-12">
		<h2>Ticket {!! $ticket->slug !!}</h2>
		<hr>
		<h3>{!! $ticket->title !!}</h3>
		<h4>Status {!! $ticket->status ? 'Pending' : 'Answered' !!}</h4>
		<p>{!! $ticket->content !!}</p>
		<br>
		<a href="{!! action('TicketsController@edit', $ticket->slug) !!}" class="btn btn-primary pull-left">Edit</a>
		<form method="post" action="{!! action('TicketsController@destroy',$ticket->slug) !!}" class="pull-left">
			{!! csrf_field() !!}
			<button class="btn btn-danger" type="submit" onclick="return confirm('Do you really delete this object?')">Delete</button>
		</form>
		
	</div>
</div>
@endsection
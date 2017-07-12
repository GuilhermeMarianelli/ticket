@extends('master')
@section('title','View ticket')
@section('content')
<div class="container">
	<div class="row">
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
	<div class="row">
		<div class="col-lg-12">
			<form class="form-horizontal" method="post" action="{!! asset('/comments') !!}">
			@foreach($errors->all() as $error)
				<p class="alert alert-danger">{!! $error !!}</p>
			@endforeach
			@if(session('status'))
				<div class="alert alert-success">
					{!! session('status') !!}
			@endif
			{!! csrf_field() !!}
				<fieldset>
					<legend>Comments</legend>
					<input type="hidden" name="post_id" value="{!! $ticket->id !!}">
					<div class="form-group">
						<div class="col-lg-12">
							<textarea class="form-control" rows="3" id="content" name="content"></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-2">
							<button class="btn btn-danger" type="reset">Cancel</button>
							<button class="btn btn-primary" type="submit">Comment</button>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
	@foreach($comments as $comment)
	<div class="row">
		<div class="col-lg-12">
			<p>{!! $comment->content !!}</p>
		</div>
	</div>
	@endforeach
</div>
@endsection
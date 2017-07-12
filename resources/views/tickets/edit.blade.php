@extends('master')
@section('title','Edit Ticket Page')
@section('content')
<div class="container">
	<div class="col-lg-12">
		<h4>Ticket {!! $ticket->slug !!}</h4>
		<form method="post" class="form-horizontal">
		@foreach($errors->all() as $error)
			<p class="alert alert-danger">{!! $error !!}</p>
		@endforeach
		@if(session('status'))
			<div class="alert alert-success">
				{!! session('status') !!}
			</div>
		@endif
			{!! csrf_field() !!}
			<fieldset>
				<legend>Edit Ticket</legend>
				<div class="form-group">
					<label for="title" class="col-lg-2">Title</label>
					<div class="col-lg-10">
						<input type="text" name="title" id="title" class="form-control" placeholder="title" value="{!! $ticket->title !!}">
					</div>
				</div>
				<div class="form-group">
					<label for="content" class="col-lg-2">Content</label>
					<div class="col-lg-10">
						<textarea name="content" id="content" class="form-control" placeholder="content">
							{!! $ticket->content !!}
						</textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="status" class="col-lg-2">Status</label>
					<div class="col-lg-10">
						<input type="checkbox" name="status" id="status" {!! $ticket->status ? "" : "checked" !!}> Close this ticket?
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-10 col-lg-offset-2">
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>
@endsection
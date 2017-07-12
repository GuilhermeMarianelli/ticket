@extends('master')
@section('title','Contact Page')
@section('content')
	<div class="container">
		
		<form method="post" class="form-horizontal">

		@foreach($errors->all() as $error)
			<p class="alert alert-danger">{{ $error }}</p>
		@endforeach	

		@if(session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
		@endif	
			<fieldset>
				<legend>Submit a new ticket</legend>
				{{ csrf_field() }}
				<div class="form-group">
					<label for="title"  class="col-lg-2">Title</label>
					<div class="col-lg-10">
						<input type="text" name="title" id="title" class="form-control" placeholder="title">
					</div>
				</div>
				<div class="form-group">
					<label for="content" class="col-lg-2">Content</label>
					<div class="col-lg-10">
						<textarea name="content" id="content" class="form-control" rows="3">
							
						</textarea>
						<span class="help-block">Feel free to ask us any question!</span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-10 col-lg-offset-2">
						<button type="reset" class="btn btn-danger">Cancel</button>
						<button type="Submit" class="btn btn-primary">Create</button>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
@endsection
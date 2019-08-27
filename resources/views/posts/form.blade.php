@extends('layouts.app')

@section('content')

	<form action="posts" method="post">
		
		<input type="textera" name="body">
		<input type="submit" name="submit">

	</form>
@endsection
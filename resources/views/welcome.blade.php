<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Screening Form</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left mb-2">
<h2>Add Screening</h2>
</div>
</div>
</div>
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<form id="Add" method="POST" action="{{route('screening.add')}}">
	@csrf
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>First name:</strong>
<input type="text" id="first_name" name="first_name" class="form-control" placeholder="First Name" value="{{old('first_name')}}">
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Date Of Birth :</strong>
<input type="date" id="dob" name="dob" class="form-control" placeholder="Last Name" value="{{old('dob')}}">
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Migraine Status:</strong>
<select id="status" name="status">
	<option value="" selected>Select Status</option>
	@foreach($statuses as $status)
	<option value="{{$status}}" {{$status == old('status') ? 'selected' : '' }}>{{$status}}</option>
	@endforeach 
</select>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12" id="feq_sec">
<div class="form-group">
<strong>Frequencies:</strong>
<select id="frequency" name="frequency">
	@foreach($frequencies as $frequency)
	<option value="{{$frequency}}" {{$frequency == old('frequency') ? 'selected' : '' }}>{{$frequency}}</option>
	@endforeach 
</select>
</div>
</div>
<button type="submit" class="btn btn-primary ml-3">Submit</button>
</div>
</form>
</body>
</html>
<script>
@if(old('frequency'))
$('#feq_sec').show()
$('#frequency').prop('disabled', false)
@else
$('#feq_sec').hide()
$('#frequency').prop('disabled', true)
@endif
$('#status').change(function() {
	let status = '{{$statuses[2]}}'
	if (status == $('#status').val()) {
		$('#feq_sec').show()
		$('#frequency').prop('disabled', false)
	} else {
		$('#feq_sec').hide()
		$('#frequency').prop('disabled', true)
	}
});
</script>
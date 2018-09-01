<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Phone Books Title</title>
	<link rel="stylesheet" href="{{ asset('public/css/app.css')}}">
</head>
<body>
	<div id="app">
		<Myheader></Myheader>
		<div class="container">
			 <router-view></router-view>
			 
				{{-- 	<table>
						<tr>
							<th>Name</th>
							<th>Number</th>
							<th>Email</th>
						</tr>
						 @foreach ($phonebook as $pb)
							<tr>
								<td>{{$pb->name}}</td>
								<td>{{$pb->phone}}</td>
								<td>{{$pb->email}}</td>
							</tr>
						 @endforeach
					</table> --}}
				 			
		</div>
		<Myfooter></Myfooter>	
	</div>
	<script src="{{ asset('public/js/app.js')}}"></script>
</body>
</html>
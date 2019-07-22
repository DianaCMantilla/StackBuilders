<html>
	<head>
		<title>PICO Y PLACA PREDICTOR</title>

	</head>

	<body>
		<h2>PICO Y PLACA PREDICTOR</h2>
		<form action="/validar" method="GET">
		{{ csrf_field() }}
			<label>Plate number:</label>
			<input type="text" placeholder="ABC-123" name="plate" ><br><br>
			<label>Date:</label>
			<label>Day:</label><select name="day">
			@for($i=1;$i<=31;$i++)
				<option value="{{$i}}">{{$i}}</option>
			@endfor
			</select>
			<label>Month:</label><select name="month">
			@for($i=1;$i<=12;$i++)
				<option value="{{$i}}">{{$i}}</option>
			@endfor
			</select>
			<label>Year:</label><select name="year">
			@for($i=2019;$i<=2024;$i++)
				<option value="{{$i}}">{{$i}}</option>
			@endfor
			</select><br><br>
			<label>Time:</label>
			<label>Hour:</label><select  name="hour">
			@for($i=0;$i<=23;$i++)
				<option value="{{$i}}">{{$i}}</option>
			@endfor
			</select>
			<label>Minute:</label><select name="minute">
			@for($i=0;$i<=60;$i++)
				<option value="{{$i}}">{{$i}}</option>
			@endfor
			</select><br><br>
			<button type="submit">Predict</button>
		</form>
	</body>


</html>
<!DOCTYPE html>
<html>
<head>
	<title>Upload file</title>
</head>
<body>
	<form action="ImportClients" method="post" enctype="multipart/form-data">
		@csrf
		<label>Upload file</label>
		<input type="file" name="file">
		<input type="submit" name="" value="Upload">
	</form>
</body>
</html>
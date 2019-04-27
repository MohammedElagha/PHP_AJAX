<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
	<div class="container">
		<div class="row">
			<div id="msg-div" class="col-12">
				
			</div>
			
			<div class="col-12">
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="student_name" class="form-control">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="student_email" class="form-control">
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="text" name="student_phone" class="form-control">
					</div>
					<button class="btn btn-primary" type="button" id="submit-btn">Add</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>


<script type="text/javascript">
	$(document).ready(function () {
		$('#submit-btn').click(function(e){
			e.preventDefault();

			if (confirm("Are you sure ?")) {
				var path = "action.php";

				var data = {
					'student_name': $('input[name="student_name"]').val(),
					'student_phone': $('input[name="student_phone"]').val(),
					'student_email': $('input[name="student_email"]').val()
				}

				$.ajax({
					url: path,
					data: data,
					method: 'POST',
					dataType: 'JSON',
					success:function(data){
						// console.log(data);
						// console.log(data['status']);
						// var obj = JSON.parse(data);
						alert(data['message']);
						$('input[name="student_name"]').val('');
						$('input[name="student_phone"]').val('');
						$('input[name="student_email"]').val('');

						if (data['status']) {
							$('#msg-div').append('<div class="col-12"><div class="alert alert-success">SUCCESS</div></div>');
						} else {
							$('#msg-div').append('<div class="col-12"><div class="alert alert-danger">FAILED</div></div>');
						}
					},
					error:function(data, textStatus){
						// var obj = JSON.parse(data);
						// alert(obj.message);
						// console.log(data);
						// console.log(textStatus);
						alert("Something is Wrong");
						$('#msg-div').append('<div class="col-12"><div class="alert alert-danger">FAILED</div></div>');
					}
				});
			}
		});
	});
</script>
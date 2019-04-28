	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script>
	$(document).on("click", "#button_update", function(){
		$(".modal-body #id").val($(this).data('id'));
		//for update employee modal
		$(".modal-body #username").val($(this).data('username'));
		$(".modal-body #password").val($(this).data('password'));
		$(".modal-body #position").val($(this).data('position'));
		$(".modal-body #fullname").val($(this).data('fullname'));
		$(".modal-body #age").val($(this).data('age'));
		$(".modal-body #birthdate").val($(this).data('birthdate'));
		$(".modal-body #address").val($(this).data('address'));
		//for update book modal
		$(".modal-body #isbn").val($(this).data('isbn'));
		$(".modal-body #name").val($(this).data('name'));
		$(".modal-body #author").val($(this).data('author'));
		$(".modal-body #edition").val($(this).data('edition'));
		$(".modal-body #stock").val($(this).data('stock'));
	})
	</script>
</body>
</html>
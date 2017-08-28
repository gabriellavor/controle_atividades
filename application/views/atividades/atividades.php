<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Atividades</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

<div class="container-fluid">
	<div class="well">
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<?php echo form_open("atividades/index",array('id' => 'busca'));?>
						<?php
							echo form_label('Status','codigo_status');
							echo form_dropdown(array('class'=>'form-control','id' => 'codigo_status','name' => 'codigo_status'),$status);
						?>
					</div>  
					<?php echo form_submit(null,'Buscar',array('class' => 'btn btn-success'));?>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
	<div id="listagem"></div>
</div>

</body>
</html>
<script language="javascript">
     $(document).ready(function () {
        $.ajax({
			url: '<?= base_url(); ?>' + 'atividades/listagem',
			type: 'POST',
			data: $("#busca").serialize(),
			success: function(msg){
				$("#listagem").html(msg);
			}
		});
    });
</script>
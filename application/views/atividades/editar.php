<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Editar Atividade</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <?php if($sucesso != FALSE):?>
                <div class="alert alert-success" role="alert">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    <?php echo $sucesso;?>
                </div>
            <?php endif;?>   
            <?php if($erros !== FALSE):?>
                <?php echo $erros;?>
            <?php endif;?>
            <?php if($disabled):?>
                <div class="alert alert-warning" role="alert">
                    <span class="glyphicon glyphicon-alert" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    A atividade não pode ser mais alterada
                </div>
            <?php endif;?>
            <?php echo form_open("atividades/editar/$id");?>
                <div class="form-group">
                    <?php 
                    echo form_label('Nome','nome');
                    echo form_input('nome',set_value('nome'),array('class'=>"form-control",'id'=> 'nome','placeholder'=>'Nome'));
                    ?>
                </div>
                <div class="form-group">
                    <?php 
                    echo form_label('Descrição','descricao');
                    echo form_textarea(array('name'=> 'descricao','cols'=> '50','rows'=> '4','maxlength' => '600','class'=>'form-control','id'=> 'descricao','placeholder'=>'Descrição'),$_POST['descricao']);
                    ?>
                </div>
                <div class="form-group">
                    <?php 
                    echo form_label('Data Inicio','data_inicio');
                    echo form_input('data_inicio',set_value('data_inicio'),array('class'=>'form-control','id'=> 'data_inicio','placeholder'=>'Data Inicio'));
                    ?>
                </div>
                <div class="form-group">
                    <?php 
                    echo form_label('Data Fim','data_fim');
                    echo form_input('data_fim',set_value('data_fim'),array('class'=>'form-control','id'=> 'data_fim','placeholder'=>'Data Fim'));
                    ?>
                </div>
                <div class="form-group">
                    <?php
                        echo form_label('Status','codigo_status');
                        echo form_dropdown('codigo_status',$status,$_POST['codigo_status'],array('class'=>'form-control','id' => 'codigo_status'));
                    ?>
                </div>
                <div class="form-group">
                    <?php
                        echo form_label('Situação','situacao');
                        echo form_dropdown(array('class'=>'form-control','id' => 'situacao','name' => 'situacao'),array('1' => 'Ativo','0' => 'Inativo'));
                    ?>
                </div>
                <?php if(!$disabled):?>
                <?php echo form_submit(null,'Alterar',array('class' => 'btn btn-success'));?>
                <?php endif?>
                <a href="<?php echo base_url("atividades/")?>" class="btn btn-danger">Voltar</a>
                <?php echo form_close();?>
            </div>           
        </div>
    </div>
</div>
</body>
</html>
<script language="javascript">
     $(document).ready(function () {
        $('#data_inicio').mask('99/99/9999');
        $('#data_fim').mask('99/99/9999');
        disabled = '<?php echo $disabled?>';
        if(disabled){
            $('#nome').attr('disabled','disabled');
            $('#descricao').attr('disabled','disabled');
            $('#data_inicio').attr('disabled','disabled');
            $('#data_fim').attr('disabled','disabled');
            $('#situacao').attr('disabled','disabled');
            $('#codigo_status').attr('disabled','disabled');
        }
    });
</script>
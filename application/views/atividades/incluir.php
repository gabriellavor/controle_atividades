<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Incluir Atividade</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <form>
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" placeholder="Nome">
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea id="descricao" class="form-control" rows="4" cols="50" maxlength="600"></textarea>
                </div>
                <div class="form-group">
                    <label for="data_inicio">Data Inicio</label>
                    <input type="text" class="form-control" id="data_inicio" placeholder="Data">
                </div>
                <div class="form-group">
                    <label for="data_fim">Data Fim</label>
                    <input type="text" class="form-control" id="nome" placeholder="Data">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" class="form-control">
                        <option value="0">Selecione o Status</option>
                        <option value="volvo">Volvo</option>
                        <option value="saab">Saab</option>
                        <option value="mercedes">Mercedes</option>
                        <option value="audi">Audi</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="<?php echo base_url("atividades/")?>" class="btn btn-danger">Voltar</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>
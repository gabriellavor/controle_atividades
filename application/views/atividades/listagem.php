<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Data inicio</th>
                    <th>Data fim</th>
                    <th>Status</th>
                    <th>Situação</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($resultado as $row):?>
                <tr>
                    <td><?php echo $row->nome?></td>
                    <td><?php echo (strlen($row->descricao) > 10) ? substr($row->descricao,0,10).'...' : $row->descricao;?></td>
                    <td><?php echo date('d/m/Y', strtotime($row->data_inicio))?></td>
                    <td><?php echo date('d/m/Y', strtotime($row->data_fim))?></td>
                    <td><?php echo $row->status?></td>
                    <td><?php echo ($row->situacao) ? 'Ativo' : 'Inativo'?></td>
                    <td>
                    <a href="<?php echo base_url("atividades/editar/$row->id")?>" class="btn btn-success">
                    <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table> 
        <a href="<?php echo base_url("atividades/incluir")?>" class="btn btn-success">Incluir atividade</a>
    </div>
</div>
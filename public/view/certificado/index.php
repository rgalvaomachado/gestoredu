<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/public/verifica_sessao.php');
?>
<head>
    <link href="/public/view/certificado/styles.css" rel="stylesheet">
    <script src="/public/view/certificado/index.js"></script>
</head>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/head.php')?>
<div class="grid-content grid-container">
	<?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/menu.php')?>
    <div class="grid-item-content">
        <?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/top.php')?>
        <label class="title">Certificado</label> <a href="/certificado/criar"><i class="title fa fa-plus-square-o" aria-hidden="true"></i></a>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
		<?php
			$CertificadoController = new CertificadoController();
			$certificados = json_decode($CertificadoController->buscarTodos())->certificados;
		?>
		<table class="list">
            <tr>
                <th>
                    Grupo
                </th>
                <th>
                    Sala
                </th>
                <th>
                    Disciplina
                </th>
                <th>
                    Editar
                </th>
                <th>
                    Deletar
                </th>
            </tr>
            <tbody>
                <?php foreach ($certificados as $certificado){ ?>
                    <tr>
                        <td class="text-left">
                            <?php echo $certificado->nome_grupo ?>
                        </td> 
                        <td class="text-left">
                            <?php echo $certificado->nome_sala ?>
                        </td> 
                        <td class="text-left">
                            <?php echo $certificado->nome_disciplina ?>
                        </td> 
                        <td>
                            <a href="/certificado/editar?id=<?php echo $certificado->id ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        </td>
                        <td>
                            <a href="/certificado/deletar?id=<?php echo $certificado->id ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php
	include_once($_SERVER['DOCUMENT_ROOT'].'/public/verifica_sessao.php');
?>
<head>
    <link href="/public/view/professor/styles.css" rel="stylesheet">
    <script src="/public/view/professor/index.js"></script>
</head>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/head.php')?>
<div class="grid-content grid-container">
	<?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/menu.php')?>
    <div class="grid-item-content">
        <?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/top.php')?>
        <label class="title">Professor(a)</label> <a href="/professor/criar"><i class="title fa fa-plus-square-o" aria-hidden="true"></i></a>
		<br>
		<label class="message_alert" id="messageAlert"></label>
        <br>
        <form id="buscarPorNome">
            <input id="nome_busca" class="input"></input>
            <input class='button' type="submit" value="Buscar"></input>
        </form>
		<table class="list">
            <tr>
                <th>
                    Nome
                </th>
                <th>
                    Editar
                </th>
                <th>
                    Deletar
                </th>
            </tr>
            <tbody id="lista" >
            </tbody>
        </table>
        <script>loadProfessores()</script>
    </div>
</div>
<?php 
    if (!isset($_GET['id'])){
        header("Location: index.php");
        die();
    }
?>
<head>
    <?php include_once('../includes/head.html')?>
	<?php include_once('../../controller/GrupoController.php')?>
	<?php include_once('../../controller/UsuarioController.php')?>
	<?php include_once('../../controller/DisciplinaController.php')?>
	<?php include_once('../../controller/SalaController.php')?>

    <link href="styles.css" rel="stylesheet">
    <script src="index.js"></script>
</head>
<?php include_once('../includes/top.html')?>
<div class="grid-container">
	<?php include_once('../includes/menu.html')?>
    <div class="grid-item-content">
        <label class="title">Editar Aluno(a)</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
		<br>
        <?php
            $UsuarioController = new UsuarioController();
            $UsuarioController = json_decode($UsuarioController->buscar(['id' => $_GET['id']]));
            $usuario = $UsuarioController->usuario;
        ?>
        <form id="editar">
			<div class="grid-item-content">
            <label class="message_alert" id="messageAlert"></label>
            <br>
            <input type="hidden" id="usuario" name="usuario" value="<?php echo $usuario->id?>">
            <label>Nome Completo</label>
            <br>
            <input class='input' id="nome" name="nome" value="<?php echo $usuario->nome?>" required>
            <br>
            <br>
            <label>Data de Nascimento</label>
            <br>
            <input id="data_nascimento" name="data_nascimento" type="date" class="input" value="<?php echo $usuario->data_nascimento?>" required>
            <br>
            <div class="grid-endereco">
                <div class="grid-endereco-item">
                    <label>RG</label>
                    <br>
                    <input type='number' class='input' id="rg" name="rg" value="<?php echo $usuario->rg?>" >
                </div>
                <div class="grid-endereco-item">
                </div>
                <div class="grid-endereco-item">
                    <label>CPF</label>
                    <br>
                    <input type='number' class='input' id="cpf" name="cpf" value="<?php echo $usuario->cpf?>" >
                </div>
            </div>
            <br>
            <?php $endereco = explode('###',$usuario->endereco)?>
            <label>Endereço</label>
            <br>
            <br>
            <div class="grid-endereco">
                <div class="grid-endereco-item">
                    <label>Rua</label>
                    <br>
                    <input class='input' id="rua" name="rua" value="<?php echo $endereco[0]?>" required>
                </div>
                <div class="grid-endereco-item">
                    <label>Numero</label>
                    <br>
                    <input type="number" min='0' class='input' id="numero" name="numero" value="<?php echo $endereco[1]?>" required>
                </div>
                <div class="grid-endereco-item">
                    <label>Bairro</label>
                    <br>
                    <input class='input' id="bairro" name="bairro" value="<?php echo $endereco[2]?>" required>
                </div>
            </div>
            <br>
            <div class="grid-endereco">
                <div class="grid-endereco-item">
                    <label>Cidade</label>
                    <br>
                    <input type='text' class='input' id="cidade" name="cidade" value="<?php echo $endereco[3]?>" required>
                </div>
                <div class="grid-endereco-item">
                </div>
                <div class="grid-endereco-item">
                    <label>Estado</label>
                    <br>
                    <input type='text' class='input' id="estado" name="estado" value="<?php echo $endereco[4]?>" required>
                </div>
            </div>
            <br>
            <label>Telefone</label>
            <br>
            <input class='input' type="number" id="telefone" name="telefone" value="<?php echo $usuario->telefone?>" required>
            <br>
            <br>
            <label>Email</label>
            <br>
            <input class='input' type="email" id="email" name="email" value="<?php echo $usuario->email?>" required>
            <br>
            <input type="hidden" id="grupos" value="1">
            <br>
            <label>Disciplinas</label>
            <br>
            <?php
                $DisciplinaController = new DisciplinaController();
                $disciplinas = json_decode($DisciplinaController->buscarTodos())->disciplinas;
            ?>
            <?php $usuario_disciplinas = isset($usuario->disciplinas) ? explode('#',$usuario->disciplinas) : [] ?>
            <div id='gruposTodos'>
                <?php foreach ($disciplinas as $disciplina) { ?>
                    <input type='checkbox' id="disciplinas" name="disciplinas[]" value="<?php echo $disciplina->id ?>" <?php echo in_array($disciplina->id, $usuario_disciplinas) ? "checked" : "" ?> > <?php echo $disciplina->nome ?>
                <?php } ?>
            </div>
            <br>
            <label>Salas</label>
            <br>
            <?php
                $SalaController = new SalaController();
                $salas = json_decode($SalaController->buscarTodos())->salas;
            ?>
            <div id='gruposTodos'>
                <?php foreach ($salas as $sala) { ?>
                    <input type='checkbox' id="salas" name="salas[]" value="<?php echo $sala->id ?>"><?php echo $sala->nome ?>
                <?php } ?>
            </div>
            <br>
            <input class='button' type="submit" value="Editar">
        </form>
    </div>
</div>
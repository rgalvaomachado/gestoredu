<?php 
    if (!isset($_GET['id'])){
        header("Location: /usuario");
        die();
    }
?>
<head>
	<?php include_once('src/controller/UsuarioController.php')?>
	<?php include_once('src/controller/DisciplinaController.php')?>
	<?php include_once('src/controller/SalaController.php')?>
    <link href="/public/view/usuario/styles.css" rel="stylesheet">
    <script src="/public/view/usuario/index.js"></script>
</head>
<div class="grid-content grid-container">
	<?php include_once('public/menu.php')?>
    <div class="grid-item-content">
        <?php include_once('public/top.php')?>
        <?php include_once('public/configuracao.php') ?>
        <label class="title">Editar Professor(a)</label>
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
            <label class="obrigatorio">*</label>
            <br>
            <input class='input' id="nome" name="nome" value="<?php echo $usuario->nome?>" required>
            <br>
            <?php if ($professor_nascimento){ ?>
                <label>Data de Nascimento</label>
                <br>
                <input id="data_nascimento" name="data_nascimento" type="date" class="input" value="<?php echo $usuario->data_nascimento?>">
                <br>
            <?php } ?>
            <?php if ($professor_rg){ ?>
                <label>RG</label>
                <br>
                <input type='number' class='input' id="rg" name="rg" value="<?php echo $usuario->rg?>" >
                <br>
            <?php } ?>
            <?php if ($professor_cpf){ ?>
                <label>CPF</label>
                <br>
                <input type='number' class='input' id="cpf" name="cpf" value="<?php echo $usuario->cpf?>" >
                <br>
            <?php } ?>
            <?php if ($professor_endereco){ ?>
                <label>Endereço</label>
                <br>
                <br>
                <div class="grid-endereco">
                    <div class="grid-endereco-item">
                        <label>Rua</label>
                        <br>
                        <input class='input' id="rua" name="rua" value="<?php echo $usuario->rua?>">
                    </div>
                    <div class="grid-endereco-item">
                        <label>Numero</label>
                        <br>
                        <input type="number" min='0' class='input' id="numero" name="numero" value="<?php echo $usuario->numero?>">
                    </div>
                    <div class="grid-endereco-item">
                        <label>Bairro</label>
                        <br>
                        <input class='input' id="bairro" name="bairro" value="<?php echo $usuario->bairro?>">
                    </div>
                </div>
                <br>
                <div class="grid-endereco">
                    <div class="grid-endereco-item">
                        <label>Cidade</label>
                        <br>
                        <input type='text' class='input' id="cidade" name="cidade" value="<?php echo $usuario->cidade?>">
                    </div>
                    <div class="grid-endereco-item">
                    </div>
                    <div class="grid-endereco-item">
                        <label>Estado</label>
                        <br>
                        <input type='text' class='input' id="estado" name="estado" value="<?php echo $usuario->estado?>">
                    </div>
                </div>
                <br>
            <?php } ?>
            <?php if ($professor_telefone){ ?>
                <label>Telefone</label>
                <br>
                <input class='input' type="number" id="telefone" name="telefone" value="<?php echo $usuario->telefone?>">
                <br>
            <?php } ?>
            <label>Email</label>
            <br>
            <input class='input' type="email" id="email" name="email" value="<?php echo $usuario->email?>">
            <br>
            <label>Senha</label>
            <br>
            <input class='input' type="password" id="senha" name="senha" value="<?php echo $usuario->senha?>">
            <input type="hidden" id="grupos" value="2">
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
            <?php $usuario_salas = isset($usuario->salas) ? explode('#',$usuario->salas) : [] ?>
            <div id='gruposTodos'>
                <?php foreach ($salas as $sala) { ?>
                    <input type='checkbox' id="salas" name="salas[]" value="<?php echo $sala->id ?>" <?php echo in_array($sala->id, $usuario_salas) ? "checked" : "" ?> > <?php echo $sala->nome ?>
                <?php } ?>
            </div>
            <br>
            <input class='button' type="submit" value="Editar">
        </form>
    </div>
</div>
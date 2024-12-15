<?php 
    if (!isset($_GET['id'])){
        header("Location: /professor");
        die();
    }
?>
<head>
    <link href="/public/view/professor/styles.css" rel="stylesheet">
    <script src="/public/view/professor/index.js"></script>
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
            <br>
            <input type="hidden" id="grupos" value="2">
            <br>
            <br>
            <label>Atribuição</label>
            <br>
            <table class="list" id="atribuicoes">
                <tbody>
                    <tr>
                        <th>
                            Sala
                        </th>
                        <th>
                            Disciplina
                        </th>
                        <th>
                            
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <?php 
                                $SalaController = new SalaController();
                                $salas = json_decode($SalaController->buscarTodos())->salas;
                            ?>
                            <select class='input coluna' id="sala" onchange="getDisciplinas()">
                                <option value="">Selecione uma sala</option>
                                <?php foreach ($salas as $sala) { ?>
                                    <option value="<?php echo $sala->id ?>"><?php echo $sala->nome ?></option>	
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <select class='input coluna' id="disciplina" name="disciplina">
                            </select>
                        </td>
                        <td>
                            <a><i onclick="addAtribuicao(this)" class="fa fa-plus-square-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php
                        $AtribuicaoController = new AtribuicaoController();
                        $atribuicoes = json_decode($AtribuicaoController->buscarAtribuicoesUsuario([
                            'cod_usuario' => $_GET['id']
                        ]))->atribuicoes;
                            foreach ($atribuicoes as $matricula){ ?>
                                <tr>
                                    <td>
                                        <?php echo $matricula->nome_sala ?>
                                    
                                    </td>
                                    <td>
                                        <?php echo $matricula->nome_disciplina ?>
                                    </td>
                                    <td>
                                        <a><i onclick="delAtribuicao(this)" class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                    <input type="hidden" id="atribuicoes" name="atribuicoes[]" data-cod_sala="<?php echo $matricula->cod_sala ?>" data-cod_disciplina="<?php echo $matricula->cod_disciplina ?>">
                                </tr>
                        <?php } 
                    ?>
                </tbody>
            </table>
            <br>
            <input class='button' type="submit" value="Editar">
        </form>
    </div>
</div>
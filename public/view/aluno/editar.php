<?php 
    include_once($_SERVER['DOCUMENT_ROOT'].'/public/verifica_sessao.php');
    if (!isset($_GET['id'])){
        header("Location: /aluno");
        die();
    }
?>
<head>
    <link href="/public/view/aluno/styles.css" rel="stylesheet">
    <script src="/public/view/aluno/index.js"></script>
</head>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/head.php')?>
<div class="grid-content grid-container">
	<?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/menu.php')?>
    <div class="grid-item-content">
        <?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/top.php')?>
        <?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/configuracao.php') ?>
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
            <input type="hidden" id="id" name="id" value="<?php echo $usuario->id?>">
            <label>Nome Completo</label>
            <label class="obrigatorio">*</label>
            <br>
            <input class='input' id="nome" name="nome" value="<?php echo $usuario->nome?>" required>
            <br>
            <?php if ($aluno_nascimento){ ?>
                <label>Data de Nascimento</label>
                <br>
                <input id="data_nascimento" name="data_nascimento" type="date" class="input" value="<?php echo $usuario->data_nascimento?>">
                <br>
            <?php } ?>
            <?php if ($aluno_rg){ ?>
                <label>RG</label>
                <br>
                <input type='number' class='input' id="rg" name="rg" value="<?php echo $usuario->rg?>" >
                <br>
            <?php } ?>
            <?php if ($aluno_cpf){ ?>
                <label>CPF</label>
                <br>
                <input type='number' class='input' id="cpf" name="cpf" value="<?php echo $usuario->cpf?>" >
                <br>
            <?php } ?>
            <?php if ($aluno_endereco){ ?>
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
            <?php if ($aluno_telefone){ ?>
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
            <input type="hidden" id="grupos" name="grupos" data-cod_grupo="1">
            <br>
            <br>
            <label>Inscricoes</label>
            <br>
            <table class="list" id="inscricoes">
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
                            <select class='input coluna' id="disciplina">
                            </select>
                        </td>
                        <td>
                            <a><i onclick="addInscricao(this)" class="fa fa-plus-square-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php 
                        $InscricaoController = new InscricaoController();
                        $inscricoes = json_decode($InscricaoController->buscarTodosUsuario([
                            'cod_usuario' => $_GET['id'],
                            'cod_grupo' => 1
                        ]))->inscricoes;
                        foreach ($inscricoes as $inscricao){ ?>
                            <tr>
                                <td>
                                    <?php echo $inscricao->nome_sala ?>
                                
                                </td>
                                <td>
                                    <?php echo $inscricao->nome_disciplina ?>
                                </td>
                                <td>
                                    <a><i onclick="delInscricao(this)" class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                                <input type="hidden" name="inscricoes" data-cod_grupo="<?php echo $inscricao->cod_grupo ?>" data-cod_sala="<?php echo $inscricao->cod_sala ?>" data-cod_disciplina="<?php echo $inscricao->cod_disciplina ?>">
                            </tr>
                    <?php } ?>
                </tbody>
            </table>
            <br>
            <br>
            <?php if ($aluno_trabalho) { ?>
                <label>Projetos</label>
                <br>
                <table class="list" id="projetos">
                    <tbody>
                        <tr>
                            <th>
                                Nome
                            </th>
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
                                <input class='input' type="text " id="nome_projeto">
                            </td>
                            <td>
                                <?php 
                                    $SalaController = new SalaController();
                                    $salas = json_decode($SalaController->buscarTodos())->salas;
                                ?>
                                <select class='input coluna' id="sala_projeto" onchange="getDisciplinasProjeto()">
                                    <option value="">Selecione uma sala</option>
                                    <?php foreach ($salas as $sala) { ?>
                                        <option value="<?php echo $sala->id ?>"><?php echo $sala->nome ?></option>	
                                    <?php } ?>
                                </select>
                            </td>
                            <td>
                                <select class='input coluna' id="disciplina_projeto">
                                </select>
                            </td>
                            <td>
                                <a><i onclick="addProjeto(this)" class="fa fa-plus-square-o" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        <?php 
                            $projetos = json_decode((new ProjetoController)->buscarProjetosUsuario([
                                'cod_usuario' => $_GET['id']
                            ]))->projetos;

                            foreach ($projetos as $projeto) { ?>
                                <tr>
                                    <td>
                                        <?php echo $projeto->nome ?>
                                    
                                    </td>
                                    <td>
                                        <?php echo $projeto->nome_sala ?>
                                    
                                    </td>
                                    <td>
                                        <?php echo $projeto->nome_disciplina ?>
                                    </td>
                                    <td>
                                        <a><i onclick="delProjeto(this)" class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                    <input type="hidden" name="projetos" data-nome="<?php echo $projeto->nome ?>" data-cod_sala="<?php echo $projeto->cod_sala ?>" data-cod_disciplina="<?php echo $projeto->cod_disciplina ?>">
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <br>
            <?php } ?>
            <input class='button' type="submit" value="Editar">
        </form>
    </div>
</div>
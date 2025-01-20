<head>
    <?php include_once($_SERVER['DOCUMENT_ROOT'].'/src/controller/GrupoController.php')?>
    <?php include_once($_SERVER['DOCUMENT_ROOT'].'/src/controller/DisciplinaController.php')?>
    <?php include_once($_SERVER['DOCUMENT_ROOT'].'/src/controller/SalaController.php')?>
    <?php include_once($_SERVER['DOCUMENT_ROOT'].'/src/controller/AtribuicaoController.php')?>
    <link href="/public/view/professor/styles.css" rel="stylesheet">
    <script src="/public/view/professor/index.js"></script>
</head>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/head.php')?>
<div class="grid-content grid-container">
    <?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/menu.php')?>
    <form id="criar">
        <div class="grid-item-content">
            <?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/top.php')?>
            <?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/configuracao.php') ?>
            <label class="title">Criar Professor(a)</label>
            <br>
            <label class="message_alert" id="messageAlert"></label>
            <br>
            <label>Nome Completo</label>
            <label class="obrigatorio">*</label>
            <br>
            <input class='input' id="nome" name="nome" required>
            <br>
            <?php if ($professor_nascimento){ ?>
                <label>Data de Nascimento</label>
                <br>
                <input id="data_nascimento" name="data_nascimento" type="date" class="input">
                <br>
            <?php } ?>
            <?php if ($professor_rg){ ?>
                    <label>RG</label>
                    <br>
                    <input type='number' class='input' id="rg" name="rg">
                    <br>
            <?php } ?>
            <?php if ($professor_cpf){ ?>
                <label>CPF</label>
                <br>
                <input type='number' class='input' id="cpf" name="cpf">
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
                        <input class='input' id="rua" name="rua">
                    </div>
                    <div class="grid-endereco-item">
                        <label>Numero</label>
                        <br>
                        <input type="number" min='0' class='input' id="numero" name="numero">
                    </div>
                    <div class="grid-endereco-item">
                        <label>Bairro</label>
                        <br>
                        <input class='input' id="bairro" name="bairro">
                    </div>
                </div>
                <br>
                <div class="grid-endereco">
                    <div class="grid-endereco-item">
                        <label>Cidade</label>
                        <br>
                        <input type='text' class='input' id="cidade" name="cidade">
                    </div>
                    <div class="grid-endereco-item">
                    </div>
                    <div class="grid-endereco-item">
                        <label>Estado</label>
                        <br>
                        <input type='text' class='input' id="estado" name="estado">
                    </div>
                </div>
                <br>
            <?php } ?>
            <?php if ($professor_telefone){ ?>
                <label>Telefone</label>
                <br>
                <input class='input' type="number" id="telefone" name="telefone">
                <br>
            <?php } ?>
            <label>Email</label>
            <br>
            <input class='input' type="email" id="email" name="email">
            <br>
            <label>Senha</label>
            <br>
            <input class='input' type="password" id="senha" name="senha">
            <input type="hidden" id="grupos" value="2">
            <br><br>
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
                </tbody>
            </table>
            <br>
            <input class='button' type="submit" value="Criar">
        </div>
    </form>
</div>
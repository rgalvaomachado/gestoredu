<head>
	<?php include_once('src/controller/ConfiguracaoController.php')?>
    <link href="/public/view/configuracao/styles.css" rel="stylesheet">
    <script src="/public/view/configuracao/index.js"></script>
</head>
<div class="grid-content grid-container">
	<?php include_once('public/menu.php')?>
    <div class="grid-item-content">
        <?php include_once('public/top.php')?>
        <label class="title">Configuração</label>
        <form id="configurar">
			<div class="grid-item-content">
            <label class="message_alert" id="messageAlert"></label>
            <?php
                $ConfiguracaoController = new ConfiguracaoController();
                $ConfiguracaoController = json_decode($ConfiguracaoController->buscarTodos([]));
                foreach ($ConfiguracaoController->configuracao as $configuracao) {
                    switch ($configuracao->chave) {
                        case 'tipo_frequencia':
                            $tipo_frequencia = $configuracao->valor;
                            break;
                        case 'frequencia':
                            $frequencia = $configuracao->valor;
                            break;
                        case 'aluno_nascimento':
                            $aluno_nascimento = $configuracao->valor;
                            break;
                        case 'aluno_rg':
                            $aluno_rg = $configuracao->valor;
                            break;
                        case 'aluno_cpf':
                            $aluno_cpf = $configuracao->valor;
                            break;
                        case 'aluno_endereco':
                            $aluno_endereco = $configuracao->valor;
                            break;
                        case 'aluno_telefone':
                            $aluno_telefone = $configuracao->valor;
                            break;
                        case 'professor_telefone':
                            $professor_telefone = $configuracao->valor;
                            break;
                        case 'professor_nascimento':
                            $professor_nascimento = $configuracao->valor;
                            break;
                        case 'professor_rg':
                            $professor_rg = $configuracao->valor;
                            break;
                        case 'professor_cpf':
                            $professor_cpf = $configuracao->valor;
                            break;
                        case 'professor_endereco':
                            $professor_endereco = $configuracao->valor;
                            break;
                    }
                }
            ?>
            <table>
                <thead>
                    <tr>
                        <th><strong>Tipo de Frequencia</strong></th>
                        <th><strong>Frequencia</strong></th>
                    </tr>
                </thead>
                <tbody id='lista'>
                    <td>
                        <select class='input' id="tipo_frequencia" name="tipo_frequencia" required>
                            <option value="1" <?php echo $tipo_frequencia == 1 ? 'selected' : '' ?>>Procentagem</option>	
                            <option value="2" <?php echo $tipo_frequencia == 2 ? 'selected' : '' ?>>Quantidade</option>	
                        </select>
                    </td>
                    <td>
                        <input class='input' id="frequencia" name="frequencia" value="<?php echo $frequencia?>" required>
                    </td>
                </tbody>
            </table>
            <th><strong>Dados do Aluno</strong></th>
            <br>
            <table>
                <tbody id='lista'>
                    <tr>
                        <td>
                            <input type="checkbox" name="aluno_nascimento" id="aluno_nascimento" <?php echo $aluno_nascimento == 1 ? 'checked' : ''?>>
                        </td>
                        <td>
                            <label for="aluno_nascimento">Data de Nascimento</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="aluno_rg" id="aluno_rg" <?php echo $aluno_rg == 1 ? 'checked' : ''?>>
                        </td>
                        <td>
                            <label for="aluno_rg">RG</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="aluno_cpf" id="aluno_cpf" <?php echo $aluno_cpf == 1 ? 'checked' : ''?>>
                        </td>
                        <td>
                            <label for="aluno_cpf">CPF</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="aluno_endereco" id="aluno_endereco" <?php echo $aluno_endereco == 1 ? 'checked' : ''?>>
                        </td>
                        <td>
                            <label for="aluno_endereco">Endereço</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="aluno_telefone" id="aluno_telefone" <?php echo $aluno_telefone == 1 ? 'checked' : ''?>>
                        </td>
                        <td>
                            <label for="aluno_telefone">Data de Nascimento</label>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>
            <th><strong>Dados do Professor</strong></th>
            <br>
            <table>
                <tbody id='lista'>
                    <tr>
                        <td>
                            <input type="checkbox" name="professor_nascimento" id="professor_nascimento" <?php echo $professor_nascimento == 1 ? 'checked' : ''?>>
                        </td>
                        <td>
                            <label for="professor_nascimento">Data de Nascimento</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="professor_rg" id="professor_rg" <?php echo $professor_rg == 1 ? 'checked' : ''?>>
                        </td>
                        <td>
                            <label for="professor_rg">RG</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="professor_cpf" id="professor_cpf" <?php echo $professor_cpf == 1 ? 'checked' : ''?>>
                        </td>
                        <td>
                            <label for="professor_cpf">CPF</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="professor_endereco" id="professor_endereco" <?php echo $professor_endereco == 1 ? 'checked' : ''?>>
                        </td>
                        <td>
                            <label for="professor_endereco">Endereço</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="professor_telefone" id="professor_telefone" <?php echo $professor_telefone == 1 ? 'checked' : ''?>>
                        </td>
                        <td>
                            <label for="professor_telefone">Telefone</label>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>
            <input class='button' type="submit" value="Configurar">
        </form>
    </div>
</div>
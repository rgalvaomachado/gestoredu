<head>
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
            <?php include_once('public/configuracao.php') ?>
            <br>
            <th><strong>Configurações da chamada</strong></th>
            <br>
            <table>
                <tbody id='lista'>
                    <tr>
                        <td>
                            <label for="multi_chamada ">Multi Chamada</label>
                        </td>
                        <td>
                            <input type="checkbox" name="multi_chamada" id="multi_chamada" <?php echo $multi_chamada == 1 ? 'checked' : ''?>>
                        </td>
                    </tr>
                    <tr>
                        <table>
                            <thead>
                                <tr>
                                    <th><strong>Tipo de Frequencia</strong></th>
                                    <th><strong>Frequencia</strong></th>
                                </tr>
                            </thead>
                            <tbody id='lista'>
                                <td>
                                    <select class='input input_text2' id="tipo_frequencia" name="tipo_frequencia" required>
                                        <option value="1" <?php echo $tipo_frequencia == 1 ? 'selected' : '' ?>>Procentagem</option>	
                                        <option value="2" <?php echo $tipo_frequencia == 2 ? 'selected' : '' ?>>Quantidade</option>	
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class='input input_text' id="frequencia" name="frequencia" value="<?php echo $frequencia?>" required>
                                </td>
                            </tbody>
                        </table>
                    </tr>
                </tbody>
            </table>
            <br><br>

            <th><strong>Dados do Aluno</strong></th>
            <br>
            <table>
                <tbody id='lista'>
                    <tr>
                        <td>
                            <label for="aluno_trabalho">Titulo do trabalho</label>
                        </td>
                        <td>
                            <input type="checkbox" name="aluno_trabalho" id="aluno_trabalho" <?php echo $aluno_trabalho == 1 ? 'checked' : ''?>>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="aluno_nascimento">Data de Nascimento</label>
                        </td>
                        <td>
                            <input type="checkbox" name="aluno_nascimento" id="aluno_nascimento" <?php echo $aluno_nascimento == 1 ? 'checked' : ''?>>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="aluno_rg">RG</label>
                        </td>
                        <td>
                            <input type="checkbox" name="aluno_rg" id="aluno_rg" <?php echo $aluno_rg == 1 ? 'checked' : ''?>>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="aluno_cpf">CPF</label>
                        </td>
                        <td>
                            <input type="checkbox" name="aluno_cpf" id="aluno_cpf" <?php echo $aluno_cpf == 1 ? 'checked' : ''?>>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="aluno_endereco">Endereço</label>
                        </td>
                        <td>
                            <input type="checkbox" name="aluno_endereco" id="aluno_endereco" <?php echo $aluno_endereco == 1 ? 'checked' : ''?>>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="aluno_telefone">Telefone</label>
                        </td>
                        <td>
                            <input type="checkbox" name="aluno_telefone" id="aluno_telefone" <?php echo $aluno_telefone == 1 ? 'checked' : ''?>>
                        </td>
                    </tr>
                </tbody>
            </table>

            <br><br>
            <th><strong>Dados do Professor</strong></th>
            <br>
            <table>
                <tbody id='lista'>
                    <tr>
                        <td>
                            <label for="professor_nascimento">Data de Nascimento</label>
                        </td>
                        <td>
                            <input type="checkbox" name="professor_nascimento" id="professor_nascimento" <?php echo $professor_nascimento == 1 ? 'checked' : ''?>>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="professor_rg">RG</label>
                        </td>
                        <td>
                            <input type="checkbox" name="professor_rg" id="professor_rg" <?php echo $professor_rg == 1 ? 'checked' : ''?>>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="professor_cpf">CPF</label>
                        </td>
                        <td>
                            <input type="checkbox" name="professor_cpf" id="professor_cpf" <?php echo $professor_cpf == 1 ? 'checked' : ''?>>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="professor_endereco">Endereço</label>
                        </td>
                        <td>
                            <input type="checkbox" name="professor_endereco" id="professor_endereco" <?php echo $professor_endereco == 1 ? 'checked' : ''?>>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="professor_telefone">Telefone</label>
                        </td>
                        <td>
                            <input type="checkbox" name="professor_telefone" id="professor_telefone" <?php echo $professor_telefone == 1 ? 'checked' : ''?>>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>
            <input class='button' type="submit" value="Configurar">
        </form>
    </div>
</div>
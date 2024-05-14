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
                $ConfiguracaoController = json_decode($ConfiguracaoController->buscar(['id' => 1]));
                $tipo_frequencia = $ConfiguracaoController->access ? $ConfiguracaoController->configuracao->tipo_frequencia : '';
                $frequencia = $ConfiguracaoController->access ? $ConfiguracaoController->configuracao->frequencia : '';
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
            <input class='button' type="submit" value="Configurar">
        </form>
    </div>
</div>
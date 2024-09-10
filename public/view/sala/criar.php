<head>
    <link href="/public/view/sala/styles.css" rel="stylesheet">
    <script src="/public/view/sala/index.js"></script>
</head>
<div class="grid-content grid-container">
    <?php include_once('public/menu.php')?>
    <form id="criar">
        <div class="grid-item-content">
            <?php include_once('public/top.php')?>
            <label class="title">Criar Sala</label>
            <br>
            <label class="message_alert" id="messageAlert"></label>
            <br>
            <label>Nome</label>
            <br>
            <input class='input' id="nome" name="nome" required>
            <br>
            <label>Disciplinas</label>
            <br>
            <?php
                $DisciplinaController = new DisciplinaController();
                $disciplinas = json_decode($DisciplinaController->buscarTodos())->disciplinas;
            ?>
            <table class="grid">
                <tbody>
                        <?php foreach ($disciplinas as $disciplina) { ?>
                        <tr>
                            <td class="grid-left">
                                <label><input type='checkbox' class="checkbox" id="disciplinas" name="disciplinas[]" value="<?php echo $disciplina->id ?>"></label>
                            </td>
                            <td class="grid-right">
                                <label><?php echo $disciplina->nome ?></label>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <br>
            <br>
            <input class='button' type="submit" value="Criar">
        </div>
    </form>
</div>
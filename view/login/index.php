<head>
    <?php include_once('../includes/head.html')?>

    <link href="styles.css" rel="stylesheet">
    <script src="index.js"></script>
</head>
<div id="login">
    <div class='form'>
        <label class="title labelLogin">Login</label>
    </div>
    <div class='form'>
        <input class='input'placeholder="Usuario" id="usuarioLogin" name="usuarioLogin" type="text">
    </div>
    <div class='form'>
        <input class='input'placeholder="Senha" id="senhaLogin" name="senhaLogin" type="password">
    </div>
    <div class='form'>
        <input class='button' type="button" onclick="login()" value="Entrar">
    </div>
    <div class='form'>
        <label class="message_alert" id="messageAlert"></label>
    </div>
</div>
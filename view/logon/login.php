<head>
    <?php include_once('../includes/head.html')?>

    <link href="styles.css" rel="stylesheet">
    <script src="index.js"></script>
</head>
<form id="login">
    <label class="message_alert" id="messageAlert"></label>
    </br>
    <label class="title labelLogin">Login</label>
    </br>
    <input class='input' placeholder="Email" id="emailLogin" name="emailLogin" type="email" required>
    </br>
    <input class='input' placeholder="Senha" id="senhaLogin" name="senhaLogin" type="password" required>
    </br>
    <input class='button' type="submit" value="Entrar">
</form>
<head>
    <?php include_once('../includes/head.html')?>

    <link href="styles.css" rel="stylesheet">
    <script src="index.js"></script>
</head>
<div class="grid">
    <div class="grid-item">
        <div id="esquerda">
            <img id="logo-gedu" src='../public/img/logo_colorido2.png'>
            </br></br></br></br>
            <label class="cinza open_sans" id="nao_conta">Ainda não tem uma conta?</label>
            </br></br>
            <a class="azul open_sans" id="contato" href="https://gestoredu.com" target="_blank">Entre em contato!</a>
        </div>
    </div>
    <div class="grid-item">
        <div id="direita">
            <form id="login">
                <label class="message_alert" id="messageAlert"></label>
                </br>
                <label class="title azul open_sans">Faça seu Login</label>
                </br></br></br></br>
                <input class='input open_sans' placeholder="Seu e-mail" id="emailLogin" name="emailLogin" type="email" required>
                </br>
                <input class='input open_sans' placeholder="Senha" id="senhaLogin" name="senhaLogin" type="password" required>
                </br></br></br>
                <input class='button fundo-azul open_sans' type="submit" value="Entrar">
                </br></br>
                <!-- <a class="azul">Esqueci minha senha</a> -->
            </form>
        </div>
    </div>
</div>

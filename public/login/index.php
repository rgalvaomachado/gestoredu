<head>
    <link href="/public/login/styles.css" rel="stylesheet">
    <script src="/public/login/index.js"></script>
</head>
<div class="grid">
    <div class="grid-item">
        <div id="gestor_edu">
            <img id="logo-gedu" src='/public/img/logo_colorido2.png'>
            <div id="nao_tem_conta1">
                <label class="cinza open_sans" id="nao_conta">Ainda não tem uma conta?</label>
                </br></br>
                <a class="azul open_sans" id="contato" href="https://gestoredu.com" target="_blank">Entre em contato!</a>
            </div>
        </div>
    </div>
    <div class="grid-item">
        <div id="faca_login">
            <form id="login">
                
                </br>
                <label class="title azul open_sans">Faça seu Login</label>
                </br></br></br></br>
                <div class="error_login">
                    <img id="cancel" src='img/blocked_cancel_icon.png'>
                    <label class="open_sans" id="messageAlert"></label>
                </div>
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
    <div id="nao_tem_conta2">
        <label class="cinza open_sans" id="nao_conta">Ainda não tem uma conta?</label>
        </br></br>
        <a class="azul open_sans" id="contato" href="https://gestoredu.com" target="_blank">Entre em contato!</a>
    </div>
</div>

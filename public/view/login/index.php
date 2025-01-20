<?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/head.php')?>
<head>
    <link href="/public/view/login/styles.css" rel="stylesheet">
    <script src="/public/view/login/index.js"></script>
</head>
<div class="grid">
    <div class="grid-item">
        <div id="gestor_edu">
            <img id="logo-gedu" src='/public/img/logo_colorido2.png'>
            <div id="nao_tem_conta1">
                <label class="cinza open_sans" id="nao_conta">Ainda não conheçe nosso produto?</label>
                </br></br>
                <a class="azul open_sans" id="contato" href="https://gestoredu.hubis.com.br" target="_blank">Clique aqui e confira!</a>
            </div>
        </div>
    </div>
    <div class="grid-item">
        <div id="faca_login">
            <?php 
                $LoginControler = new LoginController();
                $primeiroLogin = $LoginControler->primeiroLogin([]); 
            ?>
            <?php
            if ($primeiroLogin) { ?>
                <form id="primeiroLogin">
                    </br>
                    <label class="title azul open_sans">Crie seu primeiro login</label>
                    </br></br></br></br>
                    <div class="error_login">
                        <img id="cancel" src='img/blocked_cancel_icon.png'>
                        <label class="open_sans" id="messageAlert"></label>
                    </div>
                    </br>
                    <input class='input open_sans' placeholder="Seu nome" id="nome" name="nome" type="text" required>
                    </br>
                    <input class='input open_sans' placeholder="Seu e-mail" id="email" name="email" type="email" required>
                    </br>
                    <input class='input open_sans' placeholder="Senha" id="senha" name="senha" type="password" required>
                    </br>
                    <input class='input open_sans' placeholder="Confirmação de Senha" id="senhaConfirmacaoLogin" name="senhaConfirmacaoLogin" type="password" required>
                    </br>
                    <select class='input' id="grupos" name="grupos" required>
                        <option value="1">Aluno</option>	
                        <option value="2">Professor</option>
                    </select>
                    </br></br></br>
                    <input class='button fundo-azul open_sans' type="submit" value="Criar">
                    </br></br>
                    <!-- <a class="azul">Esqueci minha senha</a> -->
                </form>
            <?php } else { ?>
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
            <?php } ?>
        </div>
    </div>
    <div id="nao_tem_conta2">
        <label class="cinza open_sans" id="nao_conta">Ainda não conheçe nosso produto?</label>
        </br></br>
        <a class="azul open_sans" id="contato" href="https://gestoredu.hubis.com.br" target="_blank">Clique aqui e confira!</a>
    </div>
</div>

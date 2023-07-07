<head>
    <?php include_once('../includes/head.html')?>

    <link href="styles.css" rel="stylesheet">
    <script src="index.js"></script>
</head>
<?php include_once('../includes/top.php')?>
<div class="grid-content grid-container">
    <?php include_once('../includes/menu.php')?>
    <div class="grid-item-content">
        <label class="title">Certificado</label>
        <br>
        <label class="message_alert" id="messageAlert"></label>
        <br>
        <label>Monitore</label>
        <br>
        <select class='input' id="monitore" name="monitore" onchange="buscarMonitoreCertificado()">
            <option>Selecione o monitore</option>
        </select>
        <br>
        <label>Data Inicial</label>
        <br>
        <input id="dataInicial" name="dataInicial" type="date" class="input">
        <br>
        <label>Data Final</label>
        <br>
        <input id="dataFinal" name="dataFinal" type="date" class="input">
        <br>
        <label>Coordenador Docente do Projeto</label>
        <br>
        <select class='input' id="docente" name="docente" onchange="buscarDocente()">
            <option>Selecione o docente</option>
        </select>
        <br>
        <label>Coordenador Discente do Projeto</label>
        <br>
        <select class='input' id="discente" name="discente"  onchange="buscarDiscente()">
            <option>Selecione o discente</option>
        </select>
        <br>
        <input class='button' type="button" onclick="gerarCertificadoMonitore()" value="Gerar">
        <br>
        <div id="detalhes">
            <div id="frente">
                <div id="conteudo">
                    <h1 id="titulo">
                        CERTIFICADO
                    </h1>
                    <div id="corpo">
                        Certificamos que <b class="nomeMonitore"></b> participou do Subprograma de Extensão Universitária Cursinho Pré Universitário Atena do Instituto de Biociencias da UNESP de Botucatu na condição de <b>Monitor(a)</b> no periodo de <label class="mesInicial"></label> a <label class="mesFinal"></label> de <label class="anoFinal"></label>.
                    </div>
                    <table id="assinaturas">
                        <tr>
                            <td class="assinaturas">
                                <div id="assinaturaDocente"></div>
                            </td>
                            <td class="assinaturas">
                                <div id="assinaturaDiscente"></div>
                            </td>
                        </tr>
                        <tr>
                            <td class="assinaturas">Prof. Docente</td>
                            <td class="assinaturas">Discente</td>
                        </tr>
                        <tr>
                            <td class="assinaturas">Coordenador Docente do Projeto</td>
                            <td class="assinaturas">Coordenador Discente do Projeto</td>
                        </tr>
                    </table>
                    <div>
                        <img id="ibbFrente" src="public/img/ibb.png" />
                        <img id="unespFrente" src="public/img/unesp.png" />
                    </div>
                </div>
            </div>
            <input class='button' type="button" onclick="downloadFrente()" value="Download Frente">
            <br>
            <div id="verso">
                <div id="conteudo">
                    <table id="carga-horaria">
                        <tr>
                        <th colspan="2">Atividades Desenvolvidas</th>
                        </tr>
                        <tr>
                            <td class="assinaturas">Monitoria</label></td>
                            <td class="assinaturas"><label class="presencaMonitorias"></label> horas</td>
                        </tr>
                    </table>
                    <div>
                        <img id="ibbVerso" src="public/img/ibb.png" />
                        <img id="assinatura-cursinho" src="public/img/assinatura-cursinho.png" />
                        <img id="unespVerso" src="public/img/unesp.png" />
                    </div>
                </div>
            </div>
            <input class='button' type="button" onclick="downloadVerso()" value="Download Verso">
        </div>
        <script src="view/certificado/index.js"></script>
        <script>
            buscarMonitores();
            buscarDocentesDiscentes();
        </script>
    </div>
</div>
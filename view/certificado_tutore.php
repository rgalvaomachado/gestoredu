<!DOCTYPE html>
<html>
<?php include_once 'head.php'?>
<body style="background-color:white">
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php"><span style="color:green">Atena</span>System</a>
                <a href="http://hubis.com.br/" target="_blank">
                    <img src="public/img/hubis.png" id="logo-hubis">
                </a>
            </div>
        </div>
    </nav>
	<?php include_once 'menu.php'?>
	<center>
		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="background-color:white; margin-top:100px">
			<div class="form">
				<h1>Certificado Tutore</h1>
				
				<label class="message_alert" id="messageAlert"></label>
				<div class="form-group">
					<label>Tutore</label>
					<select class="form-control" id="tutore" name="tutore" onchange="buscarTutore()">
						<option>Selecione o tutore</option>
					</select>
				</div>
				<div class="form-group">
					<label>Data Inicial</label>
					<input id="dataInicial" name="dataInicial" type="date" class="form-control">
				</div>
				<div class="form-group">
					<label>Data Final</label>
					<input id="dataFinal" name="dataFinal" type="date" class="form-control">
				</div>
				<div class="form-group">
					<label>Horas Comissão Administrativa</label>
					<input id="horasAdministrativa" name="horasAdministrativa" type="number" class="form-control">
				</div>
				<div class="form-group">
					<label>Coordenador Docente do Projeto</label>
					<select class="form-control" id="docente" name="docente" onchange="buscarDocente()">
						<option>Selecione o docente</option>
					</select>
				</div>
				<div class="form-group">
					<label>Coordenador Discente do Projeto</label>
					<select class="form-control" id="discente" name="discente"  onchange="buscarDiscente()">
						<option>Selecione o discente</option>
					</select>
				</div>
				<input class="btn btn-md btn-warning" type="button" onclick="gerarCertificadoTutore()" value="Gerar">
			</div>
			<br>
			<br>
			<div id="detalhes">
				<div class="form-group">
					<div id="frente">
						<div id="conteudo">
							<h1 id="titulo" class="tituloCertificado">
								CERTIFICADO
							</h1>
							<div id="corpo">
								Certificamos que <b class="nomeTutore"></b> participou do Subprograma de Extensão Universitária Cursinho Pré Universitário Atena do Instituto de Biociencias da UNESP de Botucatu na condição de <b class="nomeMateria"></b> no periodo de <label class="mesInicial"></label> a <label class="mesFinal"></label> de <label class="anoFinal"></label>.
							</div>
							<table id="assinaturas">
								<tr>
									<td class="assinaturas docente">
										<div id="assinaturaDocente"></div>
										<label class="assinaturas" id="nomeDocente"></label>
										<br>
										<label class="assinaturas">Coordenador Docente do Projeto</label>
									</td>
									<td class="assinaturas discente">
										<div id="assinaturaDiscente"></div>
										<label class="assinaturas" id="nomeDiscente"></label>
										<br>
										<label class="assinaturas">Coordenador Discente do Projeto</label>
									</td>
							</table>
							<div>
								<img id="ibbFrente" src="public/img/ibb.png" />
								<img id="unespFrente" src="public/img/unesp.png" />
							</div>
						</div>
					</div>
					<br>
					<!-- <input class="btn btn-md btn-warning" type="button" onclick="downloadFrenteTutore()" value="Download Frente"> -->
				</div>
				<div class="form-group">
					<div id="verso">
						<div id="conteudo">
							<table id="carga-horaria">
								<tr>
								<th colspan="2" id="AtividadesDesenvolvidas">Atividades Desenvolvidas</th>
								</tr>
								<tr>
									<td><div class="nomeMateria horas"></div></td>
									<td><div class="presencaAulas horas"></div></td>
								</tr>
								<tr>
									<td><div class="horas">Reuniões Burocráticas/Pedagógicas</div></td>
									<td><div class="presencaReuniao horas"></div></td>
								</tr>
								<tr>
									<td><div class="horas">Comissões Administrativas</div></td>
									<td><div class="presencaAdministrativa horas"></div></td>
								</tr>
								<tr>
									<td><b><div class="horas">Total de Horas</div></b></td>
									<td><b><div class="presencaTotal horas"></div></b></td>
								</tr>
							</table>
							<div>
								<img id="ibbVerso" src="public/img/ibb.png" />
								<img id="assinatura-cursinho" src="public/img/assinatura-cursinho.png" />
								<img id="unespVerso" src="public/img/unesp.png" />
							</div>
						</div>
					</div>
					<br>
					<input class="btn btn-md btn-warning" type="button" onclick="downloadVersoTutore();downloadFrenteTutore();" value="Download">
				</div>
			</div>
            <script src="public\js\certificado.js"></script>
            <script src="public\js\jquery-1.11.1.min.js"></script>
            <script src="public\js\bootstrap.min.js"></script>
            <script src="public\js\html2canvas.js"></script>
            <script src="public\js\login.js"></script></script>
			<script>
				buscarTutores();
				buscarRepresentantes();
			</script>
		</div>
	</center>
</body>
</html>
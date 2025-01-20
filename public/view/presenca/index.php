<head>
    <link href="/public/view/presenca/styles.css" rel="stylesheet">
    <script src="/public/view/presenca/index.js"></script>
</head>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/head.php')?>
<div class="grid-content grid-container">
	<?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/menu.php')?>
    <div class="grid-item-content">
        <?php include_once($_SERVER['DOCUMENT_ROOT'].'/public/top.php')?>
        <label class="title">Presença</label>
		<br>
		<label class="message_alert" id="messageAlert"></label>
        <br>
		<table>
            <tbody>
                <tr>
                    <th class="tipos">
						<a href="/presenca/individual">
							Individual
							</br>
							<i class="fa fa-user" aria-hidden="true"></i>
						</a>
                    </th>
                    <th class="tipos">
						<a href="/presenca/listada">
							Listada
							</br>
							<i class="fa fa-users" aria-hidden="true"></i>
						</a>
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
</div>
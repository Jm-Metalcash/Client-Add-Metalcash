<link href="../css/input.form.css?<?= mt_rand() ?>" rel="stylesheet" type="text/css" />

<?php

include 'lang/lang.fr_be.php';

$ERRORTAG = '<div class="errorbox-bad">';

// Traitement du Formulaire
if (isset($_POST['add_client'])) {
	// Formatage
	if ($_POST['entity'] == "") {
		$errorentity1 = $ERRORTAG;
		$errorentity2 = '<div class="errormsg">Ce champ est requis.</div></div>';
		$error = 1;
	} else {
		${'radioentity' . $_POST['entity']} = " checked";
	}

	if ($_POST['idnumber'] == "") {
		$erroridnumber1 = $ERRORTAG;
		$erroridnumber2 = '<div class="errormsg">Ce champ est requis.</div></div>';
		$error = 1;
	} else $_POST['idnumber'] = strtoupper(trim($_POST['idnumber']));

	if ($_POST['expmonth'] != "Mois" && $_POST['expday'] != "Jour" && $_POST['expyear'] != "Ann�e") {
		if (!checkdate($_POST['expmonth'], $_POST['expday'], $_POST['expyear'])) {
			$errorexp1 = $ERRORTAG;
			$errorexp2 = '<div class="errormsg">V�rifier la date.</div></div>';
			$error = 1;
		}
	}

	if ($_POST['name'] == "") {
		$errorname1 = $ERRORTAG;
		$errorname2 = '<div class="errormsg">Ce champ est requis.</div></div>';
		$error = 1;
	} else $_POST['name'] = strtoupper(trim($_POST['name']));

	if ($_POST['surname'] == "") {
		$errorsurname1 = $ERRORTAG;
		$errorsurname2 = '<div class="errormsg">Ce champ est requis.</div></div>';
		$error = 1;
	} else $_POST['surname'] = ucwords(strtolower(trim($_POST['surname'])));
	$fullname = $_POST['name'] . " " . $_POST['surname'];

	// Check if fullname exist
	if (dataprocess(4, "clients", "ID", null, null, "fullname = '" . mysql_real_escape_string($fullname) . "'") > 0) {
		$errorname1 = $ERRORTAG;
		$errorname2 = '<div class="errormsg">D�j� client.</div></div>';
		$errorsurname1 = $ERRORTAG;
		$errorsurname2 = '<div class="errormsg">D�j� client.</div></div>';
		$error = 1;
	}

	if ($_POST['address'] == "") {
		$erroraddress1 = $ERRORTAG;
		$erroraddress2 = '<div class="errormsg">Ce champ est requis.</div></div>';
		$error = 1;
	} else $_POST['address'] = ucfirst(strtolower($_POST['address']));

	if ($_POST['cp'] == "") {
		$errorlocality1 = $ERRORTAG;
		$errorlocality2 = '<div class="errormsg">Ce champ est requis.</div></div>';
		$error = 1;
	} else $_POST['cp'] = ucwords(strtolower($_POST['cp']));

	if ($_POST['country'] == "") {
		$errorcountry1 = $ERRORTAG;
		$errorcountry2 = '<div class="errormsg">Ce champ est requis.</div></div>';
		$error = 1;
	} else $_POST['country'] = strtoupper(trim($_POST['country']));

	if (!checkdate($_POST['birthmonth'], $_POST['birthday'], $_POST['birthyear']) && (is_numeric($_POST['birthmonth']) || is_numeric($_POST['birthday']) || is_numeric($_POST['birthyear']))) {
		$errorbirth1 = $ERRORTAG;
		$errorbirth2 = '<div class="errormsg">V�rifier la date.</div></div>';
		$error = 1;
	} elseif (!is_numeric($_POST['birthmonth']) || !is_numeric($_POST['birthday']) || !is_numeric($_POST['birthyear'])) $noBirthDate = 1;

	if ($_POST['company'] == "" && $_POST['companyvat'] != "") {
		$errorcompany1 = $ERRORTAG;
		$errorcompany2 = '<div class="errormsg">Veuillez indiquer le nom de la soci�t� svp.</div></div>';
		$error = 1;
	} else $_POST['company'] = strtoupper($_POST['company']);

	if ($_POST['company'] != "" && $_POST['companyvat'] == "") {
		$errorvat1 = $ERRORTAG;
		$errorvat2 = '<div class="errormsg">Veuillez inscrire le num�ro de TVA.</div></div>';
		$error = 1;
	} else $_POST['companyvat'] = strtoupper($_POST['companyvat']);

	if (! isset($error)) {
		$docExp = $_POST['expyear'] . "-" . $_POST['expmonth'] . "-" . $_POST['expday'];
		if (isset($noBirthDate)) $birthDate = "NULL";
		else $birthDate = "'" . mysql_real_escape_string($_POST['birthyear']) . "-" . mysql_real_escape_string($_POST['birthmonth']) . "-" . mysql_real_escape_string($_POST['birthday']) . "'";
		if (!empty($_POST['email'])) $email = "'" . mysql_real_escape_string($_POST['email']) . "'";
		else $email = "NULL";
		if (!empty($_POST['phone'])) $phone = "'" . mysql_real_escape_string($_POST['phone']) . "'";
		else $phone = "NULL";
		if (!empty($_POST['company'])) $company = "'" . mysql_real_escape_string($_POST['company']) . "'";
		else $company = "NULL";
		if (!empty($_POST['companyvat'])) $companyvat = "'" . mysql_real_escape_string($_POST['companyvat']) . "'";
		else $companyvat = "NULL";
		dataprocess(1, "clients", "`entity`, `docType`, `docNumber`, `docExp`, `fullName`, `familyName`, `firstName`, `birthDate`, `address`, `locality`, `country`, `email`, `phone`, `company`, `companyvat`, `interest`, `referer`, `regdate`", "'" . mysql_real_escape_string($_POST['entity']) . "', '" . mysql_real_escape_string($_POST['doctype']) . "', '" . mysql_real_escape_string($_POST['idnumber']) . "', '" . mysql_real_escape_string($docExp) . "', '" . mysql_real_escape_string($fullname) . "', '" . mysql_real_escape_string($_POST['name']) . "', '" . mysql_real_escape_string($_POST['surname']) . "', $birthDate, '" . mysql_real_escape_string($_POST['address']) . "', '" . mysql_real_escape_string($_POST['cp']) . "', '" . mysql_real_escape_string($_POST['country']) . "', $email, $phone, $company, $companyvat, '" . mysql_real_escape_string($_POST['interest']) . "', '" . mysql_real_escape_string($_POST['referer']) . "', '" . date("Y-m-d") . "'");
		echo '<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><div align="center" style="color: green; font-size: 14px;"><img src="../imgs/icons/success.png" width="15" height="15"> <b>Client ajout� avec succ�s</b> <p><a href="?a=invoicer&d=' . base64_encode($_POST['name'] . ' ' . $_POST['surname']) . '">Cliquez ici pour faire une facture</a></div></p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>';
		$processed = 1;
	}
}


?>

<? if (!isset($processed)) { ?>

	<div class="infobox">Gestion de clients / Ajouter un nouveau client</div>

	<form autocomplete="off" action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
		<input type="hidden" name="entity" value="1">

		<fieldset>
			<legend>Identification</legend>
			<div class="nice-form-group">
				<label>Nom de Famille</label>
				<input style="text-transform:uppercase;" type="text" placeholder="Ex. DUPONT" />
			</div>

			<div class="nice-form-group">
				<label>Pr�nom</label>
				<input type="text" placeholder="Ex. Jean" />
			</div>
		</fieldset>

		<p>&nbsp;</p>

		<table border=0 cellpadding=5 cellspacing=5>

			<tr>
				<td>Doc. Type/ID/Exp:</td>
				<td><select name="doctype">
						<option value="1">Carte d'identit�</option>
						<option value="2">Passeport</option>
						<option value="3">Permis</option>
						<option value="4">Autre</option>
					</select><?= $erroridnumber1 ?><input type="text" name="idnumber" size=20 value="<?= $_POST['idnumber'] ?>"><?= $erroridnumber2 ?>
					<?= $errorexp1 ?>
					<select name="expday" id="expday" class="register" style="width: 75px;"><? if (isset($_POST['expday'])) { ?><option value="<?= $_POST['expday'] ?>"><?= $_POST['expday'] ?></option><? } else { ?><option value="<?= REGISTER_DAY ?>"><?= REGISTER_DAY ?></option><? } ?><? for ($i = 1; $i <= 31; $i++) { ?><option value="<?= $i ?>"><?= $i ?></option><? } ?></select>
					<select name="expmonth" id="expmonth" class="register" style="width: 75px;"><? if (isset($_POST['expmonth'])) { ?><option value="<?= $_POST['expmonth'] ?>"><?= $_POST['expmonth'] ?></option><? } else { ?><option value="<?= REGISTER_MONTH ?>"><?= REGISTER_MONTH ?></option><? } ?><? for ($i = 1; $i <= 12; $i++) { ?><option value="<?= $i ?>"><?= $i ?></option><? } ?></select>
					<select name="expyear" id="expyear" class="register" style="width: 83px;"><? if (isset($_POST['expyear'])) { ?><option value="<?= $_POST['expyear'] ?>"><?= $_POST['expyear'] ?></option><? } else { ?><option value="<?= REGISTER_YEAR ?>"><?= REGISTER_YEAR ?></option><? } ?><? for ($i = 0; $i <= 15; $i++) { ?><option value="<?= date("Y") + $i ?>"><?= date("Y") + $i ?></option><? } ?></select>
					<?= $errorexp2 ?>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td>Nom / Pr�nom:</td>
				<td><?= $errorname1 ?><input style="text-transform:uppercase;" type="text" name="name" size=35 value="<?= $_POST['name'] ?>"><?= $errorname2 ?> <?= $errorsurname1 ?><input type="text" name="surname" size=39 value="<?= $_POST['surname'] ?>"><?= $errorsurname2 ?></td>
				<td>Ex: DUPONT Jean</td>
			</tr>
			<tr>
				<td>Date de naissance:</td>
				<td><?= $errorbirth1 ?>
					<select name="birthday" id="birthday" class="register" style="width: 75px;"><? if (isset($_POST['birthday'])) { ?><option value="<?= $_POST['birthday'] ?>"><?= $_POST['birthday'] ?></option><? } else { ?><option value="<?= REGISTER_DAY ?>"><?= REGISTER_DAY ?></option><? } ?><? for ($i = 1; $i <= 31; $i++) { ?><option value="<?= $i ?>"><?= $i ?></option><? } ?></select>
					<select name="birthmonth" id="birthmonth" class="register" style="width: 75px;"><? if (isset($_POST['birthmonth'])) { ?><option value="<?= $_POST['birthmonth'] ?>"><?= $_POST['birthmonth'] ?></option><? } else { ?><option value="<?= REGISTER_MONTH ?>"><?= REGISTER_MONTH ?></option><? } ?><? for ($i = 1; $i <= 12; $i++) { ?><option value="<?= $i ?>"><?= $i ?></option><? } ?></select>
					<select name="birthyear" id="birthyear" class="register" style="width: 83px;"><? if (isset($_POST['birthyear'])) { ?><option value="<?= $_POST['birthyear'] ?>"><?= $_POST['birthyear'] ?></option><? } else { ?><option value="<?= REGISTER_YEAR ?>"><?= REGISTER_YEAR ?></option><? } ?><? for ($i = 18; $i < 85; $i++) { ?><option value="<?= date("Y") - $i ?>"><?= date("Y") - $i ?></option><? } ?></select>
					<?= $errorbirth2 ?>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td>Adresse:</td>
				<td><?= $erroraddress1 ?><input type="text" name="address" size=81 value="<?= $_POST['address'] ?>"><?= $erroraddress2 ?></td>
				<td>Ex: Rue du puit, 12</td>
			</tr>
			<tr>
				<td>Localit�:</td>
				<td><?= $errorlocality1 ?><input type="text" name="cp" size=81 value="<?= $_POST['cp'] ?>"><?= $errorlocality2 ?></td>
				<td>Ex: 4800 Verviers</td>
			</tr>
			<tr>
				<td>Pays:</td>
				<td><?= $errorcountry1 ?><input style="text-transform:uppercase;" type="text" name="country" size=81 value="<?= $_POST['country'] ?>"><?= $errorcountry2 ?></td>
				<td>Ex: Belgique</td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td>E-Mail:</td>
				<td><input type="text" name="email" size=81 value="<?= $_POST['email'] ?>"></td>
				<td>Ex: contact@metalcash.be</td>
			</tr>
			<tr>
				<td>T�l�phone:</td>
				<td><input type="text" name="phone" size=81 value="<?= $_POST['phone'] ?>"></td>
				<td>Ex: 0032 474 01 12 93</td>
			</tr>
			<tr>
				<td>Canal:</td>
				<td><select name="referer">
						<option value="1">Recherche Internet</option>
						<option value="2">Recommendation d'un ami</option>
						<option value="4">D�j� client</option>
						<option value="5">Autre</option>
					</select></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Int�r�t:</td>
				<td><select name="interest">
						<option value="1">Etain</option>
						<option value="2">M�tal argent�</option>
						<option value="3">D3E</option>
						<option value="4">Catalyseurs</option>
						<option value="10">Tout</option>
					</select></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td>Soci�t�:</td>
				<td><?= $errorcompany1 ?><input style="text-transform:uppercase;" type="text" name="company" size=81 value="<?= $_POST['company'] ?>"><?= $errorcompany2 ?></td>
				<td><i>Facultatif</i></td>
			</tr>
			<tr>
				<td>TVA:</td>
				<td><?= $errorvat1 ?><input style="text-transform:uppercase;" type="text" name="companyvat" size=81 value="<?= $_POST['companyvat'] ?>"><?= $errorvat2 ?></td>
				<td><i>Facultatif</i></td>
			</tr>
		</table>
		<p>
		<div align="center" style="color: red">NE PAS OUBLIER DE SCANNER UNE PHOTO DE LA PIECE D'IDENTIT�</div>
		<p>
		<div align="center"><input class="submit" type="submit" name="add_client" value="Ajouter le client"></div>
	</form>
<? } ?>
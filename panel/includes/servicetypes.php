<?php include_once("../includes/config.php"); ?>
<?php $listIl = $db->query("SELECT * FROM service_types WHERE service_id = '$_POST[service_id]'"); ?>
<option value="0">Genel</option>
<?php foreach ($listIl as $list) { ?>
    <option value="<?=$list['id']?>"><?=$list['type_name']?></option>
<?php } ?>

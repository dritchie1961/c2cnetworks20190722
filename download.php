<?php
$fname = $_REQUEST["fileName"];
// $data = file_get_contents("storage/".$fname);
$data = file_get_contents("files/" . $fname);

header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=\"" . $fname . "\"");
header("Content-Length: " . strlen($data));

echo $data;
?>
    
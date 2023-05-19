<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $purpose = $_POST['purpose']; // Get the selected purposes
  $collectionName = $_POST['collectionName']; // Get the collection name
  $remark = $_POST['remark']; // Get the remark

  $data = "Selected Purposes: " . implode(', ', $purpose) . "\n";
  $data .= "Collection Name: " . $collectionName . "\n";
  $data .= "Remark: " . $remark . "\n\n";

  $filename = 'form_data.txt';
  file_put_contents($filename, $data, FILE_APPEND | LOCK_EX); // Save data to file

  echo "Form data has been saved.";
}
?>
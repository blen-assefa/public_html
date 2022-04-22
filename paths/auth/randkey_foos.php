<?php
function checkKeys($db, $randInt) {
  $keySearch = "SELECT * FROM keystring";
  $result = mysqli_query($db, $keySearch);
  while ($row = mysqli_fetch_assoc($result)) {
    if ($row['keystringKey'] == $randInt) {
      $keyExists = true;
      break;
    } else {
      $keyExists = false;
    }
  }
  return $keyExists;
}

function generateKey($db) {
  $keyLength = 6;
  $str = "0123456789";
  $randStr = substr(str_shuffle($str), 0, $keyLength);
  $int_value = intval( $randStr );
  $checkKey = checkKeys($db, $int_value);
  while ($checkKey == true) {
    $randStr = substr(str_shuffle($str), 0, $keyLength);
    $int_value = intval( $randStr );
    $checkKey = checkKeys($db, $int_value);
  }
  return $int_value;
}
?>
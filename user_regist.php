<?php
/* Get parameters from input form*/
$formList = array('mode', 'input_userid', 'input_password', 'input_name', 'input_email');

foreach($formList as $value) {
  $$value = $_POST[$value];
}

$error = array();

require_once('db.php');


/* User ID Check */
$query = "select userid from members where userid = '$input_userid'";
$resultId = mysqli_query($query);

if(mysqli_num_rows($resultId) > 0 ) {
  array_push($error,"This User ID already exists.");
}

if(count($error) == 0) {
  mysqli_query("begin");
  $query = "insert into members(userid, password, name, email) values('$input_userid','$input_password','$input_name','$input_email')";
  $result = mysql_query($query);
  if($result){
    mysqli_query("commit");

    /* Send Confirmation E-mail.*/
    mb_language("english");
    mb_internal_encoding("utf-8");
    $to = $input_email;
    $subject = "User Registration Confirmation.";
    $message = "Thank you for registration.\n"."Your User ID is [$input_userid].";
    $header = "From:test@test.com";

    if(!mb_send_mail($to, $subject, $message, $header)) {
      array_push($error,"Could not send e-mail.<br>However, your registration is completed.");
    }
  } else {
    mysqli_query("rollback");
    array_push($error, "Could not register with database.");
  }
}
if(count($error) == 0) {
?>
<table>
  <caption>Registration Completed.</caption>
  <tr>
    <td class="item">Thanks:</td>
    <td>Thank you for registration.<br>Please check the confirmation e-mail.</td>
  </tr>
</table>
<?php
} else {
?>

<table>
  <caption>Database Registration Error</caption>
  <tr>
  <td class="item">Error:</td>
  <td>
  <?php
  foreach($error as $value) {
    print $value;
  ?>
  </td>
  </tr>
</table>
<?php
  }
}
?>

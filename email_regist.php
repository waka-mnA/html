<?php
/*Get email address from form*/
$email = $_POST["email"];
/*Error message*/
$error = array();
require("db.php");

/*Email Address Check*/
if ($email == ""){
  array_push($error, "Please enter your e-mail address.");
}
else{
  //Generate pre user id
  $pre_user_id = uniqid(rand(100,999));

  //SQL
  $query = "insert into members (pre_userid, email) values('$pre_user_id', '$email')";
  $result = mysqli_query($conn, $query);

  //Check it is registered successfully
  if($result == false) {
    array_push($error, " Database Registration Failed.");
  }
  else {
    $to = $email;
    $subject = "PhotoShare Registration";
    $message = "Click URL below to finish your registration.\n".
    "http://52.56.67.132/index.php?pre_userid=$pre_user_id"; //localhost:8888
    $header = "From PhotoShare.com"."\r\n";

    if(!mail($to, $subject, $message, $header)) {
      array_push($error,"Could not send <a href='http://52.56.67.132/index.php?pre_userid=$pre_user_id'>e-mail.</a>");
    }
  }
}

/*Check the error*/
if(count($error) > 0) {
  /*Display the error*/
  foreach($error as $value) {
    ?>
    <table>
    <caption>E-mail Registration Error</caption>
    <tr>
      <td class="item">Error: </td>
      <td><?php print $value; ?></td>
    </tr>
  </table>
  <?php
  }  //foreach

} else {  //No error
?>
<table>
  <caption>E-mail Sent Successfully.</caption>
  <tr>
    <td class="item">To:</td>
    <td><?php print $email ?></td>
  </tr>
</table>
<?php
}

?>

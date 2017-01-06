<?php
/* Get parameters from input form*/
$formList = array('mode','pre_userid','input_userid','input_password','input_name','input_email');

/* Required*/
$requireList = array('mode','input_userid','input_password','input_name');

/* Store them in variables*/
foreach($formList as $value) {
  $$value = $_POST[$value];
}

$error = array();

/* Input Check */
foreach($requireList as $value) {
  if($$value == "") {
    array_push($error,"Please enter all columns.");
    break;
  }
}

/* Password */
if(strlen($input_password) < 6 || strlen($input_password) > 16) {
  array_push($error,"Password needs to be more than 5 letters and less than 17 letters.");
}
?>
<div class="error-msg">
<?php

if(count($error) > 0) {
  require_once("regist_form.php");
?>
</div>
<?php
} else {
?>
<form method="post" action="index.php">
  <input type="hidden" name="mode" value="user_regist">
  <table>
    <caption>Confirm your information</caption>
    <tr>
      <td class="item">Username:</td>
      <td><?php print $input_userid;?><input type="hidden" name="input_userid" value="<?php print $input_userid;?>"></td>
    </tr>
    <tr>
      <td class="item">Password:</td>
      <td><?php print $input_password;?><input type="hidden" name="input_password" value="<?php print $input_password;?>"></td>
    </tr>
    <tr>
      <td class="item">Name:</td>
      <td><?php print $input_name;?><input type="hidden" name="input_name" value="<?php print $input_name;?>"></td>
    </tr>
    <tr>
      <td class="item">E-mail Address:</td>
      <td><?php print $input_email;?><input type="hidden" name="input_email" value="<?php print $input_email;?>"></td>
    </tr>
  </table>
  <div><input type="submit" value="Confirm"></div>
</form>
<?php
}
?>

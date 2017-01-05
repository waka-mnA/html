<?php
/*Get pre_userid*/
if($mode == "regist_form") {
  $pre_userid = $_GET['pre_userid'];
}
/* pre_userid Validation Check */
$errorFlag = true;
/* Database Connection Setting */
require_once("db.php");

/* Use unique id to get registered email address */
$query = "select email from members where pre_userid = '$pre_userid'";
$result = mysql_query($query);

/*Display retrieved address*/
if(mysql_num_rows($result) > 0) {
  $errorFlag = false;
  $data = mysql_fetch_array($result);
  $email = $data['email'];
}

if($errorFlag) {  // pre_userid is invalid
?>
<table>
  <caption>E-mail Registration Error</caption>
  <tr>
    <td class="item">Error：</td>
    <td>This URL is unavailable.<br>Please try E-mail registration again.<br> <a href="index.php">Go Back</a></td>
  </tr>
</table>
<?php
} else { // pre_userid is valid
  // regist_confirm error
  if(count($error) > 0) {
    foreach($error as $value) {
    print $value."<br>";
    }
  }
?>
<form method="post" action="index.php">
  <input type="hidden" name="mode" value="regist_confirm">
  <input type="hidden" name="pre_userid" value="<?php print $pre_userid; ?>">
  <table>
    <caption>User Registration Form</caption>
    <tr>
      <td class="item">Username:</td>
      <td><input type="text" size="30" name="input_userid" value="<?php print $input_userid; ?>"></td>
    </tr>
    <tr>
      <td class="item">Password:</td>
      <td><input type="text" size="30" name="input_password" value="<?php print $input_password; ?>">&nbsp;&nbsp;* Needs to be more than 5 letters and less than 17 letters.</td>
    </tr>
    <tr>
      <td class="item">Name:</td>
      <td><input type="text" size="30" name="input_name" value="<?php print $input_name; ?>"></td>
    </tr>
    <tr>
      <td class="item">E-mail:</td>
      <td><?php print $email; ?><input type="hidden" name="input_email" value="<?php print $email; ?>"></td>
    </tr>
  </table>
  <div><input type="submit" value="Submit"></div>
</form>
<?php
}
?>

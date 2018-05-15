<?php
include_once 'includes/db_connect.php';

include_once 'includes/functions.php';

session_start();
if (isset($_POST['update']))
  {
  $id = $_POST['id'];
  $voucher = $_POST['voucher'];
  // checking empty fields
  if (empty($voucher))
    {
    if (empty($voucher))
      {
      echo "<font color='red'>Name field is empty.</font><br/>";
      }
    }
    else
    {
    // updating the table
    $result = mysqli_query($mysqli, "UPDATE vouchers SET voucher='$voucher' WHERE id=$id");
    // redirectig to the display page. In our case, it is index.php
    header("Location: protected_page.php");
    }
  }
?>
<?php
// getting id from url
$id = $_GET['id'];
// selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM vouchers WHERE id = $id");
while ($res = mysqli_fetch_array($result))
  {
  $voucher = $res['voucher'];
  }
?>

<html>
  <head>    
    <title>Edit Data
    </title>
  </head>
  <body>
    <a href="protected_page.php">Back to Admin Control Page
    </a>
    <br/>
    <br/>
    <form name="form1" method="post" action="editvoucher.php">
      <table border="0">
        <tr> 
          <td>New Voucher Code
          </td>
          <td>
            <input type="text" name="voucher" value="<?php echo $voucher;?>">
          </td>
        </tr>
        <tr>
          <td>
            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
          </td>
          <td>
            <input type="submit" name="update" value="Update">
          </td>
        </tr>
      </table>
    </form>
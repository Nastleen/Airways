    <?php
include_once 'includes/db_connect.php';

include_once 'includes/functions.php';

session_start();
$id = $_GET['id'];

// deleting the row from table
// checking empty fields

if (empty($id))
    {
    if (empty($id))
        {
        echo "<font color='red'>voucher id is empty.</font><br/>";
        }

    // link to the previous page

    echo "<br/><a href='~Airways/protected_page.php'>Go Back</a>";
    }
  else
    {

    // if all the fields are filled (not empty)
    // insert data to database

    $result = mysqli_query($mysqli, "DELETE FROM vouchers WHERE id = '$id' ");

    // display success message

    echo "<font color='green'>Data added successfully.";
    echo "<br/><a href='protected_page.php'>Back to Admin Page.</a>";
    }

?>
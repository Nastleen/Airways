    <?php
include_once 'includes/db_connect.php';

include_once 'includes/functions.php';

session_start();

if (isset($_POST['SubmitVoucher']))
    {
    $voucher = $_POST['voucher'];

    // checking empty fields

    if (empty($voucher))
        {
        if (empty($voucher))
            {
            echo "<font color='red'>voucher field is empty.</font><br/>";
            }

        // link to the previous page

        echo "<br/><a href='Airways/protected_page.php'>Go Back</a>";
        }
      else
        {

        // if all the fields are filled (not empty)
        // insert data to database

        $result = mysqli_query($mysqli, "INSERT INTO vouchers (voucher) VALUES('$voucher')");

        // display success message

        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='protected_page.php'>Back to Admin Page.</a>";
        }
    }

?>
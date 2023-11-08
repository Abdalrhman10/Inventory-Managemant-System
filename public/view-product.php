<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: ../index.php");
    exit;
}

require_once '../config/connect.php';

$id = $_GET['id'];
$sql = "SELECT * FROM products INNER JOIN suppliers ON products.supplier_id=suppliers.id  WHERE products.id='$id'";
$result = $con->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/CSS/main.css">
    <title>Inventory Manager | View <?php $row['product_name']; ?></title>
    <meta name="description" name="">
</head>

<body>
    <div class="dashboard-container">
        <?php include_once '../include/navbar.php'; ?>
        <main class="main-content">
            <h1><?php echo $ow['product_name']; ?></h1>
            <div class="form-container">
                <form>
                    
                </form>
            </div>
        </main>
    </div>
</body>

</html>

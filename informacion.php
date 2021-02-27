<?php
$con =  mysqli_connect("localhost", "root", "", "banco1");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <table border='1'>
   <thead>
            <tr>
                <td>Nro_cuenta</td>
                <td>Cedula</td>
                <td>Saldo</td>
            </tr>
        </thead>
        <?php
        $sql = "SELECT * FROM cuenta";
        $resultado = mysqli_query($con,$sql); 
        while ($mostrar=mysqli_fetch_array($resultado)){
            ?>

            <tr>
                <td><?php echo $mostrar['n_cuenta'] ?></td>
                <td><?php echo $mostrar['cliente'] ?></td>
                <td><?php echo $mostrar['saldo'] ?></td>
            </tr>
        <?php
        }
        ?>
   </table>
</body>
</html>
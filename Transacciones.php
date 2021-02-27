<?php
$cliente1= $_POST['Cuenta_cliente'];
$cliente2= $_POST['Cuenta_destinatario'];
$cliente3= $_POST['monto'];
?>

<?php

try {
  $mbd = new PDO('mysql:host=localhost;dbname=banco1','root','',
      array(PDO::ATTR_PERSISTENT => true));
  echo "Conectado\n";
} catch (Exception $e) {
  die("No se pudo conectar: " . $e->getMessage());
}

try {  
  $mbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $mbd->beginTransaction();
  $mbd->exec("UPDATE cuenta SET saldo=saldo-$cliente3 WHERE n_cuenta=$cliente1");
  $mbd->exec("UPDATE cuenta SET saldo=saldo+$cliente3 WHERE n_cuenta=$cliente2"); 
      
  $mbd->commit();
  
} catch (Exception $e) {
  $mbd->rollBack();
  echo "Fallo: " . $e->getMessage();
}
header("Status: 301 Moved Permanently");
		header("Location: informacion.php");
		exit;
?>
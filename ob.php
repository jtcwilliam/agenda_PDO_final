 ob_start();

 ?>


 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

 </head>

 <body style="font-family: Arial, Helvetica, sans-serif;">
     <center>
         <h2>Olá, vamos redefinir sua senha! </h2>


         <a style="color: green;" href="redefinirSenha.php" target="_blank">
             <h4>Clique aqui para alterar sua senha com segurança</h4>
         </a>
         <br>

         <img src="https://agendafacil.guarulhos.sp.gov.br/imgs/logoFacilTransparente.png" style="width: 10%;" />

     </center>
 </body>

 </html>
 <?php
    $dados = ob_get_contents();
    ob_end_clean();
    echo $dados;

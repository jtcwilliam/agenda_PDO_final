<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="ajax/arquivosController.php" method="post" enctype="multipart/form-data">

        <input type="file" name="arquivo" id="arquivo" value="Enviar arquivo" />
        <input type="submit" value="enviar" />

        <?php

              ini_set('display_errors',1);
  ini_set('display_startup_erros',1);
  error_reporting(E_ALL);
            
         



   // echo '<img  style= "height: 100vh"src="data:image/png;base64,'.base64_encode($arquivo[0]['arquivo']).'"/>';

              
 
        ?>


    </form>
</body>

</html>
 
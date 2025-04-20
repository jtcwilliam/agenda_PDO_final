<?php

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');



for ($i=0; $i < 12 ; $i++) { 
    
    echo date('Y-m-d '.$i.':00',strtotime("+1 week  7 minutes"));


    //$date = date('Y-m-d H:i', strtotime('+'.$i.' hours'));
    echo $date .'<br>';



}


$date = date('Y-m-d H:i', strtotime('+0 minutes'));
echo $date;
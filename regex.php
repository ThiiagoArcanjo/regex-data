<?php

    $search = "17/02/2023 15:00";
    $search2 = "15:00 17/02/2023";
    $dtSearch = null;
    try {
        // * Verificando se é  uma regex de data
        if (preg_match('/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/', $search, $matches)) {
             $dtSearch = $matches[3] . '-' . $matches[2] . '-' . $matches[1]."%";
             echo $dtSearch;
        }

        // * Verificando se é uma regex de hora
        if (preg_match('/^([0-9]{2})\:([0-9]{2})$/', $search, $matches)) {
            
            $dtSearch = "%".$matches[1] . ':' . $matches[2]."%";
            echo $dtSearch;
        }
        
        // Verificando se é uma regex de data e hora
        if (preg_match('/^([0-9]{2})\/([0-9]{2})\/([0-9]{4}\s[0-9]{2})\:([0-9]{2})$/', $search, $matches)) {
            var_dump($matches);
            echo "<br>";
            $dtSearch = "%".substr($matches[3],0,-3) . '-' . $matches[2]. '-' .$matches[1]. ' ' .substr($matches[3],5) .':' .$matches[4]."%";
            echo $dtSearch;
            echo "<br>Teste<br>";
        }

        //Verificando se é uma rgex de hora e data
        if (preg_match('/^([0-9]{2})\:([0-9]{2}\s[0-9]{2})\/([0-9]{2})\/([0-9]{4})$/', $search2, $matches)) {
            var_dump($matches);
            echo "<br>";
            $dtSearch = "%".$matches[4] .'-' .$matches[3]. '-'.substr($matches[2],3).' '.($matches[1]).':' .substr($matches[2],0,2)."%";
            echo $dtSearch;
        }


         //* Verificando se é  uma regex de data e hora ou hora e data
    } catch (\Throwable $th) {
         $dtSearch = null;
         echo $th;
    } 

?>
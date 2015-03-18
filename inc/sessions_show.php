<?php

//$msg = (isset($_GET['msg']) ? $_GET['msg'] : "");
session_start();
echo "SESSION ACTIVEE\n";

/*
echo "<br><br>SERVER<br><br>";
echo "<pre>";
print_r($_SERVER);
echo "</pre>";

echo "<br><br>ENV<br><br>";
print_r($_ENV);

*/
$poursuivre = false;

 if( isset($_SESSION['msg']) && !empty($_SESSION['msg'])){

    $poursuivre = true;

}


                function  afficher_msg($code,$type,$lib) {

                    echo "<p><b>Code :</b> ".$code.", <b>Type :</b> ".$type.", <b>Lib :</b> ".$lib." </p>"."\n";

                }


                if ($poursuivre) {

                    
                        
                    
                    /*
                        echo "<pre>";
                        print_r($_SESSION['msg']);
                        echo "</pre>";
                    */

                        foreach ($_SESSION['msg'] as $valeur) { 

                            //print_r($valeur);
                            //break;
                            //echo $key;
                            //echo "<br>".$valeur;

                            $code = $valeur['code'];
                            $type = $valeur['type'];
                            $lib = $valeur['lib'];

                            afficher_msg($code,$type,$lib); 


                        }


                }



        ?>



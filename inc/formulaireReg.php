 <?php

                   if(!empty($_POST))
                        {
                        echo "Titre : ".$_POST['titre'];
                        echo "<br>Nom : ".$_POST['nom'];
                        echo "<br>Prénom : ".$_POST['prenom'];
                        echo "<br>Sexe : ".$_POST['sexe'];
                        echo "<br>Date de Naissance : ".$_POST['datenaissance'];
                        echo "<br>eMail : ".$_POST['email'];


                        //print_r($_FILES);
                        
                        if (isset($_FILES['photo'])) {
                            //$_FILES['photo']['name']ou name est le nom de la photo transmise


                            $autorises = array('gif','jpg','png');
                            $nomfichier = $_FILES['photo']['name'];
                            $ext = strtolower(pathinfo($nomfichier,PATHINFO_EXTENSION));


                            $uploaddir = "image/tmp/";
                            $uploadfile = $uploaddir.basename($_FILES['photo']['name']);

                            //echo $uploadfile;
                            if ($_FILES['photo']['error'] > 0) {
                                echo "<br>Erreur lors du transfert de la photo<br>";}
                            else {

                                    if (in_array($ext, $autorises)) {
                                    $uploadfile = "image/";
                                    $nom = "avatar.jpg";
                                    //$_FILES['photo']['name']ou name est le nom temporaire généré aléatoirement de la photo transmise
                                    $resultat = move_uploaded_file($_FILES['photo']['tmp_name'],$uploadfile.$nom);
                                    if ($resultat) {echo  "<br>Photo transfert réussi<br>";}
                                    }
                            }

                        }

                    



                        

                        }
                    
                    ?>

                    
            <pre>
                    <?php //print_r($_POST); ?>
            </pre>
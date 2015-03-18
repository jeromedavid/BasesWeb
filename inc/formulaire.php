        <form action="index.php?page=formReg" method="POST" accept-charset="utf-8" name="form" enctype="multipart/form-data" class="form-style-6">
            
            <h2>Formulaire</h2>
            
             <fieldset>
                <legend>Etat Civil</legend>
                    
                    <select name="titre" id="titre">
                      <option value="M.">Monsieur</option> 
                      <option value="Mme" selected>Madame</option>
                      <option value="Mlle">Mademoiselle</option>
                    </select>
                
                    <br><br>
                    
                    <input type="radio" name="sexe" value="H">Homme
                    <input type="radio" name="sexe" value="F">Femme
                    <br><br>

                    <label for="nom">Nom</label><input type="text" name="nom" id="nom" placeholder="Saisir le nom"><br><br>
                    <!-- PLUS PROPRE AVEC LABEL FOR -->
                    <label for="prenom">Prénom</label><input type="text" name="prenom" id="prenom" ><br><br>

                    <label for="datenaissance">Date de Naissance</label><input type="text" name="datenaissance" id="datenaissance" ><br><br>
            </fieldset>
            <br>
            <fieldset>
                <legend>Données perso</legend>            
            <label for="email">eMail</label><input type="text" name="email" id="email" onchange="form.email2.pattern = this.value" ><br><br>
            <label for="email2">Verif eMail</label><input type="text" name="email2" id="email2" /><br><br>
            <label for="photo">Photo de profil</label><input type="file" name="photo" id="photo"><br><br>
            <label for="tel">Téléphone</label><input type="text" name="tel" id="tel" pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$"><br><br>
            </fieldset>
            <br>
            <fieldset>
                <legend>Autre</legend>      
            <br>
            Adresse Site&nbsp;<input type="text" name="adr_site" id="adr_site" ><br><br>
            <label for="presentation">Présentation</label>&nbsp;<textarea id="presentation" name="presentation"></textarea><br><br>
            Abonnement Newsletter&nbsp;<INPUT type="checkbox" name="newsY" id="newsY" value="1" checked >
            </fieldset>
            <br>
            <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000"> -->
            <input type="submit" value="OK">
                
            
        </form>
        
        <div>
            <div></div>
            <div></div>
        </div>
        
<script src="Plugin/Pikaday-master/moment.js"></script>      
<script src="Plugin/Pikaday-master/pikaday.js"></script>

<script>
    var picker = new Pikaday({
        field: document.getElementById('datenaissance'),
        format: 'D MMM YYYY',
        onSelect: function() {
            console.log(this.getMoment().format('Do MMMM YYYY'));
        }
    });
</script>  

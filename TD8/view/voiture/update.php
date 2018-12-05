<form method="post" action="index.php?action=<?php echo $target_action;?>">
    <fieldset>
        <legend>Mon formulaire :</legend>
        <p>
            <label for="immat_id">Immatriculation</label> :
            <input type="text" placeholder="Ex : 256AB34" name="immatriculation" id="immat_id" value="<?php echo htmlspecialchars($v->getImmatriculation()); ?>" <?php echo $modifier;?>/>
        </p>

        <p>
            <label for="marque_id">Marque</label> :
            <input type="text" placeholder="Ex : Renault" name="marque" id="marque_id" value="<?php echo htmlspecialchars($v->getMarque());?>" required/>
        </p>

        <p>
            <label for="couleur_id">Couleur</label> :
            <input type="text" placeholder="Ex : bleu" name="couleur" id="couleur_id" value="<?php echo htmlspecialchars($v->getCouleur()); ?>"required/>
        </p>

        <p>
            <input type="hidden" value="<?php echo static::$object;?>" />
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>
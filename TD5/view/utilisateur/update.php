<form method="post" action="index.php?controller=utilisateur&action=<?php echo $target_action;?>">
    <fieldset>
        <legend>Mon formulaire :</legend>
        <p>
            <label for="login_id">Login</label> :
            <input type="text" placeholder="Ex : J.D." name="login" id="login_id" value="<?php echo htmlspecialchars($v->get('login')); ?>" <?php echo $modifier;?>/>
        </p>

        <p>
            <label for="name_id">Nom</label> :
            <input type="text" placeholder="Ex : Dupont" name="nom" id="name_id" value="<?php echo htmlspecialchars($v->get('nom'));?>" required/>
        </p>

        <p>
            <label for="firstname_id">Prenom</label> :
            <input type="text" placeholder="Ex : Jean" name="prenom" id="firstname_id" value="<?php echo htmlspecialchars($v->get('prenom'));?>"required/>
        </p>

        <p>
            <input type="hidden" value="<?php echo static::$object;?>" />
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>
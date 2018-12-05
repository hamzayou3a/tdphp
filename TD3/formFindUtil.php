<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Formulaire</title>
    </head>

    <body>
        <form method="get" action="testFindUtil.php">
            <fieldset>
                <legend>Find :</legend>
                <p>
                    <label for="id">Id du trajet</label> :
                    <input type="text" placeholder="Ex : 42" name="trajet_id" id="id" required/>
                </p>

                <p>
                    <input type="submit" value="Envoyer" />
                </p>
            </fieldset>
        </form>
    </body>
</html>
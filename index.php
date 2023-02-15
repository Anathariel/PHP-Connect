<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection PHP</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    if (isset($_POST['submit'])) {
        $pseudo = $_POST['pseudo'];
        $password = $_POST['password'];

        $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root');
        $sql = "SELECT * FROM `user` WHERE `pseudo`= '$pseudo'";
        $req = $db->query($sql);
        $reqFetch = $req->fetch(PDO::FETCH_ASSOC);
        
        if($req->rowCount() > 0 && $reqFetch['password'] == $password){
            $session = true;
            echo '<h1>Bienvenue ' . $reqFetch['pseudo'] . '</h1>';
        }
    }
    if(!isset($session)){
    ?>
    <form action="#" method="POST">
        <fieldset>
            <legend>Connection</legend>
            <div>
                <label for="pseudo">Pseudonyme</label>
                <input type="text" name="pseudo" id="pseudo">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
        </fieldset>
        <fieldset>
            <legend>Reset / Connect</legend>
            <input type="reset" name="reset">
            <input type="submit" name="submit" value="Connect">
        </fieldset>
    </form>
    <?php } ?>
</body>

</html>
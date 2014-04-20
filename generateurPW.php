<?php

if(isset($_POST['generatepw']) && $_POST['generatepw'] === 'Générer' && isset($_POST['caracternumber']) && $_POST['caracternumber'] != '') {

    if($_POST['uppercase'] != 'on' && $_POST['lowercase'] != 'on' && $_POST['number'] != 'on' && $_POST['special'] != 'on') {
        echo "Il faut cocher au moins une option";
    } else {
        $chaine = "";

        if(isset($_POST['uppercase']) && $_POST['uppercase'] === 'on') {
            $chaine .= "ABCDEFGHJKMNPQRSTUVWXYZ";
        }
        if(isset($_POST['lowercase']) && $_POST['lowercase'] === 'on') {
            $chaine .= "abcdefghjkmnpqrstuvwxyz";
        }
        if(isset($_POST['number']) && $_POST['number'] === 'on') {
            $chaine .= "23456789";
        }
        if(isset($_POST['special']) && $_POST['special'] === 'on') {
            $chaine .= "*$%!:;.,?&(-_)=#{[@]}";
        }

        $nb_caract = $_POST['caracternumber'];
        // on fait une variable contenant le futur pass

        $pass = generate($nb_caract, $chaine);

        if($_POST['uppercase'] == 'on') {
            while(!strpbrk($pass, "ABCDEFGHIJKLMNOPQRSTUVWXYZ")){
                $pass = generate($nb_caract, $chaine);
            }
        }
        if($_POST['lowercase'] == 'on') {
            while(!strpbrk($pass, "abcdefghijklmnopqrstuvwxyz")){
                $pass = generate($nb_caract, $chaine);
            }
        }
        if($_POST['number'] == 'on') {
            while(!strpbrk($pass, "0123456789")){
                $pass = generate($nb_caract, $chaine);
            }
        }

        if($_POST['special'] == 'on') {
            while(!strpbrk($pass, "*$%!:;.,?&(-_)=#{[|@]}")){
                $pass = generate($nb_caract, $chaine);
            }
        }

        echo $pass;
    }
} else {
    header("Location: /");
}

function generate($nb_caract, $chaine){
    $pass = "";

    $i = 1;
    //on fait une boucle
    while($i <= $nb_caract) {
        $nb = strlen($chaine);
        $nb = mt_rand(0,($nb-1));
        $pass.=$chaine[$nb];
        $i++;
    }

    return $pass;
}
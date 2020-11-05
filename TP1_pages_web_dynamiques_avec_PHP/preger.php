<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expressions régulières</title>
</head>
<body>
    <?php
        $r = preg_match_all("|<([^>]+)>([^<]*)</[^>]+>|",
                '<b>exemple : </b><i>preg_match_all</i>',
                $regs);
        echo $r."\n";
        print_r($regs);
    ?>
    <p><b>Exo 11, 1 - analyse de motifs</b></p>
    <p><b>a)</b>  2[0-9]{3} <i>tous le nombre de 2000 à 2999</i></p>
    <p><b>b)</b>  [A-Z][a-z]+  <i>les mots ayant >= 2 lettres et commencant par un majuscule</i></p>
    <p><b>c)</b>  [^a-z]  <i>toutes les caractères qui ne sont pas a,b,c.. ou z</i></p>
    <p><b>d)</b> ^([0-9]{4}[ ]){4}$  <i>la ligne consiste de 4 nombre de 4 chiffres, séparer pas des espaces</i></p>
    <hr />
    <p><b>Exo 11, 2- expression de motifs</b></p>
    <p><b>a)</b> nom.prénom@site.extension  <i>[a-z]+\.[a-z]+@[a-z]\.[a-z]+</i></p>
    <p><b>b)</b> prénom avec tiret (mail)   <i>[a-z]+\.[a-z]+(-[a-z]+)?@[a-z]\.[a-z]+</i></p>
    <p><b>c)</b>«PHP», «Php» ou «php»       <i>/php<</i>/p>
    <p><b>d)</b>jour    <i>([0-2][1-9])|([1-3]0)|31</i></p>
    <p><b>d)</b>mois    <i>([0-9])|(1[0-2])</i></p>
    <p><b>d)</b>année   <i>[0-9]{4}</i></p>
    <!-- 
        choisir le bon caractère délimiteur : si on prend | on a plus droit à utiliser le OU dans la regex
    user input beim Projet vorher ç in c und é in e etc -->
</body>
</html>
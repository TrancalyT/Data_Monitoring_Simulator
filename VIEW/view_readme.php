<?php

function callReadme()
{
?>

<div id="layoutSidenav_content">
        <main>
        <div class="container">
            <div class="db">
             <h1><i class="fas fa-database"></i> <span class="badge badge-dark">Database</span></h1>
             <p class="text-justify">
                Pour conceptualiser la database, je suis parti du principe qu’un module pouvait fournir des détails sur ses conditions techniques d’utilisation. 
                L’enjeu était de récupérer toutes les informations que la table « détails » va faire transiter pour avoir un historique d’informations concernant l’évolution 
                des données dans la table « détails » pendant l’activation d’un module.
                <br/>
                <br/>
                À partir de cet historique, on peut manipuler les données, les traiter et restituer les différentes informations désirées.
                <br/>
                <br/>
                J’ai dû créer une cardinalité entre les tables module et détails (1,1 – 1,1 ; voir MCD sur JMerise) ainsi qu’une même cardinalité entre les tables détails et historique 
                avec plusieurs clés en auto-incrément à condition d’un « trigger » mis en place. Trigger qui va enregistrer toutes les modifications et récupérer toutes les informations 
                faites sur une ligne de la table détails, en cas d’update voire même de delete.
             </p>
            </div>
            <div class="front">
             <h1><i class="fas fa-tv"></i> <span class="badge badge-info">Frontend</span></h1>
             <p class="text-justify">
                Pour le visuel de l'application, j'ai d'abord consulté différents visuels pour du monitoring de données. Le choix d'un CMS Admin m'est donc 
                naturellement venu à l'esprit. Souhaitant construire mes pages avec Bootstrap (bien que la lisibilité du code HTML en souffre), je me suis orienté vers un template gratuit 
                proposé par SB Admin qui utilise cette collection d'outils.
                <br/>
                <br/>
                Le reste de mes pages découle naturellement de cette construction tout en essayant de respecter une accessibilité et une lisibilité de l'application pertinantes.
                Les couleurs principales du site sont épurées et homogènes, les blocs principaux des pages sont soumis à la même hiérarchie.
                <br/>
                <br/>
                À l'occasion  de ce test, je me suis confronté à l'extension Bootstrap Table, extrêmement  utile pour parcourir un tableau; j'ai également découvert Chart.js pour générer
                des graphiques (un vrai casse-tête soit dit en passant 😅). Le site est entièrement responsive et répond aux besoins mobiles.  
             </p>
            </div>
            <div class="back">
             <h1><i class="fas fa-keyboard"></i> <span class="badge badge-warning" style="color:white;">Backend</span></h1>
             <p class="text-justify">
                Le projet est codé sur PHP 7.4.15 et est orienté objet. Il respecte la couche Model (Entity) / DAO (Repository) / Service / Controller / View. Les traitements vers 
                la base de données sont sécurisés des injections SQL et l'administration des erreurs de communication via la database est dirigé grâce au système de gestion d'exceptions. 
                Des regex sont appliqués sur le script du simulateur ainsi que des contrôles basiques sur la vérification des données avec transmission des messages d'erreurs vers l'index
                au niveau de la navbar.
                <br/>
                <br/>
                Le choix du module sur les pages autres que l'index est exécuté via une requête Ajax de manière asynchrone. Il en est de même pour l'insertion des données sur les graphiques 
                transmises de PHP vers Javascript via json. Le code est commenté expliquant le rôle des fonctions et leurs appels. L'application est donc entièrement dynamique. Bon test !
             </p>
            </div>
        </div>
        </main>

<?php
}

?>
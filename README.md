# Data_Monitoring_Simulator
Welcome to this project develop as part of a test. It is a basic application intended to simulate and measure data. The application returns data in various forms (tables, graphs, averages) to analyze numbers and allows the creation of objects to be measured.

Simulation Monitoring IoT :

•	PRESENTATION DU PROJET :

Bienvenue sur ce projet développé dans le cadre d'un test. Il s’agit d’une application basique destinée à simuler et mesurer des données. L’application renvoie des données sous différentes formes (tableaux, graphiques, moyennes) afin d’en analyser les chiffres et permet la création d’objets à mesurer.

•	INSTRUCTIONS POUR IMPLEMENTATION :

Avant tout, il est nécessaire d’avoir un web server local afin de pouvoir lancer l’application. Le logiciel Xampp et son serveur Apache vous proposent ce service.

Il est également nécessaire de pouvoir exploiter une base de données. Xampp propose également un système de gestion de base de données Maria DB.

-	En premier lieu, veuillez importer la base de données (db/test_webreathe.sql) dans votre système de gestion de base de données.

-	Connectez-vous ensuite à votre serveur local et cliquez sur votre fichier index.php (habituellement : http://127.0.0.1/index.php).

-	Naviguez librement sur l’application !

*si vous rencontrez des soucis de connexion avec la base de données, veillez à fournir le bon chemin à la fonction connectionDB() présente dans DAO/CommonDAO.php.

*si vous rencontrez des soucis de variables inconnues au lancement de l’application, vous avez la possibilité de relancer la session dans le menu de navigation en haut à droite.

*si lors du choix du module via le formulaire « select » présent sur les pages autres que l’index vous rencontrez des difficultés à sélectionner votre module, actualisez votre page en vidant le cache avec le raccourci CTRL+F5.

*il est préférable d’avoir une connexion internet afin de pouvoir accéder à la bibliothèque d’icone en ligne « fontawesome » pour en bénéficier lors de l’affichage.

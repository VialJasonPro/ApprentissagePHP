# MVC
- Patron de conception
- Modèle-Vue-Contrôleur
  
C’est un modèle qui a été conçu au départ pour des applications dites « client lourd », c’est-à-dire dont la majorité des données sont traitées sur le poste client (par exemple : un traitement de texte comme Word). MVC était tellement puissant pour ces applications « client lourd », qu’il a été massivement adopté comme modèle pour la création d’applications web (dites « client léger »). C’est cette utilisation de MVC pour le web que je vais bien sûr décrire ici.<br>
MVC est donc une bonne solution pour réaliser des applications web et nous allons en détailler tous les avantages, mais commençons d’abord par son unique inconvénient, qui n’en est souvent pas un d’ailleurs : MVC apporte un découpage qui demande une certaine gymnastique mentale et qui multiplie le nombre de fichiers. Donc MVC s’avère souvent disproportionné pour des tous petits sites qui n’évoluent jamais. Mais comme il y a peu de sites de ce genre, cet inconvénient est assez minime.
## M comme Modèle
Le M de MVC signifie Modèle. Il s’agit des données et de l’état de votre application web (par exemple votre panier de courses sur un site d'e-commerce, ou la liste des produits à acheter,...). En général, ces données sont représentées par un ensemble de classes qui permettent d’accéder à une base de données, mais vos données pourraient tout aussi bien être stockées dans des fichiers plats ou XML, ou même vos classes pourraient utiliser des services web ou autre…
## V comme Vue
Le V de MVC signifie la Vue et traite de ce qu’on voit à l’écran dans le navigateur web. Il s’agira globalement de code HTML et de CSS. Le but de la vue est de présenter les données issues du modèle mais sans les modifier, sans en interpréter le contenu.<br>
Dans un site web, il y a en général plusieurs vues et une vue correspond bien souvent à une unique page. Dans notre site d’e-commerce par exemple, une vue permettra d’afficher les caractéristiques d’un produit, une autre affichera la page d’accueil, une autre encore permettra de visualiser sa commande, etc.
## C comme contrôleur
Le C de MVC signifie Contrôleur. Il fait le lien entre la vue et le modèle.<br>

Le contrôleur gère les interactions avec l’utilisateur et détermine quels traitements doivent être effectués pour une action donnée. D’une manière générale, il va utiliser les données du modèle, les traiter en fonction de l’action de l’utilisateur, et les envoyer à la vue afin qu’elle les affiche.<br>

Nous verrons que le contrôleur est au cœur du système, il interprète et « contrôle » les données venant de l’utilisateur, comme des données venant d’un formulaire ou bien simplement une action faite via une URL.<br>

Une bonne pratique est de faire en sorte que le contrôleur fasse le moins de choses possible. Il doit traiter l’action et choisir la bonne vue. Il est important de comprendre vraiment le rôle de chaque élément car le plus souvent, si vous ne savez pas où mettre quelque chose, vous risquez de le mettre dans le contrôleur…

## En PHP
- Modèle : cette partie gère les données de votre site. Son rôle est d'aller récupérer les informations « brutes » dans la base de données, de les organiser et de les assembler pour qu'elles puissent ensuite être traitées par le contrôleur. On y trouve donc entre autres les requêtes SQL.

- Vue : cette partie se concentre sur l'affichage. Elle ne fait presque aucun calcul et se contente de récupérer des variables pour savoir ce qu'elle doit afficher. On y trouve essentiellement du code HTML mais aussi quelques boucles et conditions PHP très simples, pour afficher par exemple une liste de messages.

- Contrôleur : cette partie gère la logique du code qui prend des décisions. C'est en quelque sorte l'intermédiaire entre le modèle et la vue : le contrôleur va demander au modèle les données, les analyser, prendre des décisions et renvoyer le texte à afficher à la vue. Le contrôleur contient exclusivement du PHP. C'est notamment lui qui détermine si le visiteur a le droit de voir la page ou non (gestion des droits d'accès).
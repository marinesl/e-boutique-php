# e-boutique-php
E-boutique en PHP

## Contexte
- Diplôme : BTS SIO
- Ecole : ITIC Paris
- Année : 2014

## Enoncé
Créer une application simple de connexion et d'ajout de produit au panier de l'utilisateur


## Utilisation

Créez un nouveau compte et naviguez dans les différents produits.

Vous pouvez cliquer sur le produit pour avoir plus d'informations et ensuite, cliquez sur Ajouter à mon panier.

Dans la page Panier, vous pouvez visualiser tous les produits que vous souhaitez commander. Vous pouvez changer la quantité et les supprimer.


## Arborescence des fichiers

### /
- index.php : fichier permettant de faire le pont entre les vues et les controlleurs
- e-boutique-php.sql : fichier SQL de la base de données

### /Controller
- ProductController.php : fichier permettant de faire le pont entre les vues et les modèles pour les produits
- UserController.php : fichier permettant de faire le pont entre les vues et les modèles pour les utilisateurs

### /Model
- /images : les images des produits
- Connection.php : connexion à la base de données
- Product.php : requêtes SQL pour les produits
- User.php : requêtes SQL pour les utilisateurs

### /View
- /bootstrap
- /fontawesome : fichiers CSS et Fonts de la librairie Fontawesome
- ballerie.php : page des produits de catégtorie Ballerine
- basse.php : page des produits de catégtorie Basse
- contact.php : page du formulaire de contact
- createaccount.php : page du formulaire de création d'un compte utilisateur
- default.php : structure HTML commune 
- edit.php : page du formulaire de modification des informations de l'utilisateur
- footer.php : footer commun des pages
- haute.php : page des produits de catégtorie Haute
- header.php : menu commun des pages
- home.php : page d'accueil de la boutique avec les nouveaux produits
- login.php : page de connexion utilisateur
- newProduct.php : page des nouveaux produits
- order.php : page du panier de l'utilisateur
- original.php : page des produits de catégtorie Original
- product.php : page d'un produit
- sidebar.php : zone de gauche de la page
- swag.php : page des produits de catégtorie Swag


## Installation

1. Créez un fichier .env.php à la racine du dossier, copiez le code suivant et remplissez les informations de votre base de données :

``
    define('BDD_USER', ''); 
    define('BDD_PASSWORD', '');  
    define('BDD_HOST', '');  
    define('BDD_PORT', '');  
    define('BDD_NAME', 'gestion-des-formations-php');
``

2. Importez le fichier e-boutique-php.sql dans votre base de données

3. Testez
    - login : tony.stark@mail.com
    - mot de passe : azerty

Ou en créant un nouveau compte


## Optimisations pour la V2
- Mettre à part les vues communes
- Une seule page pour afficher les produits par catégorie
- Faire fonctionner le formulaire de contact
- Créer les pages Mentions légales / Cookies / Plan du site
- Création d'un compte : double champ mot de passe + message et mail de confirmation
- Back office administrateur pour gérer les produits : nouveautés, stock, etc...

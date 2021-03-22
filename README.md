



Laravel Crud tutoriel
 

Prérequis Laravel 8

Pour suivre ce tuto, vous devez disposer des prérequis suivants:
•	PHP et MySQL installés sur votre machine.
•	Compositeur

Étape 1 - Installation de Laravel 8

Commençons par installer Laravel 8 à l'aide de Composer.
Ouvrez une nouvelle interface de ligne de commande et exécutez la commande suivante :

$ compositeur créer-projet laravel /laravel=8.0 laravel8app --prefer-dist

Laravel 8 a quelques nouvelles fonctionnalités, par exemple, nous n'avons pas besoin de copier et de renommer le env.example fichier, Laravel 8 s'en charge. Vous n'avez pas non plus besoin de générer APP_KEY, il sera automatiquement généré.
Attendez que le compositeur installe les dépendances et définisse votre projet et passons à l'étape suivante.

Étape 2 - Configuration du base de données MySQL

Ouvrez xampp et Créer votre base de données.
Ouvrez-le .env fichier et mettez à jour les informations d'identification pour accéder à votre base de données MySQL :
DB_CONNECTION=mysql
DB_HOST=127,0,0,1
DB_PORT=3306
DB_DATABASE=crud
DB_USERNAME=racine
DB_PASSWORD=
Vous devez fournir le nom de la base de données, le nom d'utilisateur et le mot de passe(mot de passe par defaut vide).
 

Étape 3 - Création d'une migration de base de données

Nous allons créer une application CRUD avec Laravel 8 pour une application de produits, nous devrons donc créer la table SQL correspondante dans la base de données à l'aide d'une migration.
Revenez à votre terminal et exécutez les commandes suivantes:
$ cd crud
$ php artisan make:migration create_produits_table --create=produits
Un fichier de migration sera créé dans le database/migrations dossier de votre produit, nous devons ensuite ajouter les champs à notre table de base de données. Un produit aura un nom, une description, un prix, une date de création et une date de mise à jour.


Pour éviter de rencontrer des erreurs, vous devez spécifier la longueur de chaîne par défaut avant d'exécuter votre migration.
Ouvrez le app/Providers/AppServiceProvider.php fichier et joutez Schema::defaultstringLength(191)
Comme suit :

Ensuite, revenez à votre terminal et exécutez la commande suivante:

$ php artisan migrate

Cela ajoutera les champs à notre table de base de données.

Étape 4 - Ajout d'une route de ressources

Après avoir créé notre table de base de données à l'aide d'une migration Laravel 8. Nous devrons ensuite ajouter des routes pour nos opérations CRUD.
Ouvrez le routes\web.php fichier et ajoutez notre route de ressources comme suit :

<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
return view('welcome');
});

Route::get('/produits', 'ProduitController@index');

Puis ouvrez le fichier app/provider/AppServiceProvider.php et recherchez la ligne qui contient ce code

// protected $namespace = 'App\\Http\\Controllers';

 puis supprimez le commentaire
 protected $namespace = 'App\\Http\\Controllers';
 

Étape 5 - Ajout d'un contrôleur et d'un modèle Laravel 8

Ensuite, nous devons créer un contrôleur et un modèle Laravel en exécutant la commande suivante:

$ php artisan make:controller ProduitController --resource --model=Produit

Tapez yes pour continue.


Étape 6 – Ajouter vos vues Blade Laravel 8
Laravel utilise le système de modèles de lames pour les vues.
Dans le resources/views dossier, créez deux dossiers Layouts et Produits.

Étape 7 – execution
Vous pouvez exécute votre application à l'aide de la commande suivante :
$ php artisan serve
Vous pouvez accéder à votre application à partir de http://127.0.0.1:8000.

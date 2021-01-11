<?php
require __DIR__.'/../vendor/autoload.php';

use App\Models\Recipe;
use App\Storage\MySqlDatabaseRecipeStorage;
use App\RecipeManager;

try {
    $pdo = new PDO("mysql:host=localhost;dbname=recipes",'root','');
}
catch (Exception $e) {
    die($e->getMessage());
}

$storage = new MySqlDatabaseRecipeStorage($pdo);


$manager = new RecipeManager($storage);




$recipe = new Recipe;
$recipe->setCreatedAt(new DateTime())
    ->setName('Fondant au chocolat mi-cuit')
    ->setDescription('La recette du fameux fondant au chocolat micuit.')
    ->setPersons(4)
    ->setPreparationTime(40);

$addedRecipe = $manager->addRecipe($recipe);


$recipes = $manager->getRecipes();
print_r($recipes);







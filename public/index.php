<?php
require __DIR__.'/../vendor/autoload.php';

use App\Models\Recipe;
use App\Storage\MySqlDatabaseRecipeStorage;

try {
    $pdo = new PDO("mysql:host=localhost;dbname=recipes",'root','');
}
catch (Exception $e) {
    die($e->getMessage());
}

$storage = new MySqlDatabaseRecipeStorage($pdo);
print_r($storage->all());





$recipe = new Recipe;
$recipe->setCreatedAt(new DateTime())
    ->setName('Fondant au chocolat mi-cuit')
    ->setDescription('La recette du fameux fondant au chocolat micuit.')
    ->setPersons(4)
    ->setPreparationTime(40);
print_r($storage->get(1));
$storage->update($recipe);




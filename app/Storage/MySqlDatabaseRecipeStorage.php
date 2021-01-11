<?php

namespace App\Storage;
use App\Storage\Contracts\RecipeStorageInterface;
use App\Models\Recipe;

class MySqlDatabaseRecipeStorage implements RecipeStorageInterface{

    protected $db;
    public function __construct(\PDO $db){
        $this->db = $db;
    }

    public function store(Recipe $recipe)
    {
        $statement = $this->db->prepare("INSERT INTO recipes (name,description,persons,preparation_time) VALUE (?,?,?,?)");
        $statement->execute([
            $recipe->getName(),
            $recipe->getDescription(),
            $recipe->getPersons(),
            $recipe->getPreparationTime()
        ]);
        return $this->db->lastInsertId();
    }

    public function all()
    {
        $statement = $this->db->prepare('SELECT * FROM recipes');
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_CLASS, Recipe::class);
    }

    public function update(Recipe $recipe)
    {
        $statement = $this->db->prepare("UPDATE recipes SET name=?,description=?,persons=?,preparation_time=? WHERE id=?");
        $statement->execute([
            $recipe->getName(),
            $recipe->getDescription(),
            $recipe->getPersons(),
            $recipe->getPreparationTime(),
            $recipe->getId()
        ]);
    }

    public function get($id)
    {
        $statement = $this->db->prepare('SELECT * FROM recipes WHERE id=?');
        $statement->execute([
            $id
        ]);
        $statement->setFetchMode(\PDO::FETCH_CLASS, Recipe::class);
        return $statement->fetch();
    }
}
<?php

namespace App;
use App\Models\Recipe;
use App\Storage\MySqlDatabaseRecipeStorage;

class RecipeManager{
    protected $storage;

    public function __construct(MySqlDatabaseRecipeStorage $storage)
    {
        $this->storage = $storage;
    }

    public function addRecipe(Recipe $recipe){
        $this->storage->store($recipe);
    }

    public function getRecipe($id){
        $this->storage->get($id);
    }

    public function updateRecip(Recipe $recipe){
        $this->storage->update($recipe);
    }

    public function getRecipes(){
        $this->storage->all();
    }
}
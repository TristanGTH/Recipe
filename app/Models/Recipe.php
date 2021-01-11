<?php

namespace App\Models;

class Recipe{
    protected $id;
    protected $created_at;
    protected $name;
    protected $description;
    protected $persons;
    protected $preparation_time;
    protected $complete;


    public function getPreparationTime()
    {
        return $this->preparation_time;
    }

    public function setPreparationTime($preparation_time)
    {
        $this->preparation_time = $preparation_time;
        return $this;
    }

    public function getPersons()
    {
        return $this->persons;
    }

    public function setPersons($persons)
    {
        $this->persons = $persons;
        return $this;
    }


    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }


    public function getCreatedAt()
    {
        if (!$this->created_at instanceof \DateTime){
            return new \DateTime($this->created_at);
        }
        return $this->created_at;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

}
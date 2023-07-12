<?php

require 'AbstractManager.php';

class CategoryManager extends AbstractManager{ //PARLE A LA BDD

    function getAllCategories() : array
    {
        $query = $this->db->prepare('SELECT * FROM categories');
        $query->execute();
        $categories = $query->fetchAll(PDO::FETCH_ASSOC);
        $categoriesTab = [];
        foreach($categories as $category)
        {
            $categoryInstance = new Category($category["name"]);
            $categoryInstance->setId($category["id"]);
            array_push($categoriesTab, $categoryInstance);
        }
        return $categoriesTab;
    }

    function addCategory(Category $category) : void
    {
        $query = $this->db->prepare('INSERT INTO categories(name) VALUES(:category)');
        $parameters = [
            'category' => $category->getName()
        ];
        $query->execute($parameters);
    }

    function removeCategoryById(int $id) : void
    {
        $query = $this->db->prepare('DELETE FROM categories WHERE id = :id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);
    }

    function editCategoryById(Category $category) : void
    {
        $query = $this->db->prepare('REPLACE INTO categories(name) VALUES(:name) WHERE id = :id');
        $parameters = [
            'name' => $category->getName(),
            'id' => $category->getId()
        ];
        $query->execute($parameters);
    }
}

?>
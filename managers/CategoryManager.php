<?php

require 'AbstractManager.php';

class CategoryManager extends AbstractManager{ //PARLE A LA BDD

    function listAllCategories() : array
    {
        $query = $this->db->prepare('SELECT * FROM categories');
        $query->execute();
        $categories = $query->fetchAll(PDO::FETCH_ASSOC);
        $categoriesTab = [];
        foreach($categories as $category)
        {
            $categoryInstance = new Room($category["name"]);
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
        $query = $this->db->prepare('REPLACE INTO categories(name) VALUES(:category) WHERE id = :id');
        $parameters = [
            'category' => $category->getName(),
            'id' => $category->getId()
        ];
        $query->execute($parameters);
    }
}

?>
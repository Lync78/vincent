<?php


namespace App\Factory;


use App\Entity\Category;
use App\Repository\CategoryRepository;
use Doctrine\Persistence\ManagerRegistry;

class CategoryServiceFactory
{

    public function __construct(private CategoryRepository $categoryRepository){}

    /**
     * @return array
     */
    public function list(): array
    {

        $categorys = $this->categoryRepository->findAll();

        $list = [];

        /** @var Category $category */
        foreach ($categorys as $category)
        {

            $list[$category->getTitle()] = $category->getId();

        }

        return $list;
    }

}
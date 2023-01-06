<?php


namespace App\Factory;


use App\Entity\Category;
use Doctrine\Persistence\ManagerRegistry;

class CategoryServiceFactory
{

    public function __construct(private ManagerRegistry $managerRegistry){}

    /**
     * @return array
     */
    public function list(): array
    {

        $categorys = $this->managerRegistry->getRepository(Category::class)->findAll();

        $list = [];

        /** @var Category $category */
        foreach ($categorys as $category)
        {

            $list[$category->getTitle()] = $category->getId();

        }

        return $list;
    }

}
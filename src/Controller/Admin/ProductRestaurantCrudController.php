<?php

namespace App\Controller\Admin;

use App\Entity\ProductRestaurant;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProductRestaurantCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProductRestaurant::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->setDisabled(),
            AssociationField::new('product'),
            AssociationField::new('restaurant'),
            NumberField::new('price'),
            IntegerField::new('stock'),
        ];
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('restaurant')
            ->add('price')
        ;
    }
}

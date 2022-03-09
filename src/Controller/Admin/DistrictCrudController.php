<?php

namespace App\Controller\Admin;

use App\Entity\District;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DistrictCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return District::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->setDisabled(),
            TextField::new('name'),
            IntegerField::new('population')->setFormTypeOptions([
                'attr' => [
                    'min' => 0,
                    'max' => 1000000
                ]
            ])->setHelp('Must be between 0 and 1000000'),
            /*IntegerField::new('population')->setFormTypeOption('attr.min', 0),*/
            DateTimeField::new('createdAt')->hideOnForm(),
        ];
    }
}

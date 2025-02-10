<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(EntityFilter::new('category'));
    }

    public function configureFields(string $pageName): iterable
    {
        yield AssociationField::new('category');
        yield TextField::new('name');
        yield MoneyField::new('price')
            ->setCurrency('EUR')
            ->setStoredAsCents(false);
        yield TextareaField::new('description')
            ->hideOnIndex();
        yield DateTimeField::new('createdAt')
            ->setRequired(false)
            ->setTimezone('Europe/Paris')->onlyOnIndex();
        yield DateTimeField::new('updatedAt')
            ->setRequired(false)
            ->setTimezone('Europe/Paris')->onlyOnIndex();
    }
}

<?php

namespace App\Controller\Admin;

use App\Entity\Boat;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
class BoatCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Boat::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('type'),
            AssociationField::new('client'),
            NumberField::new('price_per_day'),
            NumberField::new('internal_volume'),
            NumberField::new('weight'),
        ];
    }
    
}

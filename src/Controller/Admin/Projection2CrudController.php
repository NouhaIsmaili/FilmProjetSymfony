<?php

namespace App\Controller\Admin;

use App\Entity\Projection;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class Projection2CrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Projection::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            DateField::new('dateProjection'),
            TextField::new('salle'),
            IntegerField::new('nbrPlaces'),
            AssociationField::new('reserv'),
            AssociationField::new('films')->hideOnForm(), 
        ];
    }

}

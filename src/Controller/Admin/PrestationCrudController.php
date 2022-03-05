<?php

namespace App\Controller\Admin;

use App\Entity\Prestation;
use DateTime;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PrestationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
 {
        return Prestation::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id'),
            TextField::new('title', 'Titre'),
            TextEditorField::new('resume', 'résumé'),
            TextEditorField::new('description', 'description'), 
            NumberField::new('price', 'prix'),
            TextField::new('duration', 'durée'),
            DateField::new('createdAt', 'date de création'),
            ImageField::new('image', 'Image')
                                                ->setBasePath('uploads/')
                                                ->setUploadDir('public/uploads/img')
                                                ->setUploadedFileNamePattern('[name][randomhash].[extension]')
                                                ->setRequired(true),
        ];
    }
    
}

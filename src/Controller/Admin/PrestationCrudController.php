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
use Vich\UploaderBundle\Form\Type\VichImageType;


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
            TextEditorField::new('subtitle', 'sous-titre'),
            TextEditorField::new('description', 'description'), 
            TextEditorField::new('subtitleOption', 'sous-titre 2'),
            TextEditorField::new('descriptionOption', 'description 2'), 
            NumberField::new('price', 'prix'),
            TextField::new('duration', 'durée'),
            DateField::new('createdAt', 'date de création'),
            TextField::new('imageFile')->setFormType(VichImageType::class),
            ImageField::new('image', 'Image')->setBasePath('uploads/')->onlyOnIndex(),
        ];
    }
    
}

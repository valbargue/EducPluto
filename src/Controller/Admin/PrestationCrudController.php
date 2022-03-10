<?php

namespace App\Controller\Admin;

use App\Entity\Prestation;
use DateTime;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
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
            TextField::new('title', 'Titre'),
            TextEditorField::new('resume', 'résumé'),
            TextEditorField::new('subtitle', 'sous-titre'),
            TextEditorField::new('description', 'description'), 
            MoneyField::new('price', 'prix')->setCurrency('EUR'),
            TextField::new('duration', 'durée'),
            TextField::new('imageFile')->setFormType(VichImageType::class),
            ImageField::new('image', 'Image')->setBasePath('uploads/')->onlyOnIndex(),
        ];
    }
    
}

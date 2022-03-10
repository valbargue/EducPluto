<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('category', 'Catégorie') ->setFormTypeOptions([
                'by_reference' => false,
            ]),
            AssociationField::new('race', 'Race de chiens') ->setFormTypeOptions([
                'by_reference' => false,
            ]),
            TextField::new('title', 'Titre de l\'article'),
            TextEditorField::new('resume', 'Court Résumé'),
            TextEditorField::new('description'),
            TextEditorField::new('advice', 'Conseil'),
            TextField::new('imageFile')->setFormType(VichImageType::class),
            ImageField::new('img', 'Image')->setBasePath('uploads/')->onlyOnIndex(),
        ];
    }
}

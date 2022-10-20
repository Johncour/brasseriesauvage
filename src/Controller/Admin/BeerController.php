<?php

namespace App\Controller\Admin;

use App\Entity\Beer;
use App\Form\BeerType;
use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\BeerRepository;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BeerController extends AbstractController
{
    #[Route('/admin/beer', name: 'app_admin_beer', methods: ['GET', 'POST'])]
    public function index(BeerRepository $beerRepository, Request $request, EntityManagerInterface $em, CategoryRepository $categoryRepository): Response
    {
        $beer = new Beer;
        $category = new Category;
        $formBeer = $this->createForm(BeerType::class, $beer);
        $formBeer->handleRequest($request);
        $formCategory = $this->createForm(CategoryType::class, $category);
        $formCategory->handleRequest($request);
        $dataBeer = $beerRepository->findAll();
        $dataCategory = $categoryRepository->findAll();

        if( $formBeer->isSubmitted() && $formBeer->isValid() ){
            $newNbeer = $beer->getName();
            $db = array();
            if($dataBeer){
                foreach( $dataBeer as $dbeer){  
                    array_push($db, $dbeer->getName());}
                $searchNbeer = array_search($newNbeer, $db);
                if($searchNbeer || $db[0] == $newNbeer){
                    $this->addFlash('error', 'Cette bière est déjà existante');} 
                else{
                    if( $fichier = $formBeer->get('image')->getData() ){
                        $nomFichier = pathinfo($fichier->getClientOriginalName(), PATHINFO_FILENAME);
                        $nomFichier = str_replace(" ", "_", $nomFichier);
                        $nomFichier .= "." . $fichier->guessExtension();
                        $fichier->move("img", $nomFichier);}
                    $em->persist($beer);
                    $em->flush();
                    $this->addFlash('success', 'Nouvelle bière ajoutée');
                    return $this->redirectToRoute("app_admin_beer");}
            } else {
                if( $fichier = $formBeer->get('image')->getData() ){
                    $nomFichier = pathinfo($fichier->getClientOriginalName(), PATHINFO_FILENAME);
                    $nomFichier = str_replace(" ", "_", $nomFichier);
                    $nomFichier .= "_" . uniqid() . "." . $fichier->guessExtension();
                    $fichier->move("img", $nomFichier);}
                $em->persist($beer);
                $em->flush();
                $this->addFlash('success', 'Nouvelle bière ajoutée');
                return $this->redirectToRoute("app_admin_beer");}
        }

        if( $formCategory->isSubmitted() && $formCategory->isValid() ){
            $newName = $category->getName();
            $dc = array();
            if($dataCategory){
                foreach( $dataCategory as $dcategory){  
                    array_push($dc, $dcategory->getName());}
                $searchName = array_search($newName, $dc);
                if($searchName || $dc[0] == $newName){
                    $this->addFlash('error', 'Cette catégorie est déjà existante');} 
                else {
                    $em->persist($category);
                    $em->flush();
                    $this->addFlash('success', 'Nouvelle catégorie ajouté');
                    return $this->redirectToRoute("app_admin_beer");}
            } else {
                $em->persist($category);
                $em->flush();
                $this->addFlash('success', 'Nouvelle catégorie ajouté');
                return $this->redirectToRoute("app_admin_beer");}
        }
        return $this->render('admin/beer/index.html.twig', [
            'formBeer' => $formBeer->createView(),
            "beers" => $beerRepository->findAll(),
            'formCategory' => $formCategory->createView(),
            "categories" => $categoryRepository->findAll()]);
    }

    #[Route('/admin/beer/edit/category/{id}', name: 'app_admin_category_modif', methods: ['GET', 'POST'])]
    public function categoryModif(BeerRepository $beerRepository, Request $request, EntityManagerInterface $em, CategoryRepository $categoryRepository, $id): Response
    {
        $beer = new Beer;
        $category = $categoryRepository->find($id);
        $formBeer = $this->createForm(BeerType::class, $beer);
        $formBeer->handleRequest($request);
        $formCategory = $this->createForm(CategoryType::class, $category);
        $formCategory->handleRequest($request);
        $dataBeer = $beerRepository->findAll();

        if( $formBeer->isSubmitted() && $formBeer->isValid() ){
            $newNbeer = $beer->getName();
            $db = array();
            if($dataBeer){
                foreach( $dataBeer as $dbeer){  
                    array_push($db, $dbeer->getName());}
                $searchNbeer = array_search($newNbeer, $db);
                if($searchNbeer || $db[0] == $newNbeer){
                    $this->addFlash('error', 'Cette bière est déjà existante');} 
                else{
                    if( $fichier = $formBeer->get('image')->getData() ){
                        $nomFichier = pathinfo($fichier->getClientOriginalName(), PATHINFO_FILENAME);
                        $nomFichier = str_replace(" ", "_", $nomFichier);
                        $nomFichier .= "." . $fichier->guessExtension();
                        $fichier->move("img", $nomFichier);}
                    $em->persist($beer);
                    $em->flush();
                    $this->addFlash('success', 'Nouvelle bière ajoutée');
                    return $this->redirectToRoute("app_admin_beer");}
            } else {
                if( $fichier = $formBeer->get('image')->getData() ){
                    $nomFichier = pathinfo($fichier->getClientOriginalName(), PATHINFO_FILENAME);
                    $nomFichier = str_replace(" ", "_", $nomFichier);
                    $nomFichier .= "." . $fichier->guessExtension();
                    $fichier->move("img", $nomFichier);}
                $em->persist($beer);
                $em->flush();
                $this->addFlash('success', 'Nouvelle bière ajoutée');
                return $this->redirectToRoute("app_admin_beer");}
        }      

        if( $formCategory->isSubmitted() && $formCategory->isValid() ){
            $em->persist($category);
            $em->flush();
            $this->addFlash('success', 'Catégorie modifiée');
            return $this->redirectToRoute("app_admin_beer");}

        return $this->render('admin/beer/index.html.twig', [
            'formBeer' => $formBeer->createView(),
            "beers" => $beerRepository->findAll(),
            'formCategory' => $formCategory->createView(),
            "categories" => $categoryRepository->findAll(),]);
    }

    #[Route('/admin/beer/edit/{id}', name: 'app_admin_beer_modif', methods: ['GET', 'POST'])]
    public function beerModif(BeerRepository $beerRepository, Request $request, EntityManagerInterface $em, CategoryRepository $categoryRepository, $id): Response
    {
        $beer = $beerRepository->find($id);
        $category = new Category;
        $formBeer = $this->createForm(BeerType::class, $beer);
        $formBeer->handleRequest($request);
        $formCategory = $this->createForm(CategoryType::class, $category);
        $formCategory->handleRequest($request);
        $dataCategory = $categoryRepository->findAll();

        if( $formBeer->isSubmitted() && $formBeer->isValid() ){

            if( $fichier = $formBeer->get('image')->getData() ){
                $nomFichier = pathinfo($fichier->getClientOriginalName(), PATHINFO_FILENAME);
                $nomFichier = str_replace(" ", "_", $nomFichier);
                $nomFichier .= "." . $fichier->guessExtension();
                $fichier->move("img", $nomFichier);}
            $em->persist($beer);
            $em->flush();
            $this->addFlash('success', 'Bière modifiée');
            return $this->redirectToRoute("app_admin_beer");}        

        if( $formCategory->isSubmitted() && $formCategory->isValid() ){
            $newName = $category->getName();
            $dc = array();
            if($dataCategory){
                foreach( $dataCategory as $dcategory){  
                    array_push($dc, $dcategory->getName());}
                $searchName = array_search($newName, $dc);
                if($searchName || $dc[0] == $newName){
                    $this->addFlash('error', 'Cette catégorie est déjà existante');} 
                else {
                    $em->persist($category);
                    $em->flush();
                    $this->addFlash('success', 'Nouvelle catégorie ajouté');
                    return $this->redirectToRoute("app_admin_beer");}
            } else {
                $em->persist($category);
                $em->flush();
                $this->addFlash('success', 'Nouvelle catégorie ajouté');
                return $this->redirectToRoute("app_admin_beer");}
        }
        return $this->render('admin/beer/index.html.twig', [
            'formBeer' => $formBeer->createView(),
            "beers" => $beerRepository->findAll(),
            'formCategory' => $formCategory->createView(),
            "categories" => $categoryRepository->findAll(),]);
    }

    #[Route('/admin/beer/delete/category/{id}', name: 'app_admin_category_delete', methods: ['GET', 'POST'])]
    public function categoryDelete(BeerRepository $beerRepository, Request $request, EntityManagerInterface $em, CategoryRepository $categoryRepository, $id): Response
    {
        $category = $categoryRepository->find($id);
        $em->remove($category);
        $em->flush();
        $this->addFlash('success', 'Catégorie supprimée');
        return $this->redirectToRoute('app_admin_beer', [], Response::HTTP_SEE_OTHER);   
    }

    #[Route('/admin/beer/delete/{id}', name: 'app_admin_beer_delete', methods: ['GET', 'POST'])]
    public function beerDelete(BeerRepository $beerRepository, Request $request, EntityManagerInterface $em, CategoryRepository $categoryRepository, $id): Response
    {
        $beer = $beerRepository->find($id);
        $em->remove($beer);
        $em->flush();
        $this->addFlash('success', 'Bière supprimée');
        return $this->redirectToRoute('app_admin_beer', [], Response::HTTP_SEE_OTHER);   
    }
}

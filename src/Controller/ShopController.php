<?php

namespace App\Controller;

use DateTime;
use Stripe\Stripe;
use App\Entity\Shop;
use App\Entity\User;
use App\Form\ShopType;
use App\Entity\ShopBeer;
use App\Form\ShopBeerType;
use Stripe\Checkout\Session;
use App\Repository\BeerRepository;
use App\Repository\ShopRepository;
use App\Repository\UserRepository;
use App\Repository\ShopBeerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ShopController extends AbstractController
{
    #[Route('/shop', name: 'app_shop', methods: ['GET', 'POST'])]
    public function index(BeerRepository $beerRepository, Request $request, SessionInterface $session, ShopRepository $sr, ShopBeerRepository $sbRepository, EntityManagerInterface $em): Response
    {     
        $numberBeer = $beerRepository->findAll();
        $nBeer = count($numberBeer);
        $quantity = $request->query->get('quantity');
        $bid = $request->query->get('bid');
        $price = $request->query->get('price');
        $sprice = $sr->findByPrice(0);
        if($sprice){
            $sbdelete = $sprice->getId();
            $bdelete = $sbRepository->findByShopId($sbdelete);
            foreach($bdelete as $bde){ 
                $em->remove($bde);
                $em->flush();}
            $em->remove($sprice);
            $em->flush();
        }

        return $this->render('shop/index.html.twig', [
            "beers" => $beerRepository->findAll(),
            'nBeer' => $nBeer,
            'quantity' => $quantity,
            'bid' => $bid,
            'price' => $price
        ]);
    }

    #[Route('/shop/order/{id}', name: 'app_shop_order', methods: ['GET', 'POST'])]
    public function goShop(BeerRepository $beerRepository, Request $request, SessionInterface $session, EntityManagerInterface $em, ShopBeerRepository $sbRepository, ShopRepository $sr, User $user, $id) : Response
    {
        $numberBeer = $beerRepository->findAll();
        $nBeer = count($numberBeer);
        if($request->query->get('resultBasket')){
            $rb = $request->query->get('resultBasket');
            $lastn = substr($rb, -1);
            $lastn2 = substr($rb, -2);
            if($lastn2 != 0 & $lastn == 0){
                $whole = floor($rb);
                $fraction = $rb - $whole;
                $rest = substr($fraction, -1);
                $long = $whole * 100;
                $value = $long + ($rest*10);
                $session->set('value', $value);
            } else if($lastn2 == 0 & $lastn == 0){
                    $rb2 = $rb + 0.11;
                    $whole = floor($rb2);
                    $fraction = $rb2 - $whole;
                    $rest = substr($fraction, -2);
                    $long = $whole * 100;
                    $value = $long + $rest;
                    $value = $value - 11;
                    $session->set('value', $value);
            } else {  
                $whole = floor($rb);
                $fraction = $rb - $whole;
                $rest = substr($fraction, -2);
                $long = $whole * 100;
                $value = $long + $rest;
            $session->set('value', $value);};}
        $s = new Shop();
        $forms = $this->createForm(ShopType::class, $s, ['attr' => ['result' => $session->get('value')]]);
        $forms->add('price_order', NumberType::class, [
            'label'       => "montant de la commande en € :",
            'data'        => $session->get('value'),            
            'disabled'    => true
        ] ); 
        $forms->handleRequest($request);
        $sprice = $sr->findByPrice(0);
        if($sprice){
            $sbdelete = $sprice->getId();
            $bdelete = $sbRepository->findByShopId($sbdelete);
            foreach($bdelete as $bde){ 
                $em->remove($bde);
                $em->flush();}
            $em->remove($sprice);
            $em->flush();
        }

        if ($forms->isSubmitted() && $forms->isValid()) {
            $s->setUser($user);
            $s->setOrderDate($forms->get('order_date')->getData());
            $s->setShippingDate($forms->get('shipping_date')->getData());
            $ssd = $forms->get('shipping_date')->getData();
            $ssdate = $ssd->format('Y-m-d H:i:s');
            $s->setPriceOrder(0);
            $s->setOrderStatus(0);
            $em->persist($s);
            $em->flush();
            $n = $session->get('value');
            $lastn = substr($n, -1);
            $lastn2 = substr($n, -2);
            if($lastn2 != 0 & $lastn == 0){
                $whole = floor($n);
                $fraction = $n - $whole;
                $rest = substr($fraction, -1);
                $long = $whole * 100;
                $value = $long + ($rest*10);
            } else if($lastn2 == 0 & $lastn == 0){
                    $n2 = $n + 0.11;
                    $whole = floor($n2);
                    $fraction = $n2 - $whole;
                    $rest = substr($fraction, -2);
                    $long = $whole * 100;
                    $value = $long + $rest;
                    $value = $value - 11;
            } else {  
                $whole = floor($n);
                $fraction = $n - $whole;
                $rest = substr($fraction, -2);
                $long = $whole * 100;
                $value = $long + $rest;} 
                
                echo "<pre>";
                print_r($session->get('value'));
                echo "</pre>";

            $b = array();
            $c = array();
            $d = array();
            $e = array();
            for($i=0; $i<$nBeer; $i++){
                array_push($b, $request->query->get($i));
            } 
            for($k=0; $k<sizeof($b); $k++){
                if(isset($b[$k])){
                    array_push($d, $b[$k]);}
            }
            for($j=0; $j<sizeof($b); $j++){  
                if(isset($b[$j])){
                    array_push($c, $request->query->get($b[$j]));}
            }
            for($l=0; $l<sizeof($d); $l++){
                $bd = substr($d[$l], 1);
                $session->set($l,$bd);
                $session->set($bd,$c[$l]);
                // $bd1 = $beerRepository->find($bd);
                // $bd2 = $bd1->getPrice();
                // $bd3 = $c[$l] / $bd2;
                // $sbd = new ShopBeer();
                // $sbd->setQuantity($bd3); 
                // $bdq = $bd1->getQuantity();
                // $bd1->setQuantity($bdq - $bd3);
                // $sbd->setPriceQuantity($c[$l]);
                // $sbd->setBeer($bd1);
                // $sbd->setShop($s);
                // $em->persist($sbd);
                // $em->flush();
            }


            return $this->redirectToRoute('app_checkout', ['ssd' => $ssdate]);
        }
        return $this->render('shop/order.html.twig', [
            "beers" => $beerRepository->findAll(),
            "rb" => $session->get('value'),
            'formShop' => $forms->createView()
        ]); 
    }

    #[Route('/success', name: 'success', methods: ['GET', 'POST'])]
    public function success(BeerRepository $beerRepository, EntityManagerInterface $em, ShopRepository $sr, ShopBeerRepository $sbRepository, Request $request, SessionInterface $session) : Response
    {
        // $value = $request->query->get('value');
        $numberBeer = $beerRepository->findAll();
        $nBeer = count($numberBeer);
        $ssd = $request->query->get('ssd');
        $shop = $sr->findOneByDate($ssd);
        $shop->setPriceOrder($session->get('value')/100);
        $shop->setOrderStatus(1);
        for($i=0; $i<$nBeer; $i++){
            if($session->get($i)){
                // $session->set($bd,$c[$l]);
                $bd = $session->get($i);
                $bd1 = $beerRepository->find($session->get($i));
                $bd2 = $bd1->getPrice();
                $bd3 = $session->get($bd) / $bd2;
                $sbd = new ShopBeer();
                $sbd->setQuantity($bd3); 
                $bdq = $bd1->getQuantity();
                $bd1->setQuantity($bdq - $bd3);
                $sbd->setPriceQuantity($session->get($bd));
                $sbd->setBeer($bd1);
                $sbd->setShop($shop);
                $em->persist($sbd);
                $em->flush();
            }
        }
        $em->persist($shop);
        $em->flush();
        $sprice = $sr->findByPrice(0);
        if($sprice){
            $em->remove($sprice);
            $em->flush();}
        return $this->render('default/success.html.twig');
    }


    #[Route('/error', name: 'error', methods: ['GET', 'POST'])]
    public function error(BeerRepository $beerRepository, EntityManagerInterface $em, ShopRepository $sr, Request $request, ShopBeerRepository $sbRepository) : Response
    {
        $sprice = $sr->findByPrice(0);
        if($sprice){
            $sbdelete = $sprice->getId();
            $bdelete = $sbRepository->findByShopId($sbdelete);
            foreach($bdelete as $bde){
                $bd = $bde->getBeer();
                $bd3 = $bde->getQuantity();
                $bd1 = $beerRepository->find($bd);
                $bdq = $bd1->getQuantity();
                $bd1->setQuantity($bdq + $bd3);
                $em->remove($bde);
                $em->flush();}
            $em->remove($sprice);
            $em->flush();
        }
        $ssd = $request->query->get('ssd');
        $shop = $sr->findOneByDate($ssd);
        if($shop){
            $em->remove($shop);
            $em->flush();}
        return $this->render('default/error.html.twig');
    }

    #[Route('/create-checkout-session/{ssd}', name: 'app_checkout', methods: ['GET', 'POST'])]
    public function checkout(BeerRepository $beerRepository, Request $request, SessionInterface $session, EntityManagerInterface $em, ShopBeerRepository $sbRepository, ShopRepository $sr, $ssd) : Response
    {
        \Stripe\Stripe::setApiKey('sk_test_51LzoqIAfdtI2a3VcNYdsmskfgMyzg15C0xQWbA2aUt6VIhSmcEqT0p2s0il3Xw6VhlimR1Wh4JzVcASEQUaZBc3P00XCiUXh8p');

        $checkout_session = \Stripe\Checkout\Session::create([
            'line_items' => [[
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                      'name' => 'brasserie sauvage',
                    ],
                    'unit_amount_decimal' => $session->get('value'),
                  ],
                'quantity' => 1,
              ]],
              'mode' => 'payment',
            'success_url' => $this->generateUrl('success', [ 'ssd' => $ssd], UrlGeneratorInterface::ABSOLUTE_URL),
            'cancel_url' => $this->generateUrl('error', [ 'ssd' => $ssd ], UrlGeneratorInterface::ABSOLUTE_URL),
        ]);

        return $this->redirect($checkout_session->url, 303);
    }
}

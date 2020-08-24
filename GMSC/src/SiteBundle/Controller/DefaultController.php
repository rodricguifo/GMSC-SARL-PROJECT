<?php

namespace SiteBundle\Controller;

use SiteBundle\Entity\contact;
use SiteBundle\Form\contactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {

        return $this->render('@Site/Default/index.html.twig');

    }
}

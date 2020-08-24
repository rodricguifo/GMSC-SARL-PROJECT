<?php

namespace SiteBundle\Controller;

use SiteBundle\Entity\contact;
use SiteBundle\Form\contactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SiteController extends Controller
{
    public function sendMailAction(Request $request)
    {
        $contact = new contact();
        $form = $this->createForm(contactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $sujet = $contact->getSujet();
            $adresse = $contact->getAdresse();
            $body = $contact->getMessage();
            $username = 'contact@gmsc-sarl.com';
            $message = \Swift_Message::newInstance()
                ->setSubject($sujet)
                ->setFrom($adresse)
                ->setTo($username)
                ->setBody($body);
            $this->get('mailer')->send($message);
            $this->get('session')->getFlashBag()->add('notice', 'Message envoyé avec success!');
        }
        return $this->render("@Site/Site/sendMail.html.twig", array("form" => $form->createView()));
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Win10-Space
 * Date: 09/04/2019
 * Time: 00:57
 */

namespace App\EventListener;



use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\FOSUserEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\RouterInterface;

class RedirectAfterRegistrationSubscriber implements EventSubscriberInterface
{
    private $router;

    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    public function onRegistrationSuccess(FormEvent $event)
    {
        $url = $this->router->generate('projects');
        $response = new RedirectResponse($url);
        $event->setResponse($response);
    }

    public static function getSubscribedEvents()
    {
        return [
            FOSUserEvents::REGISTRATION_SUCCESS => 'onRegistrationSuccess'
        ];
    }
}



<?php

namespace AppBundle\Controller;

use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\View\RouteRedirectView;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class UsersController
 * @package AppBundle\Controller
 * @Annotations\RouteResource("users")
 */
class UsersController extends FOSRestController implements ClassResourceInterface
{
	/**
	 * Get a single User.
	 *
	 * @ApiDoc(
	 *   output = "AppBundle\Entity\User",
	 *   statusCodes = {
	 *     200 = "Returned when successful",
	 *     404 = "Returned when not found"
	 *   }
	 * )
	 *
	 * @param int   $userId     the user id
	 *
	 * @throws NotFoundHttpException when does not exist
	 *
	 * @return View
	 */
	public function getAction($userId)
	{
		$user = $this->getDoctrine()->getRepository('AppBundle:User')->find($userId);
		
		$view = $this->view($user);
		
		return $view;
	}
	
	/**
	 * Gets a collection of Users.
	 *
	 * @ApiDoc(
	 *   output = "AppBundle\Entity\User",
	 *   statusCodes = {
	 *     405 = "Method not allowed"
	 *   }
	 * )
	 *
	 * @throws MethodNotAllowedHttpException
	 *
	 * @return View
	 */
	public function cgetAction()
	{
		throw new MethodNotAllowedHttpException([], "Method not allowed");
	}
}

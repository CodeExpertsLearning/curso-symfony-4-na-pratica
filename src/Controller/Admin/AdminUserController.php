<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Form\UserType;
use App\Service\MailerService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/admin/users")
 */
class AdminUserController extends Controller
{
    /**
     * @Route("/", name="admin_user")
     */
    public function index()
    {
    	$users = $this->getDoctrine()
                      ->getRepository(User::class)
                      ->findAll();

        return $this->render('admin/users/index.html.twig', [
        	'users' => $users
        ]);
    }

	/**
	 * @Route("/new", name="admin_user_new")
	 */
    public function new(Request $request)
    {
    	$form = $this->createForm(UserType::class);
		$form->handleRequest($request);

		if($form->isSubmitted() && $form->isValid()) {
			$user = $form->getData();
			$plainPassword = $user->getPassword();
			$password = $this->get('security.password_encoder')->encodePassword(new User(), $user->getPassword());

			$user->setPassword($password);
			$user->setCreatedAt(new \DateTime("now", new \DateTimeZone("America/Sao_Paulo")));
			$user->setUpdatedAt(new \DateTime("now", new \DateTimeZone("America/Sao_Paulo")));

			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->persist($user);
			$entityManager->flush();

			//Envio de Email com nosso Service
			$mailer = $this->get('App\Service\MailerService');
			$data = [
				'subject' => 'Sua conta foi criada',
				'name'    => $user->getFirstName(),
				'email' => $user->getEmail(),
				'username' => $user->getUsername(),
				'password' => $plainPassword
			];

			$view = $this->renderView('emails/signup.html.twig', $data);
			$mailer->send($data, $view);

			$this->addFlash('success', 'Usuário salvo com sucesso!');
			return $this->redirectToRoute('admin_user');
		}


	    return $this->render('admin/users/new.html.twig', [
		    'form' => $form->createView()
	    ]);
    }

    /**
	 * @Route("/update/{id}", name="admin_user_update")
	 */
    public function update(Request $request, User $id)
    {
	    $form = $this->createForm(UserType::class, $id);
	    $form->handleRequest($request);

	    if($form->isSubmitted() && $form->isValid()) {
		    $user = $form->getData();
		    $password = $this->get('security.password_encoder')->encodePassword(new User(), $user->getPassword());

		    $user->setPassword($password);
		    $user->setUpdatedAt(new \DateTime("now", new \DateTimeZone("America/Sao_Paulo")));

		    $entityManager = $this->getDoctrine()->getManager();
		    $entityManager->merge($user);
		    $entityManager->flush();

		    $this->addFlash('success', 'Usuário atualizado com sucesso!');
		    return $this->redirectToRoute('admin_user');
	    }

	    return $this->render('admin/users/update.html.twig', [
		    'form' => $form->createView()
	    ]);
    }

    /**
	 * @Route("/delete/{id}", name="admin_user_delete")
	 */
    public function delete(User $user)
    {
	    $entityManager = $this->getDoctrine()->getManager();
	    $entityManager->remove($user);
	    $entityManager->flush();

	    $this->addFlash('success', 'Usuário removido com sucesso!');
	    return $this->redirectToRoute('admin_user');
    }
}

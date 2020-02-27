<?php


namespace App\Notifier;


use FOS\UserBundle\Mailer\MailerInterface as FOSMailerInterface;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class AppNotifier implements FOSMailerInterface {

	/**
	 * @var MailerInterface
	 */
	private $mailer;

	/**
	 * @var UrlGeneratorInterface
	 */
	private $router;

	public function __construct(MailerInterface $mailer, UrlGeneratorInterface $router) {
		$this->mailer = $mailer;
		$this->router = $router;
	}


	public function sendConfirmationEmailMessage(UserInterface $user) {
		$url = $this->router->generate('fos_user_registration_confirm', ['token' => $user->getConfirmationToken()], UrlGeneratorInterface::ABSOLUTE_URL);
		$email = (new TemplatedEmail())
			->from('info@swim-tracking.herokuapp.com')
			->to(new Address((string)$user->getEmail()))
			->subject('Thanks for signing up!')
			->htmlTemplate('user/mail/confirmation.email.html.twig')
			->textTemplate("user/mail/confirmation.email.txt.twig")
			->context([
				'user'            => $user,
				'confirmationUrl' => $url,
			]);

		$this->mailer->send($email);
	}

	public function sendResettingEmailMessage(UserInterface $user) {

	}

}
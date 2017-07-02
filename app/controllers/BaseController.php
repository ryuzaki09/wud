<?php

class BaseController extends Controller {

    private $emailLib;
    private $mail;

    public function __construct()
    {
        $email_library = \Config::get('app.email_library');
        if ($email_library == "phpmailer") {
            $this->emailLib = new PHPMailer;
            $this->emailLib->isSMTP();
            $this->emailLib->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

        }

        if ($email_library == "swiftmailer") {
            $transport = Swift_MailTransport::newInstance();
            $this->emailLib = new Swift_Mailer($transport);
            $this->mail = Swift_Message::newInstance();
        }
    }
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

    protected function setFrom($from)
    {
        if ($this->emailLib instanceof PHPMailer) {
            $this->emailLib->setFrom($from);
        }

        if ($this->emailLib instanceof Swift_Mailer) {
            $this->mail->setFrom($from);
        }
    }

    protected function setTo($to)
    {
        if ($this->emailLib instanceof PHPMailer) {
            $this->emailLib->addAddress($to);
        }

        if ($this->emailLib instanceof Swift_Mailer) {
            $this->mail->setTo($to);
        }
    }

    protected function setBody($body)
    {
        if ($this->emailLib instanceof PHPMailer) {
            $this->emailLib->Body = $body;
        }

        if ($this->emailLib instanceof Swift_Mailer) {
            $this->mail->setBody($body);
        }
        
    }

    protected function sendMail()
    {
        if ($this->emailLib instanceof PHPMailer) {
            if (!$this->emailLib->send()) {
                error_log("send res: ".var_Export($result, true));
            }
        }

        if ($this->emailLib instanceof Swift_Mailer) {
            if (!$this->emailLib->send($this->mail)) {
                error_log("send res: ".var_Export($result, true));
            }
        }

    }


}

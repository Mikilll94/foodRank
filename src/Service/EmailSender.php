<?php

namespace App\Service;

class EmailSender
{
    /**
     * EmailSender constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param $subject
     * @param $template
     * @param $to
     */
    public function sendMail($subject, $template, $to)
    {
        $https['ssl']['verify_peer'] = false;
        $https['ssl']['verify_peer_name'] = false;

        $sender_email = 'portal.foodrank@gmail.com';

        $transport = (new \Swift_SmtpTransport('smtp.gmail.com', '587', 'tls'))
            ->setUsername($sender_email)
            ->setPassword('foodrankportal123')
            ->setStreamOptions($https);

        $message = (new \Swift_Message($subject))
            ->setFrom($sender_email)
            ->setTo($to)
            ->setBody($template)
            ->setContentType('text/html')
            ->setCharset('utf-8');
        (new \Swift_Mailer($transport))->send($message);
    }
}
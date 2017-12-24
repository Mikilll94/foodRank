<?php

namespace App\Service;

class EmailSender
{
    /**
     * @param $subject
     * @param $template
     * @param $to
     */
    public function sendMail($subject, $template, $to)
    {
        $https['ssl']['verify_peer'] = FALSE;
        $https['ssl']['verify_peer_name'] = FALSE;

        $transport = (new \Swift_SmtpTransport('smtp.gmail.com', '587', 'tls'))
            ->setUsername('wasniewskimikolaj@gmail.com')
            ->setPassword('svwhlfeixxsjxaoy')
            ->setStreamOptions($https);

        $message = (new \Swift_Message($subject))
            ->setFrom('no-reply@foodrank.com')
            ->setTo($to)
            ->setBody($template);
        (new \Swift_Mailer($transport))->send($message);
    }
}
<?php

/**
 * User
 *
 * A user of the system
 */
class User
{
    /**
     * First name
     * @var string
     */
    public $first_name;
    
    /**
     * Last name
     * @var string
     */
    public $surname;

    /**
     * Email address
     * @var string
     */
    public $email;

    /**
     * @var Mailer
     */
    protected $mailer;

    /**
     * @param Mailer $mailer
     */
    public function setMailer(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Get the user's full name from their first name and surname
     *
     * @return string The user's full name
     */
    public function getFullName()
    {
        return trim("$this->first_name $this->surname");
    }

    /**
     * Send the user a message
     *
     * @param string $message The message
     *
     * @return boolean True if sent, false otherwise
     */
    public function notify($message)
    {
        return $this->mailer->sendMessage($this->email, $message);
    }
}
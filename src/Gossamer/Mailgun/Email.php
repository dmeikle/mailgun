<?php
/*
 *  This file is part of the Quantum Unit Solutions development package.
 * 
 *  (c) Quantum Unit Solutions <http://github.com/dmeikle/>
 * 
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

/** *
 * Author: dave
 * Date: 3/16/2017
 * Time: 12:16 PM
 */

namespace Gossamer\Mailgun;


class Email
{
    private $to;

    private $toName;

    private $fromName;

    private $from;

    private $subject;

    private $message;

    private $htmlMessage;

    /**
     * @return mixed
     */
    public function getToName()
    {
        return $this->toName;
    }

    /**
     * @param mixed $toName
     * @return Email
     */
    public function setToName(array $toName)
    {
        $this->toName = $toName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFromName()
    {
        return $this->fromName;
    }

    /**
     * @param mixed $fromName
     * @return Email
     */
    public function setFromName(array $fromName)
    {
        $this->fromName = $fromName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHtmlMessage()
    {
        return $this->htmlMessage;
    }

    /**
     * @param mixed $htmlMessage
     * @return Email
     */
    public function setHtmlMessage($htmlMessage)
    {
        $this->htmlMessage = $htmlMessage;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     * @return Email
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param mixed $to
     * @return Email
     */
    public function setTo($to)
    {
        $this->to = $to;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param mixed $from
     * @return Email
     */
    public function setFrom($from)
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     * @return Email
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }



}
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
 * Time: 12:34 PM
 */

namespace Gossamer\Mailgun;


use Mailgun\Mailgun;

class Mailman
{
    private $credentials;

    public function __construct(array $credentials)
    {
        $this->credentials = $credentials;
    }

    public function send(Email $email) {
        //this will throw a KeysNotSetException if failed - throw it to the calling method to fix
        $validator = new CredentialsValidator();
        $validator->validate($this->credentials);
        unset($validator);

        $mg = new Mailgun($this->credentials['apikey']);
//$mg->setApiVersion('bb916b76');
//$mg->setSslEnabled(false);

        $from = strlen($email->getFrom() == 0) ? $this->credentials['from'] : $email->getFrom();
        if(strlen($email->getHtmlMessage()) > 0) {
            $mg->MessageBuilder()->setHtmlBody($email->getHtmlMessage());
        }
# Now, compose and send your message.
        return $mg->sendMessage($this->credentials['domain'], array('from'    => $from,
            'to'      => $email->getTo(),
            'subject' => $email->getSubject(),
            'text'    => $email->getMessage()));
    }

    public function sendHTMLEmail(Email $email) {
        //this will throw a KeysNotSetException if failed - throw it to the calling method to fix
        $validator = new CredentialsValidator();
        $validator->validate($this->credentials);
        unset($validator);
        $from = strlen($email->getFrom() == 0) ? $this->credentials['from'] : $email->getFrom();
        $mg = new Mailgun($this->credentials['apikey']);

        $messageBldr = $mg->MessageBuilder();

        # Define the from address.
        $messageBldr->setFromAddress($from, array($this->credentials['admin_from_name']));
        # Define a to recipient.
        $messageBldr->addToRecipient($email->getTo(), array("first" => "John", "last" => "Doe"));
        # Define the subject.
        $messageBldr->setSubject($email->getSubject());
        # Define the body of the message.
        $messageBldr->setTextBody($email->getMessage());
        $messageBldr->setHtmlBody($email->getHtmlMessage());



# Now, compose and send your message.
        return $mg->post($this->credentials['domain'] . "/messages", $messageBldr->getMessage(), $messageBldr->getFiles());
    }
}
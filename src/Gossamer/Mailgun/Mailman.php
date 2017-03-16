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

# Now, compose and send your message.
        return $mg->sendMessage($this->credentials['domain'], array('from'    => $from,
            'to'      => $email->getTo(),
            'subject' => $email->getSubject(),
            'text'    => $email->getMessage()));
    }
}
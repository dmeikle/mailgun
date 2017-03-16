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
 * Time: 1:02 PM
 */

namespace tests\Gossamer\Mailgun;





use Gossamer\Mailgun\Email;
use Gossamer\Mailgun\Mailman;

class MailmainTest extends \tests\BaseTest
{

    public function testSend()
    {
        $mailman = new Mailman($this->getCredentials());
        $mailman->send($this->getEmail());
    }

    private function getEmail() {
        $email = new Email();
        $email->setFrom('phpunit@binghan.net')->setTo('dave@binghan.net')->setSubject('phpunit test')
            ->setMessage("this is a phpunit test
            this is only a test
            testing testing testing");

        return $email;

    }

    protected function getCredentials() {
        return array(
            'apikey' => 'key-apik-key-goes-here',
            'domain' => 'mg.domain-goes-here.com',
            'from' => 'postmaster@website-domain-goes-here'
        );
    }
}
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

    public function testSendHTML(){
        $mailman = new Mailman($this->getCredentials());
        $mailman->send($this->getHTMLEmail());
    }

    private function getEmail() {
        $email = new Email();
        $email->setFrom('phpunit@binghan.net')->setTo('dave@binghan.net')->setSubject('phpunit test')
            ->setMessage("this is a phpunit test
            this is only a test
            testing testing testing");

        return $email;

    }

    private function getHTMLEmail() {
        $email = $this->getEmail();
        $email->setHtmlMessage('<html>
    <head>

    </head>
    <body>
        <table>
            <tr>
                <td>
                    Bill To:
                    <table></table>
                </td>
                <td>
                    Ship To:
                    <table></table>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                Items:
                <table><tr><th>Title</th><th>Price</th><th>Quantity</th><th>Total</th><tr><td>Ginseng Can</td><td>231.00</td><td>4</td><td>924.00</td></tr>
<tr><td colspan="2"></td><td>Subtotal</td><td>924</td><tr><td colspan="2"></td><td>Shipping</td><td>0</td><tr><td colspan="2"></td><td>Tax</td><td>0</td><tr><td colspan="2"></td><td>Total</td><td>924</td></table>
                </td>
            </tr>
        </table>
    </body>
</html>');

        return $email;
    }

    protected function getCredentials() {
        return array(
            'apikey' => 'key-apik-key-goes-here',
            'domain' => 'mg.domain-goes-here.com',
            'from' => 'postmaster@website-domain-goes-here',
            'admin_notification_email' => 'dave@binghan.net'
        );
    }
}
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
 * Time: 12:47 PM
 */

namespace Gossamer\Mailgun;


use Gossamer\Mailgun\Exceptions\KeyNotSetException;

class CredentialsValidator
{

    public function validate(array $credentials) {
        $errors = '';
        if(!array_key_exists('apikey', $credentials)) {
            $errors .= "apikey not set\r\n";
        }
        if(!array_key_exists('domain', $credentials)) {
            $errors .= "domain not set\r\n";
        }
        if(!array_key_exists('from', $credentials)) {
            $errors .= "from email not set\r\n";
        }
        if(!array_key_exists('admin_notification_email', $credentials)) {
            $errors .= "admin_notification_email not set\r\n";
        }

        if(strlen($errors) > 0) {
            throw new KeyNotSetException($errors);
        }
    }
}
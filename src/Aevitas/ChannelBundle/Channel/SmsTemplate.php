<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MailerTemplate
 *
 * @author apple
 */

namespace Aevitas\ChannelBundle\Channel;

use Aevitas\ChannelBundle\Channel\AbstractChannelTemplate;
use Symfony\Bundle\TwigBundle\Loader\FilesystemLoader;

class SmsTemplate extends AbstractChannelTemplate {

    public function getType() {
        return 'sms';
    }

}
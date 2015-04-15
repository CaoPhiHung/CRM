<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aevitas\ConfigBundle\Form;

use Aevitas\ConfigBundle\Config\ConfigData;
use Aevitas\ConfigBundle\Config\Configuration;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Doctrine Form Type.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class ConfigDataType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        if ($builder->getData()->getConfig() == Configuration::LOYALTY)
            $builder->add('locale', 'text')
                    ->add('cdn', 'text')
                    ->add('smsclient')
                    ->add('smspassword')
                    ->add('facebook_app_id')
                    ->add('facebook_secret')
                    ->add('facebook_share_description', 'textarea')
                    ->add('facebook_share_caption')
                    ->add('facebook_share_name')
                    ->add('facebook_share_picture')
                    ->add('facebook_share_link')
                    ->add('categories')
//                    ->add('gold', 'number', array('label' => 'Gold Tipping Point'))
//                    ->add('goldlimit', 'number', array('label' => 'Gold limitation per quarter'))
//                    ->add('platin', 'number', array('label' => 'Platin Tipping Point'))
//                    ->add('platinlimit', 'number', array('label' => 'Platin limitation per quarter'))
                    ->add('goldinterval', 'number', array('label' => 'Total Revenue for Gold 12months'))
                    ->add('platinuminterval', 'number', array('label' => 'Total Revenue for Platinum 12months'))
                    ->add('prbssilver', 'number', array('label' => 'Base Rate for Silver Class'))
                    ->add('prbsgold', 'number', array('label' => 'Base Rate for Gold Class'))
                    ->add('prbsplatin', 'number', array('label' => 'Base Rate for Platin Class'))
                    ->add('praddress1', 'number', array('label' => 'Address'))
                    ->add('prfone', 'number', array('label' => 'Cellphone'))
                    ->add('premail', 'number', array('label' => 'Email'))
                    ->add('prdob', 'number', array('label' => 'Birthday'))
                    ->add('prfb', 'number', array('label' => 'Point for Integrate Facebook'))
                    ->add('prcity', 'number', array('label' => 'City'))
                    ->add('prdistrict', 'number', array('label' => 'District'))
                    ->add('prkids', 'number', array('label' => 'Child'))
                    ->add('procpu', 'number', array('label' => 'Occupation'))
                    ->add('princo', 'number', array('label' => 'Income'))
                    ->add('pranni', 'number', array('label' => 'Anniversary'))
                    ->add('prsex', 'number', array('label' => 'Sex'))
                    ->add('prfirstname', 'number', array('label' => 'Firstname'))
                    ->add('prlastname', 'number', array('label' => 'Lastname'))
                    ->add('prmari', 'number', array('label' => 'Mariage'))
                    ->add('redeemsilver', 'number', array('label' => 'Baserate for Silver redeemption'))
                    ->add('redeemgold', 'number', array('label' => 'Baserate for Gold redeemption'))
                    ->add('redeemplatinum', 'number', array('label' => 'Baserate for Platinum redeemption'))
                    ->add('cashback', 'number', array('label' => 'Percentage for cash(point) back'))
                    ->add('refcel', 'number', array('label' => 'Point for referal cellphone at store'))
                    ->add('ref', 'text', array('label' => 'Point for referal online'))
                    ->add('joinbonus', 'number', array('label' => 'Bonus for joining'))
                    ->add('redeemlimit', 'number', array('label' => 'Minimum point to redeem'))
                    ->add('expiredgold', 'number', array('label' => 'Lifetime for Gold Level(days)'))
                    ->add('expiredplatinum', 'number', array('label' => 'Lifetime for Platinum Level(days)'));
        else if ($builder->getData()->getConfig() == Configuration::DATABASE)
            $builder
                    ->add('dbname', 'text', array('required' => false))
                    ->add('dbhost', 'text', array('required' => false))
                    ->add('dbport', 'text', array('required' => false))
                    ->add('dbuser', 'text', array('required' => false))
                    ->add('dbpassword', 'repeated', array(
                        'required' => false,
                        'type' => 'password',
                        'first_name' => 'password',
                        'second_name' => 'password_again',
                        'invalid_message' => 'The password fields must match.',
                    ))
            ;
        else
            $builder->add('mtransport')
                    ->add('mhost')
                    ->add('muser')
                    ->add('mpassword');
    }

    public function getName() {
        return 'system_setting';
    }

}

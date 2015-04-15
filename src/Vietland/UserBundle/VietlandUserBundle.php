<?php

namespace Vietland\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class VietlandUserBundle extends Bundle {

    public function getParent() {
        return 'FOSUserBundle';
    }

}

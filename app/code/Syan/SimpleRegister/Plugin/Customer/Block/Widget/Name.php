<?php

namespace Syan\SimpleRegister\Plugin\Customer\Block\Widget;
class Name
{
    public function after_construct(\Magento\Customer\Block\Widget\Name $result)
    {

        $result->setTemplate('Syan_SimpleRegister::widget/name.phtml');
        return $result;
    }
}
?>

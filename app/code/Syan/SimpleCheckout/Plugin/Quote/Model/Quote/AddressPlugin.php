<?php


namespace Syan\SimpleCheckout\Plugin\Quote\Model\Quote;

// In this plugin we check if the address has a first and last name associated with it. 
// If not then we emit a placeholder value to satisfy the verification. 
// This is much simpler than having to override all the classes involved in address verification.

class AddressPlugin
{
    public function afterGetFirstname(
        \Magento\Quote\Model\Quote\Address $subject,
        $result
    ) {
        if (empty(trim($result))) {
            return "N/A";
        }

        return $result;
    }

    public function afterGetLastname(
        \Magento\Quote\Model\Quote\Address $subject,
        $result
    ) {
        if (empty(trim($result))) {
            return "N/A";
        }

        return $result;
    }

    public function afterGetCity(
        \Magento\Quote\Model\Quote\Address $subject,
        $result
    ) {
        if (empty(trim($result))) {
            return "N/A";
        }

        return $result;
    }


}
<?php


namespace Syan\SimpleCheckout\Plugin\Checkout\Block\Checkout;

// All this does is change the first and last name fields to optional in the checkout address forms. 
// However, if the fields are left blank, the various address verifications that occur 
// on the server-side will fail so there's one more step to get around the verification.


class LayoutProcessorPlugin
{

    public function afterProcess(
        \Magento\Checkout\Block\Checkout\LayoutProcessor $subject,
        $jsLayout
    ) {
        // Make fields not required
        
        $optional = [
            'validation' => [
                'required_entry' => false
            ]
        ];
            
        $hide = [
            'visible' => false,
            'validation' => [
                'required_entry' => false
            ]
        ];

        // Change in shipping address

        $firstnameField = &$jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']
                          ['children']['shippingAddress']['children']['shipping-address-fieldset']['children']['firstname'];
        $lastnameField = &$jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']
                         ['children']['shippingAddress']['children']['shipping-address-fieldset']['children']['lastname'];
                         
        $country = &$jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']
                            ['children']['shippingAddress']['children']['shipping-address-fieldset'] 
                            ['children']['country_id'];

        $city = &$jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']
                            ['children']['shippingAddress']['children']['shipping-address-fieldset'] 
                            ['children']['city'];
        
        // $email = &$jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']
                            // ['children']['shippingAddress']['children']['customer-email'];
        
                            
        $firstnameField = array_merge($firstnameField, $optional);

        $lastnameField = array_merge($lastnameField, $hide);

        $country = array_merge($country, $hide);
        
        $city = array_merge($city, $hide);

        // $email = array_merge($email, $optional);


        // Change in billing address

        foreach ($jsLayout['components']['checkout']['children']['steps']['children']['billing-step']['children']
                 ['payment']['children']['payments-list']['children'] as &$child)
        {
            if (isset($child['children']['form-fields'])) {
                $child['children']['form-fields']['children']['firstname'] =
                    array_merge($child['children']['form-fields']['children']['firstname'], $optional);
                $child['children']['form-fields']['children']['lastname'] =
                    array_merge($child['children']['form-fields']['children']['lastname'], $hide);
                // $child['children']['form-fields']['children']['country_id'] =
                //     array_merge($child['children']['form-fields']['children']['country_id'], $hide);
                // $child['children']['form-fields']['children']['city'] =
                //     array_merge($child['children']['form-fields']['children']['city'], $hide);
            }
        }

        return $jsLayout;
    }
    
}

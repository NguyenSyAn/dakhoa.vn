<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Syan\MagentoCustomer\Block\Html;

/**
 * Html page header block
 *
 * @api
 * @since 100.0.2
 */
class AccountLink extends \Magento\Framework\View\Element\Template
{
    protected $_template = 'Magento_Theme::html/header.phtml';
    protected $_customerUrl;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Customer\Model\Url $customerUrl,
        array $data = []
    ) {
        $this->_customerUrl = $customerUrl;
        parent::__construct($context, $data);
    }

    public function getWelcome()
    {
        if (empty($this->_data['welcome'])) {
            $this->_data['welcome'] = $this->_scopeConfig->getValue(
                'design/header/welcome',
                \Magento\Store\Model\ScopeInterface::SCOPE_STORE
            );
        }
        return __($this->_data['welcome']);
    }

    public function getHref()
    {
        return $this->_customerUrl->getAccountUrl();
    }
}

<?php
namespace Syan\MagentoStore\Block;

class StoreInfo extends \Magento\Framework\View\Element\Template
{
    protected $_storeInfo;
    protected $_storeManagerInterface;
    protected $scopeConfig;

	public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Store\Model\Information $storeInfo,
        \Magento\Store\Model\StoreManagerInterface $storeManagerInterface,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        array $data = []
    )
	{
        $this->_storeInfo = $storeInfo;
        $this->_storeManagerInterface = $storeManagerInterface;
        $this->_scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }
    
    public function getName()
    {
         $name = $this->_storeInfo->getStoreInformationObject($this->_storeManagerInterface->getStore())->getName();
         return (!empty($name)) ? $name : '' ;
    }

	public function getPhoneNumber()
    {
         $telephone = $this->_storeInfo->getStoreInformationObject($this->_storeManagerInterface->getStore())->getPhone();
         return (!empty($telephone)) ? $telephone : '' ;
    }

    public function getStreet()
    {
         $street = $this->_storeInfo->getStoreInformationObject($this->_storeManagerInterface->getStore())->getDataByKey('street_line1');
         return (!empty($street)) ? $street : '' ;
        //  return $street;
    }
    

    public function getStoreEmail()
    {
        return $this->_scopeConfig->getValue(
            'trans_email/ident_sales/email',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
}

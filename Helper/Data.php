<?php
namespace Improntus\PDPShippingRate\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Improntus PDPShippingRate Helper
 *
 */
class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    protected $_storeManager;
    /**
     * @param \Magento\Framework\App\Helper\Context
     * @param \Magento\Store\Model\StoreManagerInterface
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager
        ) {
        parent::__construct($context);
        $this->_storeManager = $storeManager;
    }

    public function getConfig($key, $store = null)
    {
        $store = $this->_storeManager->getStore($store);

        $result = $this->scopeConfig->getValue(
             $key,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
            $store);
        return $result;
    }


    public function getEnable($storeId = null)
    {
        return $this->getConfig('improntus_pdpshippingrate/general/enable', $storeId);
    }

    public function getDefaultCountryCode($storeId = null){
        return $this->getConfig('general/country/default', $storeId);
    }
}

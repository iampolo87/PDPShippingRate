<?php
namespace Improntus\PDPShippingRate\Block;

use Improntus\PDPShippingRate\Helper\Data;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\View\Element\Template;
use Magento\Catalog\Block\Product\View;

class Estimate extends Template
{
    protected $_product_view;
    protected $_helperData;

    public function __construct(
        View $_product_view,
        Context $context,
        Data $helperData,
        array $data = []
    ) {
        $this->_product_view = $_product_view;
        $this->_helperData = $helperData;
        parent::__construct($context, $data);
    }

    /**
     * @return \Magento\Catalog\Model\Product
     */
    public function getProductInfo() {
        return $this->_product_view->getProduct();
    }
    /**
     * Prepare Content HTML
     *
     * @return string
     */
    protected function _toHtml()
    {
        if(!$this->_helperData->getEnable()){
            return;
        }
        return parent::_toHtml();
    }

}
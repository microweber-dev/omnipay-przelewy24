<?php

namespace Omnipay\Przelewy24;

use Omnipay\Common\AbstractGateway;

/**
 * Przelewy24 Gateway
 */
class Gateway extends AbstractGateway
{
    /**
     * Get gateway display name
     *
     * This can be used by carts to get the display name for each gateway.
     */
    public function getName()
    {
        return 'Przelewy24';
    }

    /**
     * @return array
     */
    public function getDefaultParameters()
    {
        return array(
            'merchantId' => '',
            'posId'      => '',
            'crc'        => '',
            'testMode'   => false,
        );
    }

    /**
     * @return string
     */
    public function getMerchantId()
    {
        return $this->getParameter('merchantId');
    }

    /**
     * @param  string $value
     * @return $this
     */
    public function setMerchantId($value)
    {
        return $this->setParameter('merchantId', $value);
    }

    /**
     * @return string
     */
    public function getPosId()
    {
        return $this->getParameter('posId');
    }

    /**
     * @param  string $value
     * @return $this
     */
    public function setPosId($value)
    {
        return $this->setParameter('posId', $value);
    }

    /**
     * @return string
     */
    public function getCrc()
    {
        return $this->getParameter('crc');
    }

    /**
     * @param  string $value
     * @return $this
     */
    public function setCrc($value)
    {
        return $this->setParameter('crc', $value);
    }

    /**
     * @param  array $parameters
     * @return \Omnipay\Przelewy24\Message\PurchaseRequest
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Przelewy24\Message\PurchaseRequest', $parameters);
    }

    /**
     * @param  array $parameters
     * @return \Omnipay\Przelewy24\Message\CompletePurchaseRequest
     */
    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Przelewy24\Message\CompletePurchaseRequest', $parameters);
    }
}

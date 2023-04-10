<?php

namespace Omnipay\Przelewy24\Message;

use Omnipay\Common\Message\AbstractRequest as BaseAbstractRequest;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractRequest extends BaseAbstractRequest
{
    protected $liveEndpoint = 'https://secure.przelewy24.pl/';
    protected $testEndpoint = 'https://sandbox.przelewy24.pl/';

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
     * @return string
     */
    public function getChannel()
    {
        return $this->getParameter('channel');
    }

    /**
     * @param  string $value
     * @return $this
     */
    public function setChannel($value)
    {
        return $this->setParameter('channel', $value);
    }

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
    }

    /**
     * @param $method
     * @param $endpoint
     * @param $data
     * @return ResponseInterface
     */
    protected function sendRequest($method, $endpoint, $data = null)
    {
        if (null === $data) {
            $data = array();
        }

        $data['p24_merchant_id'] = $this->getMerchantId();
        $data['p24_pos_id'] = $this->getMerchantId();

        return $this->httpClient->request(
            $method,
            $this->getEndpoint() . $endpoint,
            array('Content-Type' => 'application/x-www-form-urlencoded'),
            http_build_query($data, null, '&')
        );
    }
}

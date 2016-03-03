<?php

namespace Omnipay\Przelewy24\Message;

use Omnipay\Common\Message\RedirectResponseInterface;

class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{
    /**
     * {@inheritdoc}
     */
    public function isSuccessful()
    {
        return '0' === $this->getCode();
    }

    public function getCode()
    {
        return $this->data['error'];
    }

    public function getToken()
    {
        return $this->data['token'];
    }

    /**
     * {@inheritdoc}
     */
    public function isRedirect()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function getRedirectUrl()
    {
        return $this->getEndpoint() . 'trnRequest/' . $this->getToken();
    }

    /**
     * {@inheritdoc}
     */
    public function getRedirectMethod()
    {
        return 'GET';
    }

    /**
     * {@inheritdoc}
     */
    public function getRedirectData()
    {
        return null;
    }
}

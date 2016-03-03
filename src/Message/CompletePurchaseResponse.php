<?php

namespace Omnipay\Przelewy24\Message;

/**
 * @todo: Reason this class exists
 */
class CompletePurchaseResponse extends AbstractResponse
{
    /**
     * Is the response successful?
     *
     * @return boolean
     */
    public function isSuccessful()
    {
        return '0' === $this->data['error'];
    }
}

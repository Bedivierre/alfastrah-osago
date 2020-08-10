<?php


namespace Bedivierre\Alfastrah\Responses\Payment;

/**
 * Trait CalculationResponse
 * @package Bedivierre\Alfastrah\Responses\Calculation
 * @property string payment_status
 */
class PaymentStatusResponse
{
    const NOT_PAID = 'NOT_PAID';
    const HOLDED = 'HOLDED';
    const PAID = 'PAID';
    const CANCELED = 'CANCELED';
    const REFUND_PROCESSED = 'REFUND_PROCESSED';
    const ACS_PAYING_INITIATED = 'ACS_PAYING_INITIATED';
    const DECLINED = 'DECLINED';
    const UNDEFINED  = 'UNDEFINED';
}
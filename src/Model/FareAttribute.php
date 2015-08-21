<?php
namespace Lsv\Gtfs\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Fare information for a transit organization's routes.
 * Optional
 *
 * @package Lsv\Gtfs\Model
 * @example https://developers.google.com/transit/gtfs/reference?hl=en#fare_attributestxt
 *
 * @JMS\XmlRoot("fare_attributes")
 */
class FareAttribute
{

    /**
     * This field contains an ID that uniquely identifies a fare class. The fare_id is dataset unique.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("fare_id")
     */
    protected $id;

    /**
     * This field contains the fare price, in the unit specified by currency_type.
     *
     * @var float
     * @JMS\Type("float")
     * @JMS\SerializedName("price")
     */
    protected $price;

    /**
     * This field defines the currency used to pay the fare.
     * Please use the ISO 4217 alphabetical currency codes (3 letter currency name code)
     * @see http://en.wikipedia.org/wiki/ISO_4217
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("currency_type")
     */
    protected $currency;

    /**
     * This field indicates when the fare must be paid. Valid values for this field are:
     * 0 - Fare is paid on board.
     * 1 - Fare must be paid before boarding.
     *
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("payment_method")
     */
    protected $payment_method;

    /**
     * The transfers field specifies the number of transfers permitted on this fare.
     * Valid values for this field are:
     *
     * 0 - No transfers permitted on this fare.
     * 1 - Passenger may transfer once.
     * 2 - Passenger may transfer twice.
     * null - unlimited transfers are permitted.
     *
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("transfers")
     */
    protected $transfers = null;

    /**
     * This field specifies the length of time in seconds before a transfer expires.
     * When used with a transfers value of 0, this field indicates how long a ticket is valid for a fare where no transfers are allowed.
     * Unless you intend to use this field to indicate ticket validity, this field should be omitted or empty when transfers is set to 0.
     *
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("transfer_duration")
     */
    protected $transfer_duration;

}

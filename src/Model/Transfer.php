<?php
namespace Lsv\Gtfs\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Rules for making connections at transfer points between routes.
 * Trip planners normally calculate transfer points based on the relative proximity of stops in each route.
 * For potentially ambiguous stop pairs, or transfers where you want to specify a particular choice, use this to define additional rules for making connections between routes.
 * Optional
 *
 * @package Lsv\Gtfs\Model
 * @example https://developers.google.com/transit/gtfs/reference?hl=en#transferstxt
 *
 * @JMS\XmlRoot("transfers")
 */
class Transfer
{

    /**
     * This field contains a stop ID that identifies a stop or station where a connection between routes begins.
     * Stop IDs are referenced from the a Stop model.
     * If the stop ID refers to a station that contains multiple stops, this transfer rule applies to all stops in that station.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("from_stop_id")
     */
    protected $from;

    /**
     * This field contains a stop ID that identifies a stop or station where a connection between routes ends.
     * Stop IDs are referenced from a Stop model.
     * If the stop ID refers to a station that contains multiple stops, this transfer rule applies to all stops in that station.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("from_stop_id")
     */
    protected $to;

    /**
     * This field specifies the type of connection for the specified (from_stop_id, to_stop_id) pair.
     * Valid values for this field are:
     * 0 or (empty) - This is a recommended transfer point between two routes.
     * 1 - This is a timed transfer point between two routes. The departing vehicle is expected to wait for the arriving one, with sufficient time for a passenger to transfer between routes.
     * 2 - This transfer requires a minimum amount of time between arrival and departure to ensure a connection. The time required to transfer is specified by min_transfer_time.
     * 3 - Transfers are not possible between routes at this location.
     *
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("transfer_type")
     */
    protected $type = 0;

    /**
     * When a connection between routes requires an amount of time between arrival and departure (transfer_type=2).
     * This field defines the amount of time that must be available in an itinerary to permit a transfer between routes at these stops.
     * This must be sufficient to permit a typical rider to move between the two stops, including buffer time to allow for schedule variance on each route.
     * This value must be entered in seconds, and must be a non-negative integer.
     *
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("min_transfer_time")
     */
    protected $time;

}

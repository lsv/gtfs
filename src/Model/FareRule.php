<?php

/*
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace Lsv\Gtfs\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Rules for applying fare information for a transit organization's routes.
 * This model allows you to specify how fares in FareAttribute model txt apply to an itinerary.
 * Most fare structures use some combination of the following rules:.
 *
 * Fare depends on origin or destination stations.
 * Fare depends on which zones the itinerary passes through.
 * Fare depends on which route the itinerary uses.
 * Optional
 *
 * @example https://developers.google.com/transit/gtfs/reference?hl=en#fare_rulestxt
 *
 * @JMS\XmlRoot("fare_rules")
 */
class FareRule
{
    /**
     * This field contains an ID that uniquely identifies a fare class.
     * This value is referenced from the FareAttribute model.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("fare_id")
     */
    protected $id;

    /**
     * This field associates the fare ID with a route. Route IDs are referenced from the Route model.
     * If you have several routes with the same fare attributes, create a new FareRule for each route.
     * For example, if fare class "b" is valid on route "TSW" and "TSE", this model would contain these rows for the fare class:
     * b,TSW
     * b,TSE.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("route_id")
     */
    protected $route_id = null;

    /**
     * This field associates the fare ID with an origin zone ID. Zone IDs are referenced from in a Stop model.
     * If you have several origin IDs with the same fare attributes, create a new FareRule for each origin ID.
     * For example, if fare class "b" is valid for all travel originating from either zone "2" or zone "8",
     * this model would contain these rows for the fare class:.
     *
     * b, , 2
     * b, , 8
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("origin_id")
     */
    protected $zone_id = null;

    /**
     * This field associates the fare ID with a destination zone ID. Zone IDs are referenced from the Stop model.
     * If you have several destination IDs with the same fare attributes, create a new FareRule for each destination ID.
     * For example, you could use the zone_ID and destination_ID fields together to specify that fare class "b" is valid for travel between zones 3 and 4,
     * and for travel between zones 3 and 5, the FareRule model would contain these rows for the fare class:
     * b, , 3,4
     * b, , 3,5.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("destination_id")
     */
    protected $destination_id = null;

    /**
     * This field associates the fare ID with a zone ID, referenced from a Stop model.
     * The fare ID is then associated with itineraries that pass through every contains_id zone.
     * For example, if fare class "c" is associated with all travel on the GRT route that passes through zones 5, 6, and 7 the FareRule model would contain these rows:
     * c,GRT,,,5
     * c,GRT,,,6
     * c,GRT,,,7
     * Because all contains_id zones must be matched for the fare to apply,
     * an itinerary that passes through zones 5 and 6 but not zone 7 would not have fare class "c".
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("contains_id")
     */
    protected $contains_id = null;
}

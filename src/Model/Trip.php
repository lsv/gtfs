<?php

namespace Lsv\Gtfs\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Trip
 * @package GTFS\Entity
 * @example https://developers.google.com/transit/gtfs/reference?hl=en#tripstxt
 *
 * @JMS\XmlRoot(name="trips")
 */
class Trip
{
    /**
     * This field contains an ID that identifies a trip. The id is dataset unique.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName(name="trip_id")
     */
    protected $id;

    /**
     * This field contains an ID that uniquely identifies a route.
     * This value is referenced from the Route object.
     *
     * @var Route
     * @JMS\Type("Route")
     * @JMS\SerializedName(name="route_id")
     */
    protected $route;

    /**
     * @todo Make this
     * @var
     */
    protected $service;

    /**
     * This field contains an ID that uniquely identifies a set of dates when service is available for one or more routes.
     * This value is referenced from the Calendar object.
     *
     * @var Calendar
     * @JMS\Type("Calendar")
     * @JMS\SerializedName(name="service_id")
     */
    protected $calendar;

    /**
     * The headsign field contains the text that appears on a sign that identifies the trip's destination to passengers.
     * Use this field to distinguish between different patterns of service in the same route.
     * If the headsign changes during a trip,
     * you can override the trip_headsign by specifying values for the the headsign field in StopTimes.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName(name="trip_headsign")
     */
    protected $headsign;

    /**
     * The short_name field contains the text that appears in schedules and sign boards to identify the trip to passengers,
     * for example, to identify train numbers for commuter rail trips. If riders do not commonly rely on trip names,
     * please leave this field blank.
     *
     * A short_name value, if provided, should uniquely identify a trip within a service day;
     * it should not be used for destination names or limited/express designations.
     *
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $short_name;

    /**
     * The direction field contains a binary value that indicates the direction of travel for a trip.
     * Use this field to distinguish between bi-directional trips with the same route_id.
     * This field is not used in routing; it provides a way to separate trips by direction when publishing time tables.
     * You can specify names for each direction with the headsign field.
     *
     * 0 - travel in one direction (e.g. outbound travel)
     * 1 - travel in the opposite direction (e.g. inbound travel)
     *
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName(name="direction_id")
     */
    protected $direction;

    /**
     * Not supported yet
     */
    protected $block;

    /**
     * The shape field contains an ID that defines a shape for the trip.
     * This value is referenced from a Shape.
     *
     * @var Shape
     * @JMS\Type("Shape")
     * @JMS\SerializedName("shape_id")
     */
    protected $shape;

    /**
     * 0 (or empty) - indicates that there is no accessibility information for the trip
     * 1 - indicates that the vehicle being used on this particular trip can accommodate at least one rider in a wheelchair
     * 2 - indicates that no riders in wheelchairs can be accommodated
     *
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("wheelchair_accessible")
     */
    protected $wheelchair;

    /**
     * 0 (or empty) - indicates that there is no bike information for the trip
     * 1 - indicates that the vehicle being used on this particular trip can accommodate at least one bicycle
     * 2 - indicates that no bicycles are allowed on this trip
     *
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("bikes_allowed")
     */
    protected $bikes;
}

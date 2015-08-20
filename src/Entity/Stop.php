<?php
namespace Lsv\Gtfs\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Stop
 * @package Lsv\Gtfs\Entity
 * @example https://developers.google.com/transit/gtfs/reference?hl=en#stopstxt
 *
 * @JMS\XmlRoot("stops")
 */
class Stop
{
    /**
     * This field contains an ID that uniquely identifies a stop or station. Multiple routes may use the same stop.
     * This field is dataset unique.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName(name="stop_id")
     */
    protected $id;

    /**
     * This field contains short text or a number that uniquely identifies the stop for passengers.
     * Stop codes are often used in phone-based transit information systems or printed on stop signage,
     * to make it easier for riders to get a stop schedule or real-time arrival information for a particular stop.
     *
     * This field should only be used for stop codes that are displayed to passengers.
     * For internal codes, use stop_id. This field should be left blank for stops without a code.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName(name="stop_code")
     */
    protected $code = null;

    /**
     * This field contains the name of a stop or station.
     * Please use a name that people will understand in the local and tourist vernacular.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName(name="stop_name")
     */
    protected $name;

    /**
     * This field contains a description of a stop.
     * Please provide useful, quality information.
     * Do not simply duplicate the name of the stop.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName(name="stop_desc")
     */
    protected $description;

    /**
     * This field contains the latitude of a stop or station.
     * The field value must be a valid WGS 84 latitude.
     *
     * @var float
     * @JMS\Type("float")
     * @JMS\SerializedName(name="stop_lat")
     */
    protected $latitude;

    /**
     * This field contains the longitude of a stop or station.
     * The field value must be a valid WGS 84 longitude value from -180 to 180.
     *
     * @var float
     * @JMS\Type("float")
     * @JMS\SerializedName(name="stop_long")
     */
    protected $longitude;

    /**
     * This field defines the fare zone for a stop ID.
     * Zone IDs are required if you want to provide fare information using fareRules
     * If this stop ID represents a station, the zone ID is ignored.
     *
     * @var FareRule
     * @JMS\Type("FareRule")
     * @JMS\SerializedName(name="zone_id")
     */
    protected $zone = null;

    /**
     * This field contains the URL of a web page about a particular stop.
     * This should be different from the agency_url and the route_url fields.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName(name="stop_url")
     */
    protected $url;

    /**
     * This field identifies whether this stop ID represents a stop or station.
     * If no location type is specified, or the location_type is blank, stop IDs are treated as stops.
     * Stations may have different properties from stops when they are represented on a map or used in trip planning.
     * The location type field can have the following values:
     *
     * 0 or blank - Stop. A location where passengers board or disembark from a transit vehicle.
     * 1 - Station. A physical structure or area that contains one or more stop.
     *
     * @var integer
     * @JMS\Type("integer")
     * @JMS\SerializedName(name="location_type")
     */
    protected $type = null;

    /**
     * For stops that are physically located inside stations,
     * this field identifies the station associated with the stop.
     * To use this field, a stop must also contain a row where this stop ID is assigned location type=1.
     *
     * @var Stop
     * @JMS\Type("Stop")
     * @JMS\SerializedName(name="parent_station")
     */
    protected $parent;

    /**
     * This field contains the timezone in which this stop or station is located.
     * Please refer to Wikipedia List of Timezones for a list of valid values.
     * If omitted, the stop should be assumed to be located in the timezone specified by agency_timezone.
     * When a stop has a parent station, the stop is considered to be in the timezone specified by the parent station's stop_timezone value.
     * If the parent has no stop_timezone value, the stops that belong to that station are assumed to be in the timezone specified by agency_timezone,
     * even if the stops have their own stop_timezone values. In other words, if a given stop has a parent_station value, any stop_timezone value specified for that stop must be ignored.
     * Even if stop_timezone values are provided in stops.txt, the times in stop_times.txt should continue to be specified as time since midnight in the timezone specified by agency_timezone in agency.txt.
     * This ensures that the time values in a trip always increase over the course of a trip, regardless of which timezones the trip crosses.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName(name="stop_timezone")
     */
    protected $timezone = null;

    /**
     * The wheelchair_boarding field identifies whether wheelchair boardings are possible from the specified stop or station.
     * The field can have the following values:
     *
     * 0 (or empty) - indicates that there is no accessibility information for the stop
     * 1 - indicates that at least some vehicles at this stop can be boarded by a rider in a wheelchair
     * 2 - wheelchair boarding is not possible at this stop
     * When a stop is part of a larger station complex, as indicated by a stop with a parent_station value, the stop's wheelchair_boarding field has the following additional semantics:
     * 0 (or empty) - the stop will inherit its wheelchair_boarding value from the parent station, if specified in the parent
     * 1 - there exists some accessible path from outside the station to the specific stop / platform
     * 2 - there exists no accessible path from outside the station to the specific stop / platform
     *
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName(name="wheelchair_boarding")
     */
    protected $wheelchair = null;
}

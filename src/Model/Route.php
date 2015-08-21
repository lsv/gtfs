<?php

namespace Lsv\Gtfs\Model;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;

/**
 * Transit routes. A route is a group of trips that are displayed to riders as a single service.
 * Required
 *
 * @package Lsv\Gtfs\Model
 * @example https://developers.google.com/transit/gtfs/reference?hl=en#routestxt
 *
 * @JMS\XmlRoot(name="routes")
 */
class Route
{
    /**
     * This field contains an ID that uniquely identifies a route. The route_id is dataset unique.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName(name="route_id")
     */
    protected $id;

    /**
     * This field defines an agency for the specified route. This value is referenced from the Agency model.
     * Use this field when you are providing data for routes from more than one agency.
     *
     * @JMS\Type("Agency")
     * @JMS\SerializedName(name="agency_id")
     */
    protected $agency;

    /**
     * The route_short_name contains the short name of a route.
     * This will often be a short, abstract identifier like "32", "100X", or "Green" that riders use to identify a route,
     * but which doesn't give any indication of what places the route serves.
     * At least one of route_short_name or route_long_name must be specified, or potentially both if appropriate.
     * If the route does not have a short name, please specify a route_long_name and use an empty string as the value for this field.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName(name="route_short_name")
     */
    protected $short_name;

    /**
     * The route_long_name contains the full name of a route.
     * This name is generally more descriptive than the route_short_name and will often include the route's destination or stop.
     * At least one of route_short_name or route_long_name must be specified, or potentially both if appropriate.
     * If the route does not have a long name, please specify a route_short_name and use an empty string as the value for this field.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName(name="route_long_name")
     */
    protected $long_name;

    /**
     * The route_desc field contains a description of a route.
     * Please provide useful, quality information.
     * Do not simply duplicate the name of the route. For example,
     * "A trains operate between Inwood-207 St, Manhattan and Far Rockaway-Mott Avenue, Queens at all times.
     * Also from about 6AM until about midnight,
     * additional A trains operate between Inwood-207 St and Lefferts Boulevard (trains typically alternate between Lefferts Blvd and Far Rockaway)."
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName(name="route_desc")
     */
    protected $description;

    /**
     * The route_type field describes the type of transportation used on a route. Valid values for this field are:
     * 0 - Tram, Streetcar, Light rail. Any light rail or street level system within a metropolitan area.
     * 1 - Subway, Metro. Any underground rail system within a metropolitan area.
     * 2 - Rail. Used for intercity or long-distance travel.
     * 3 - Bus. Used for short- and long-distance bus routes.
     * 4 - Ferry. Used for short- and long-distance boat service.
     * 5 - Cable car. Used for street-level cable cars where the cable runs beneath the car.
     * 6 - Gondola, Suspended cable car. Typically used for aerial cable cars where the car is suspended from the cable.
     * 7 - Funicular. Any rail system designed for steep inclines.
     *
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName(name="route_type")
     */
    protected $type;

    /**
     * The route_url field contains the URL of a web page about that particular route. This should be different from the agency_url.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName(name="route_url")
     */
    protected $url;

    /**
     * In systems that have colors assigned to routes, the route_color field defines a color that corresponds to a route.
     * The color must be provided as a six-character hexadecimal number, for example, 00FFFF.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName(name="route_color")
     */
    protected $color = 'FFFFFF';

    /**
     * The route_text_color field can be used to specify a legible color to use for text drawn against a background of route_color.
     * The color must be provided as a six-character hexadecimal number, for example, FFD700.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName(name="route_text_color")
     */
    protected $text_color = '000000';

    /**
     * @var Trip[]|ArrayCollection
     * @JMS\Type("ArrayCollection<Trip>")
     * @JMS\SerializedName(name="trips")
     */
    protected $trips;
}

<?php
namespace Lsv\Gtfs\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Rules for drawing lines on a map to represent a transit organization's routes.
 * Optional
 *
 * @package Lsv\Gtfs\Model
 * @example https://developers.google.com/transit/gtfs/reference?hl=en#shapestxt
 *
 * @JMS\XmlRoot("shapes")
 */
class Shape
{

    /**
     * This field contains an ID that uniquely identifies a shape.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("shape_id")
     */
    protected $id;

    /**
     * This field associates a shape point's latitude with a shape ID.
     * The field value must be a valid WGS 84 latitude.
     *
     * @var float
     * @JMS\Type("float")
     * @JMS\SerializedName("shape_pt_lat")
     */
    protected $latitude;

    /**
     * This field associates a shape point's latitude with a shape ID.
     * The field value must be a valid WGS 84 latitude.
     *
     * @var float
     * @JMS\Type("float")
     * @JMS\SerializedName("shape_pt_lon")
     */
    protected $longitude;

    /**
     * This field associates the latitude and longitude of a shape point with its sequence order along the shape.
     * The values for sequence must be non-negative integers, and they must increase along the trip.
     *
     * @var integer
     * @JMS\Type("integer")
     * @JMS\SerializedName("shape_pt_sequence")
     */
    protected $sequence;

    /**
     * When used in a Shape, this field positions a shape point as a distance traveled along a shape from the first shape point.
     * This field represents a real distance traveled along the route in units such as feet or kilometers.
     * This information allows the trip planner to determine how much of the shape to draw when showing part of a trip on the map.
     * The values used for this field must increase along with sequence: they cannot be used to show reverse travel along a route.
     *
     * @var float
     * @JMS\Type("float")
     * @JMS\SerializedName("shape_dist_traveled")
     */
    protected $traveled = null;

}

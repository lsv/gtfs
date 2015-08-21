<?php
namespace Lsv\Gtfs\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Class CalendarDate
 * @package Lsv\Gtfs\Model
 * @example https://developers.google.com/transit/gtfs/reference?hl=en#calendar_datestxt
 *
 * @JMS\XmlRoot("calendar_dates")
 */
class CalendarDate
{

    /**
     * This contains an ID that uniquely identifies a set of dates when service is available for one or more routes.
     * Each value can appear at most once in all Calendar models. This value is dataset unique. It is referenced by Trip model
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("service_id")
     */
    protected $service;

    /**
     * This field specifies a particular date when service availability is different than the norm.
     * You can use the type field to indicate whether service is available on the specified date.
     *
     * @var \DateTime
     * @JMS\Type("DateTime")
     * @JMS\SerializedName("date")
     */
    protected $date;

    /**
     * This indicates whether service is available on the date specified in the date field.
     *
     * A value of 1 indicates that service has been added for the specified date.
     * A value of 2 indicates that service has been removed for the specified date.
     * For example, suppose a route has one set of trips available on holidays and another set of trips available on all other days.
     * You could have one service that corresponds to the regular service schedule and another service that corresponds to the holiday schedule.
     * For a particular holiday, you would use the CalendarDate to add the holiday to the holiday service and to remove the holiday from the regular service schedule.
     *
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("exception_type")
     */
    protected $type;

}

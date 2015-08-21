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
 * Dates for service IDs using a weekly schedule.
 * Specify when service starts and ends, as well as days of the week where service is available.
 * Required.
 *
 * @example https://developers.google.com/transit/gtfs/reference?hl=en#calendartxt
 *
 * @JMS\XmlRoot("calendar")
 */
class Calendar
{
    /**
     * This contains an ID that uniquely identifies a set of dates when service is available for one or more routes.
     * Each value can appear at most once in all Calendar models. This value is dataset unique. It is referenced by Trip model.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("service_id")
     */
    protected $service;

    /**
     * This field contains boolean value that indicates whether the service is valid.
     * A value of true indicates that service is available
     * A value of false indicates that service is not available.
     *
     * @var bool
     * @JMS\Type("boolean")
     * @JMS\SerializedName("monday")
     */
    protected $monday;

    /**
     * This field contains boolean value that indicates whether the service is valid.
     * A value of true indicates that service is available
     * A value of false indicates that service is not available.
     *
     * @var bool
     * @JMS\Type("boolean")
     * @JMS\SerializedName("tuesday")
     */
    protected $tuesday;

    /**
     * This field contains boolean value that indicates whether the service is valid.
     * A value of true indicates that service is available
     * A value of false indicates that service is not available.
     *
     * @var bool
     * @JMS\Type("boolean")
     * @JMS\SerializedName("wednesday")
     */
    protected $wednesday;

    /**
     * This field contains boolean value that indicates whether the service is valid.
     * A value of true indicates that service is available
     * A value of false indicates that service is not available.
     *
     * @var bool
     * @JMS\Type("boolean")
     * @JMS\SerializedName("thursday")
     */
    protected $thursday;

    /**
     * This field contains boolean value that indicates whether the service is valid.
     * A value of true indicates that service is available
     * A value of false indicates that service is not available.
     *
     * @var bool
     * @JMS\Type("boolean")
     * @JMS\SerializedName("friday")
     */
    protected $friday;

    /**
     * This field contains boolean value that indicates whether the service is valid.
     * A value of true indicates that service is available
     * A value of false indicates that service is not available.
     *
     * @var bool
     * @JMS\Type("boolean")
     * @JMS\SerializedName("saturday")
     */
    protected $saturday;

    /**
     * This field contains boolean value that indicates whether the service is valid.
     * A value of true indicates that service is available
     * A value of false indicates that service is not available.
     *
     * @var bool
     * @JMS\Type("boolean")
     * @JMS\SerializedName("sunday")
     */
    protected $sunday;

    /**
     * This field contains the start date for the service.
     *
     * @var \DateTime
     * @JMS\Type("DateTime")
     * @JMS\SerializedName("start_date")
     */
    protected $start;

    /**
     * This field contains the end date for the service.
     *
     * @var \DateTime
     * @JMS\Type("DateTime")
     * @JMS\SerializedName("end_date")
     */
    protected $end;
}

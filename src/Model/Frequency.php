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
 * Headway (time between trips) for routes with variable frequency of service
 * This model is intended to represent schedules that don't have a fixed list of stop times.
 * When trips are defined in this model, the trip planner ignores the absolute values of the arrival_time and departure_time fields for those trips in a StopTime model.
 * Instead, the StopTime model defines the sequence of stops and the time difference between each stop.
 * Optional.
 *
 * @example https://developers.google.com/transit/gtfs/reference?hl=en#frequenciestxt
 *
 * @JMS\XmlRoot("frequencies")
 */
class Frequency
{
    /**
     * This contains an ID that identifies a trip on which the specified frequency of service applies.
     * Trip IDs are referenced from the Trip model.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("trip_id")
     */
    protected $trip_id;

    /**
     * This field specifies the time at which service begins with the specified frequency.
     * The time is measured from "noon minus 12h" (effectively midnight, except for days on which daylight savings time changes occur) at the beginning of the service date.
     * For times occurring after midnight, enter the time as a value greater than 24:00:00 in HH:MM:SS local time for the day on which the trip schedule begins. E.g. 25:35:00.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("start_time")
     */
    protected $startTime;

    /**
     * This field indicates the time at which service changes to a different frequency (or ceases) at the first stop in the trip.
     * The time is measured from "noon minus 12h" (effectively midnight, except for days on which daylight savings time changes occur) at the beginning of the service date.
     * For times occurring after midnight, enter the time as a value greater than 24:00:00 in HH:MM:SS local time for the day on which the trip schedule begins. E.g. 25:35:00.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("end_time")
     */
    protected $endTime;

    /**
     * This field indicates the time between departures from the same stop (headway) for this trip type,
     * during the time interval specified by startTime and endTime. The headway value must be entered in seconds.
     * Periods in which headways are defined (the rows in this model) shouldn't overlap for the same trip,
     * since it's hard to determine what should be inferred from two overlapping headways.
     * However, a headway period may begin at the exact same time that another one ends, for instance:.
     *
     * A, 05:00:00, 07:00:00, 600
     * B, 07:00:00, 12:00:00, 1200
     *
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("headway_sec")
     */
    protected $headway_secs;

    /**
     * This field determines if frequency-based trips should be exactly scheduled based on the specified headway information.
     * Valid values for this field are:
     * 0 or (empty) - Frequency-based trips are not exactly scheduled. This is the default behavior.
     * 1 - Frequency-based trips are exactly scheduled. For a Frequency model, trips are scheduled starting with trip_start_time = start_time + x * headway_secs for all x in (0, 1, 2, ...) where trip_start_time < end_time.
     *
     * The value of this field must be the same for all Frequency models with the same trip_id.
     * If exact_times is 1 and a Frequency model has a start_time equal to end_time, no trip must be scheduled.
     * When exact_times is 1, care must be taken to choose an end_time value that is greater than the last desired trip start time but less than the last desired trip start time + headway_secs.
     *
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("exact_times")
     */
    protected $exact_times = '';
}

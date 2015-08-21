<?php
namespace Lsv\Gtfs\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Additional information about the feed itself, including publisher, version, and expiration information
 * This contains information about the feed itself, rather than the services that the feed describes.
 * GTFS currently has an Agency model to provide information about the agencies that operate the services described by the feed.
 * However, the publisher of the feed is sometimes a different entity than any of the agencies (in the case of regional aggregators).
 * In addition, there are some fields that are really feed-wide settings, rather than agency-wide.
 * Optional
 *
 * @package Lsv\Gtfs\Model
 * @example https://developers.google.com/transit/gtfs/reference?hl=en#feed_infotxt
 *
 * @JMS\XmlRoot("feed_info")
 */
class FeedInfo
{

    /**
     * This field contains the full name of the organization that publishes the feed.
     * (This may be the same as one of the agency_name values in a Agency object)
     * GTFS-consuming applications can display this name when giving attribution for a particular feed's data.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("feed_publisher_name")
     */
    protected $name;

    /**
     * This field contains the URL of the feed publishing organization's website.
     * (This may be the same as one of the agency_url values in a Agency object)
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("feed_publisher_url")
     */
    protected $url;

    /**
     * This field contains a IETF BCP 47 language code specifying the default language used for the text in this feed.
     * This setting helps GTFS consumers choose capitalization rules and other language-specific settings for the feed.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("feed_lang")
     */
    protected $lang;

    /**
     * The feed provides complete and reliable schedule information for service in the period from the beginning of the start_date day to the end of the end_date day.
     * Both days are given as dates in YYYYMMDD format as for Calendar model, or left empty if unavailable.
     * The end_date date must not precede the start_date date if both are given.
     * Feed providers are encouraged to give schedule data outside this period to advise of likely future service, but feed consumers should treat it mindful of its non-authoritative status.
     * If start_date or end_date extend beyond the active calendar dates defined in a Calendar or CalendarDate model, the feed is making an explicit assertion that there is no service for dates within the start_date or end_date range but not included in the active calendar dates.
     *
     * @var null|\DateTime
     * @JMS\Type("DateTime")
     * @JMS\SerializedName("feed_start_date")
     */
    protected $start_date = null;

    /**
     * The feed provides complete and reliable schedule information for service in the period from the beginning of the start_date day to the end of the end_date day.
     * Both days are given as dates in YYYYMMDD format as for Calendar model, or left empty if unavailable.
     * The end_date date must not precede the start_date date if both are given.
     * Feed providers are encouraged to give schedule data outside this period to advise of likely future service, but feed consumers should treat it mindful of its non-authoritative status.
     * If start_date or end_date extend beyond the active calendar dates defined in a Calendar or CalendarDate model, the feed is making an explicit assertion that there is no service for dates within the start_date or end_date range but not included in the active calendar dates.
     *
     * @var null|\DateTime
     * @JMS\Type("DateTime")
     * @JMS\SerializedName("feed_end_date")
     */
    protected $end_date = null;

    /**
     * The feed publisher can specify a string here that indicates the current version of their GTFS feed.
     * GTFS-consuming applications can display this value to help feed publishers determine whether the latest version of their feed has been incorporated.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("feed_version")
     */
    protected $version = null;

}

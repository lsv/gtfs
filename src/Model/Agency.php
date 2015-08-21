<?php

namespace Lsv\Gtfs\Model;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;

/**
 * One or more transit agencies that provide the data in this feed.
 * Required
 *
 * @package Lsv\Gtfs\Model
 * @example https://developers.google.com/transit/gtfs/reference?hl=en#agencytxt
 *
 * @JMS\XmlRoot(name="agency")
 */
class Agency
{
    /**
     * This field is an ID that uniquely identifies a transit agency.
     * A transit feed may represent data from more than one agency.
     * The agency_id is dataset unique.
     * This field is optional for transit feeds that only contain data for a single agency.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName(name="agency_id")
     */
    protected $id;

    /**
     * This field contains the full name of the transit agency. Google Maps will display this name.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName(name="agency_name")
     */
    protected $name;

    /**
     * This field contains the URL of the transit agency.
     * The value must be a fully qualified URL that includes http:// or https://, and any special characters in the URL must be correctly escaped.
     * See http://www.w3.org/Addressing/URL/4_URI_Recommentations.html for a description of how to create fully qualified URL values.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName(name="agency_url")
     */
    protected $url;

    /**
     * This field contains the timezone where the transit agency is located.
     * Timezone names never contain the space character but may contain an underscore.
     * Please refer to http://en.wikipedia.org/wiki/List_of_tz_zones for a list of valid values.
     * If multiple agencies are specified in the feed, each must have the same agency_timezone.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName(name="agency_timezone")
     */
    protected $timezone = 'UTC';

    /**
     * This field contains a two-letter ISO 639-1 code for the primary language used by this transit agency.
     * The language code is case-insensitive (both en and EN are accepted).
     * This setting defines capitalization rules and other language-specific settings for all text contained in this transit agency's feed.
     * Please refer to http://www.loc.gov/standards/iso639-2/php/code_list.php for a list of valid values.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName(name="agency_lang")
     */
    protected $language = null;

    /**
     * This field contains a single voice telephone number for the specified agency.
     * This field is a string value that presents the telephone number as typical for the agency's service area.
     * It can and should contain punctuation marks to group the digits of the number.
     * Dialable text (for example, TriMet's "503-238-RIDE") is permitted, but the field must not contain any other descriptive text.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName(name="agency_phone")
     */
    protected $phone = null;

    /**
     * This field specifies the URL of a web page that allows a rider to purchase tickets or other fare instruments for that agency online.
     * The value must be a fully qualified URL that includes http:// or https://, and any special characters in the URL must be correctly escaped.
     * See http://www.w3.org/Addressing/URL/4_URI_Recommentations.html for a description of how to create fully qualified URL values.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName(name="agency_fare_url")
     */
    protected $fare_url = null;

    /**
     * @var Route[]|ArrayCollection
     * @JMS\Type("ArrayCollection<Route>")
     * @JMS\SerializedName(name="routes")
     */
    protected $routes;
}

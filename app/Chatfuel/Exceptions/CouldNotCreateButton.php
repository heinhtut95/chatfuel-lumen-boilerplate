<?php

namespace App\Chatfuel\Exceptions;

class CouldNotCreateButton extends \Exception
{
    /**
     * Thrown when the button title is not provided.
     *
     * @return static
     */
    public static function titleNotProvided()
    {
        return new static('Button title was not provided, A 20 character limited title should be provided.');
    }

    /**
     * Thrown when the button type is "web_url" but the url is not provided.
     *
     * @return static
     */
    public static function urlNotProvided()
    {
        return new static('Your button type is `web_url` but the url is not provided.');
    }

    /**
     * Thrown when the button type is "phone_number" but the number is not provided.
     *
     * @return static
     */
    public static function phoneNumberNotProvided()
    {
        return new static('Your button type is `phone_number` but the phone number is not provided.');
    }

    /**
     * Thrown when the button type is "postback" but the postback data is not provided.
     *
     * @return static
     */
    public static function postbackNotProvided()
    {
        return new static('Your button type is `postback` but the postback data is not provided.');
    }

    /**
     * Thrown when the button type is "show_block" but the name data is not provided.
     *
     * @return static
     */
    public static function blockLinkNotProvided()
    {
        return new static('Your button type is `show_block` but the name data is not provided.');
    }

    /**
     * Thrown when the button type is "postback" or "phone_number",
     * but the data value is not provided for the payload.
     *
     * @param $type
     *
     * @return static
     */
    public static function dataNotProvided($type)
    {
        return new static("Your button type is `{$type}` but the payload is not provided.");
    }

    /**
     * Thrown when the title characters limit is exceeded.
     *
     * @param $title
     *
     * @return static
     */
    public static function titleLimitExceeded($title)
    {
        $count = mb_strlen($title);

        return new static(
            "Your title was {$count} characters long, which exceeds the 20 character limit. Please check the button template docs for more information."
        );
    }

    /**
     * Thrown when the payload characters limit is exceeded.
     *
     * @param mixed $data
     *
     * @return static
     */
    public static function payloadLimitExceeded($data)
    {
        $count = mb_strlen($data);

        return new static(
            "Your payload was {$count} characters long, which exceeds the 1000 character limit. Please check the button template docs for more information."
        );
    }

    /**
     * Thrown when the URL provided is not valid.
     *
     * @param $url
     *
     * @return static
     */
    public static function invalidUrlProvided($url)
    {
        return new static("`{$url}` is not a valid URL. Please check and provide a valid URL");
    }

    /**
     * Thrown when the phone number provided is of invalid format.
     *
     * @param $phoneNumber
     *
     * @return static
     */
    public static function invalidPhoneNumberProvided($phoneNumber)
    {
        return new static(
            "Provided phone number `{$phoneNumber}` format is invalid.".
            "Format must be '+' prefix followed by the country code, area code and local number.".
            'Please check the button template docs for more information.'
        );
    }

    /**
     * Thrown when the postback is not valid.
     *
     * @param $postback
     *
     * @return static
     */
    public static function invalidPostbackProvided($postback)
    {
        return new static("`{$postback}` is not a valid value for the `postback` button type. It should be an array.");
    }

    /**
     * Thrown when the blocklink is not valid.
     *
     * @param $blockLink
     *
     * @return static
     */
    public static function invalidBlockLinkProvided($blockLink)
    {
        return new static("`{$blockLink}` is not a valid value for the `show_block` button type. It should be an array of or single no-space pascal-case name of a block.");
    }
}

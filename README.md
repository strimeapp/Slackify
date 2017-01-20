# Slackify

[![Build Status](https://travis-ci.org/strimeapp/Slackify.svg?branch=master)](https://travis-ci.org/strimeapp/Slackify)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/strimeapp/Slackify/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/strimeapp/Slackify/?branch=master)

Slackify is a PHP bundle which lets you communicate with Slack API.

It has been initially developed for [Strime](https://www.strime.io).

## Installation

The recommended way to install Slackify is through [Composer](https://getcomposer.org).

```bash
$ composer require strimeapp/slackify
```

## Webhooks

Slackify allows you to easily send messages to webhooks.

```php
use Strime\Slackify\Webhooks\Webhook;

$webhook = new Webhook("https://hooks.slack.com/services/YOUR/WEBHOOK");

$webhook->sendMessage(array(
    "message" => "My first message",
    "username" => "Bobby",
    "icon" => "http://upshout.net/wp-content/uploads/2016/03/unicorn-002.jpg",
    "link" => "https://www.strime.io",
    "link_text" => "Strime"
));
```

The `icon` parameter may either be an URL to an image, or an emoji code (:taco: for instance).

The `link_text` parameter is the text that will be clickable, if you set the `link` parameter.

## Sending attachments

If you want to send attachments allong to your message, you can do it like this, before sending the message:

```php
use Strime\Slackify\Webhooks\Webhook;

$webhook = new Webhook("https://hooks.slack.com/services/YOUR/WEBHOOK");

$webhook->setAttachments(
    array(
        array(
            "fallback" => "A fallback text",
            "text" => "The text of your attachment",
            "color" => "#123456",
            "fields" => array(
                "title" => "My attachment",
                "value" => "The value of my attachment",
                "short" => FALSE
            )
        )
    )
);

$webhook->sendMessage(array(
    "message" => "My first message",
    "username" => "Bobby",
    "icon" => "http://upshout.net/wp-content/uploads/2016/03/unicorn-002.jpg",
    "link" => "https://www.strime.io",
    "link_text" => "Strime"
));
```

- *fallback*: A plain-text summary of the attachment. This text will be used in clients that don't show formatted text (eg. IRC, mobile notifications) and should not contain any markup.
- *color*: Like traffic signals, color-coding messages can quickly communicate intent and help separate them from the flow of other messages in the timeline. An optional value that can either be one of `good`, `warning`, `danger`, or any hex color code (eg. `#439FE0`). This value is used to color the border along the left side of the message attachment.
- *pretext*: This is optional text that appears above the message attachment block.
- *author*: The author parameters will display a small section at the top of a message attachment that can contain the following fields:
	- *author_name*: Small text used to display the author's name.
	- *author_link*: A valid URL that will hyperlink the `author_name` text mentioned above. Will only work if `author_name` is present.
	- *author_icon*: A valid URL that displays a small 16x16px image to the left of the `author_name` text. Will only work if `author_name` is present.
- *title*: The `title` is displayed as larger, bold text near the top of a message attachment. By passing a valid URL in the `title_link` parameter (optional), the title text will be hyperlinked.
- *fields*:
	- *title*: Shown as a bold heading above the value text. It cannot contain markup and will be escaped for you.
	- *value*: The text value of the field. It may contain [standard message markup](https://api.slack.com/docs/message-formatting) and must be escaped as normal. May be multi-line.
	- *short*: An optional flag indicating whether the value is short enough to be displayed side-by-side with other values.
- *image_url*: A valid URL to an image file that will be displayed inside a message attachment. We currently support the following formats: GIF, JPEG, PNG, and BMP. Large images will be resized to a maximum width of 400px or a maximum height of 500px, while still maintaining the original aspect ratio.
- *thumb_url*: A valid URL to an image file that will be displayed as a thumbnail on the right side of a message attachment. We currently support the following formats: GIF, JPEG, PNG, and BMP. The thumbnail's longest dimension will be scaled down to 75px while maintaining the aspect ratio of the image. The filesize of the image must also be less than 500 KB. For best results, please use images that are already 75px by 75px.
- *footer*: Add some brief text to help contextualize and identify an attachment. Limited to 300 characters, and may be truncated further when displayed to users in environments with limited screen real estate.
- *footer_icon*: To render a small icon beside your footer text, provide a publicly accessible URL string in the `footer_icon` field. You must also provide a `footer` for the field to be recognized. We'll render what you provide at 16px by 16px. It's best to use an image that is similarly sized.
- *ts*: By providing the ts field with an integer value in "[epoch time](https://en.wikipedia.org/wiki/Unix_time)", the attachment will display an additional timestamp value as part of the attachment's footer.

## API

Slackify also allows you to easily send requests to the API.

In order to instantiate a connection to the API, you will need a token. You can generate test tokens [here](https://api.slack.com/docs/oauth-test-tokens).

Each section of the [API documentation](https://api.slack.com/methods) has its own class with the corresponding methods.

```php
use Strime\Slackify\Api\Api;
use Strime\Slackify\Api\Auth;
use Strime\Slackify\Api\Bots;
use Strime\Slackify\Api\Channels;

// API request
$api_request = new Api("your-api-token-comes-here");
$api_request->test();

// Auth requests
$api_auth_request = new Auth("your-api-token-comes-here");
$api_auth_request->revoke("a-token-to-revoke", TRUE);
$api_auth_request->test("a-token-to-test");

// Bots requests
$api_bots_request = new Bots("your-api-token-comes-here");
$api_bots_request->info("B123456");

// Channels requests
$api_channels_request = new Channels("your-api-token-comes-here");
$api_channels_request->archive("C123456");
$api_channels_request->create("C123456");
$api_channels_request->history("C123456", "now", 0, 0, 100, 0);
$api_channels_request->info("C123456");
$api_channels_request->invite("C123456", "U56789");
$api_channels_request->join("C123456");
$api_channels_request->kick("C123456", "U56789");
$api_channels_request->leave("C123456");
$api_channels_request->list(0);
$api_channels_request->mark("C123456", time());
$api_channels_request->rename("C123456", "New name");
$api_channels_request->replies("C123456", time());
$api_channels_request->setPurpose("C123456", "New purpose");
$api_channels_request->setTopic("C123456", "New topic");
$api_channels_request->unarchive("C123456");
```



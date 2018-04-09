LaraSlack
==============

About
--------------
A Basic Slack integration for Laravel projects


Usage
--------------

Register a helper function instantiating the LaraSlack class e.g.

```
function laraslack($content) {
	return new \DataDev\LaraSlack\LaraSlack($content);
}
```


Required ENV
--------------

* SLACK_WEB_HOOK_URL=
    * String
    * The DataDev slack web hook url
* SLACK_CHANNEL=
    * String
    * The channel or user to send the message to 
* SLACK_USERNAME=
    * String
    * The username to send the message as
* SLACK_ICON=
    * String
    * The icon to be sent with the message (wrapped in ':' i.e :chart_with_upwards_trend:)
* SLACK_SEND=
    * Boolean
    * Determines wether the message will be sent
    * Set to false in testing environments


Overriding Defaults
--------------

You can pass an array to the send() method to overwride the defaults specified in the .env file. The array keys are:

* channel
* message
* username
* icon

Any array keys that are not passed through will take the defaults from the config

E.G:

```
laraslack([
    'channel' => 'Dummy Channel',
    'icon'    => 'banana',
    'message  => 'message goes here'
]);
```

** Remember to pass through an array key for 'message' when doing this **
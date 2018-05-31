<?php

return [
	'endpoint' => env('SLACK_WEB_HOOK_URL'),
	'channel'  => env('SLACK_CHANNEL', '#general'),
    'username' => env('SLACK_USERNAME', 'LaraSlack'),
    'icon'     => env('SLACK_ICON', ':chart_with_upwards_trend:'),
    'send'     => env('SLACK_SEND', false)
];
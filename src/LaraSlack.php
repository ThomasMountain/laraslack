<?php

namespace ThomasMountain\LaraSlack;

/**
 * @property array defaultConfig;
 * @property mixed content
 */
class LaraSlack {

	protected $defaultConfig = [];

	public function __construct($content) {
		$this->setDefaultConfig();
		$this->content = $content;

		$this->send();
	}

	public function send() {

		if (is_array($this->content)) {
			$config = array_merge($this->defaultConfig, $this->content);
		}
		else {
			$config            = $this->defaultConfig;
			$config['message'] = $this->content;
		}


		$data = "payload=" . json_encode(array(
				"channel"    => $config['channel'],
				"text"       => $config['message'],
				'username'   => $config['username'],
				"icon_emoji" => $config['icon']
			));
		$url  = config('slack.endpoint');

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		if (config('slack.send')) {
			$result = curl_exec($ch);
		}

		curl_close($ch);

	}

	private function setDefaultConfig() {
		$this->defaultConfig = [
			'message'  => 'Default Message',
			'channel'  => config('slack.channel'),
			'icon'     => config('slack.icon'),
			'username' => config('slack.username'),
		];
	}
}
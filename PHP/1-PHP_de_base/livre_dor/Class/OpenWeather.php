<?php


class OpenWeather
{
    public string $API_KEY;

    public function __construct(string $API_KEY) {
        $this->setAPIKey($API_KEY);
    }

    private function setAPIKey($API_KEY) {
        $this->API_KEY = $API_KEY;
    }

    public function getForecast($city): ?array {
        $call = curl_init("api.openweathermap.org/data/2.5/weather?q={$city}&appid={$this->API_KEY}");
        curl_setopt_array($call, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 1
        ]);

        $data = curl_exec($call);
        if ($data === false || curl_getinfo($call, CURLINFO_HTTP_CODE) !== 200) {
            echo 'non';
            return null;
        }
        $data = json_decode($data, true);

        $results = [
                'temp' => $data['main']['temp'],
                'description' => $data['weather'][0]['description']
            ];

        return $results;
    }
}
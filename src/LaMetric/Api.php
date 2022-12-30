<?php

declare(strict_types=1);

namespace LaMetric;

use GuzzleHttp\Client;
use LaMetric\Response\{Frame, FrameCollection};
use GuzzleHttp\Exception\GuzzleException;
use LaMetric\Helper\{IconHelper, TextHelper};

class Api
{
    public function __construct(private Client $client)
    {
    }

    /**
     * @param array $parameters
     *
     * @return FrameCollection
     * @throws GuzzleException
     */
    public function fetchData(array $parameters = []): FrameCollection
    {
        $response = $this->client->request('GET', 'https://api.opensea.io/collection/' . $parameters['collection-slug']);

        $data = json_decode((string)$response->getBody(), true);

        return $this->mapData($parameters, [
            'show-floor' => round($data['collection']['stats']['floor_price'], 2),
            'show-1d-volume' => round($data['collection']['stats']['one_day_volume'], 2),
            'show-7d-volume' => round($data['collection']['stats']['seven_day_volume'], 2),
            'show-30d-volume' => round($data['collection']['stats']['thirty_day_volume'], 2),
            'show-total-volume' => round($data['collection']['stats']['total_volume'], 2),
        ]);
    }

    /**
     * @param array $parameters
     * @param array $data
     *
     * @return FrameCollection
     */
    private function mapData(array $parameters, array $data = []): FrameCollection
    {
        $frameCollection = new FrameCollection();

        foreach ($data as $key => $value) {
            if (isset($parameters[$key]) && $parameters[$key] === 'true') {
                $frame = new Frame();
                $frame->setText(TextHelper::getText($key));
                $frame->setIcon(IconHelper::getIcon($parameters['collection-slug']));
                $frameCollection->addFrame($frame);

                $frame = new Frame();
                $frame->setText((string) $value);
                $frame->setIcon('');
                $frameCollection->addFrame($frame);
            }
        }

        return $frameCollection;
    }
}

<?php

namespace App\Infrastructure\Parsing;

use App\Domain\Properties\Property;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class AlegriaParser
{
    private const BASE_URL = 'https://alegria-realestate.com';

    private Client $client;

    public function __construct(?Client $client = null)
    {
        $this->client = $client ?? new Client([
            'headers' => [
                'User-Agent' => 'Mozilla/5.0',
            ],
        ]);
    }

    /**
     * @return Property[]
     */
    public function parse(): array
    {
        $response = $this->client->get(self::BASE_URL . '/ru/long-term');
        $crawler = new Crawler((string)$response->getBody());

        $properties = [];
        $crawler->filter('.article-item')->each(function (Crawler $node) use (&$properties) {
            $title = trim($node->filter('.article-title')->text());
            $price = trim($node->filter('.article-price')->text());
            $url = $node->filter('a')->attr('href');
            $url = str_starts_with($url, 'http') ? $url : self::BASE_URL . $url;
            $photos = $node->filter('img')->each(fn (Crawler $img) => $img->attr('src'));

            $description = $this->fetchDescription($url);

            $properties[] = new Property(
                title: $title,
                price: $price,
                url: $url,
                photos: $photos,
                description: $description
            );
        });

        return $properties;
    }

    private function fetchDescription(string $url): ?string
    {
        try {
            $response = $this->client->get($url);
            $crawler = new Crawler((string)$response->getBody());
            $node = $crawler->filter('.description');
            return $node->count() ? trim($node->text()) : null;
        } catch (\Throwable) {
            return null;
        }
    }
}

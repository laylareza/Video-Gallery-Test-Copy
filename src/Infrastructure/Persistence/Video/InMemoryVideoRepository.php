<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Video;

use App\Domain\Video\Video;
use App\Domain\Video\VideoNotFoundException;
use App\Domain\Video\VideoRepository;

class InMemoryVideoRepository implements VideoRepository
{
    /**
     * @var Video[]
     */
    private $videos;

    /**
     * InMemoryVideoRepository constructor.
     *
     * @param array|null $videos
     */
    public function __construct(array $videos = null)
    {
        $this->videos = $videos ?? [
            "m3ralniniq" => new Video(1, 'What It\'s Like To Work At AlgaeCal', '', 'Discover what it\'s like to work at AlgaeCal with this quick video!', 'm3ralniniq'),
            "ybyot0dm7q" => new Video(2, 'Esther Mangini Testimonial', 'Testimonials', 'Esther\'s journey to healthier bones', 'ybyot0dm7q'),
            "mhmv73k989" => new Video(3, 'Teresa Cucurull Testimonial', '', 'Teresa\'s journey to healthier bones', 'mhmv73k989'),
            "3n5p02h26w" => new Video(4, 'Perfect Pilates For Osteoporosis - Legwork', '', 'Bone Healthy Exercises!', '3n5p02h26w'),
            "kkgeu7v2va" => new Video(5, 'Perfect Pilates For Osteoporosis - Amazing Abs', '', 'Bone Healthy Exercises!', 'kkgeu7v2va'),
            "m6amjftj3w" => new Video(6, 'Lara\'s Homemade Granola', '', 'Bone Healthy Recipes', 'm6amjftj3w'),
            "ajoe5d0jk0" => new Video(7, 'Brazil Nut Pesto', '', 'Bone Healthy Recipes', 'ajoe5d0jk0'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return array_values($this->videos);
    }

    /**
     * {@inheritdoc}
     */
    public function findVideoOfId(string $video_id): Video
    {
        if (!isset($this->videos[$video_id])) {
            throw new VideoNotFoundException();
        }

        return $this->videos[$video_id]; 
    }
}
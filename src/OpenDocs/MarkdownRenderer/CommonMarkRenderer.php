<?php

declare(strict_types = 1);

namespace OpenDocs\MarkdownRenderer;

use League\CommonMark\GithubFlavoredMarkdownConverter;

use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment;
use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkExtension;
use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkRenderer;
use League\CommonMark\Normalizer\SlugNormalizer;


class CommonMarkRenderer implements MarkdownRenderer
{
    public function render(string $markdown): string
    {
        $environment = Environment::createGFMEnvironment();

// Add this extension
        $environment->addExtension(new HeadingPermalinkExtension());

        $params = [
            'heading_permalink' => [
                'html_class' => 'heading-permalink',
                'id_prefix' => 'user-content',
                'insert' => 'after',
                'title' => 'Permalink',
                'symbol' => "\u{00A0}\u{00A0}🔗",
                'slug_normalizer' => new SlugNormalizer(),
            ],
        ];

        // Set your configuration
        $config = [
            // Extension defaults are shown below
            // If you're happy with the defaults, feel free to remove them from this array

        ];

        $converter = new GithubFlavoredMarkdownConverter($params, $environment);

        return $converter->convertToHtml($markdown);
    }
}
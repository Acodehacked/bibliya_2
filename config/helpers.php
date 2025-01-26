<?php

namespace App\Helpers;

class MetaTagHelper
{
    public static function generateMetaTags($title = null, $description = null, $keywords = null)
    {
        // Default meta values
        $title = $title ?? config('app.name');
        $description = $description ?? 'Default description for your application';
        $keywords = $keywords ?? 'default, keywords, related, to, your, app';

        return [
            'meta_title' => $title,
            'meta_description' => $description,
            'meta_keywords' => $keywords,
        ];
    }
}

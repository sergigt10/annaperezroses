<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => false, // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => "Anna Perez Roses, Artista Belles Arts Escola Massana", // set false to total remove
            'separator'    => ', ',
            'keywords'     => ['Anna Perez Roses', 'Pintura', 'Ceràmica', 'Il·lustració', 'Artista Belles Vic', 'Artista Belles'],
            'canonical'    => false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'robots'       => 'all', // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'Anna Perez Roses, Passió per la pintura', // set false to total remove
            'description' => "Anna Perez Roses, Artista Belles Arts Escola Massana", // set false to total remove
            'url'         => null, // Set null for using Url::current(), set false to total remove
            'type'        => 'website',
            'site_name'   => 'Anna Perez Roses',
            'locale'      => 'ca_CA',
            'images'      => ['https://www.annaperezroses.com/frontend/images/anna.jpg'],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            'card'        => 'summary',
            'title'       => 'Anna Perez Roses, Passió per la pintura',
            'site'        => '',
            'creator'     => '',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'Anna Perez Roses, Passió per la pintura', // set false to total remove
            'description' => 'Anna Perez Roses, Artista Belles Arts Escola Massana', // set false to total remove
            'url'         => 'https://www.annaperezroses.com', // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => ['https://www.annaperezroses.com/frontend/images/anna.jpg'],
        ],
    ],
];

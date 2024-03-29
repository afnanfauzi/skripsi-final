<?php

return [
    /*
     * If set to true, disqus api will be integrated in the site.
     * Just add <div id="disqus_thread"></div> to load disqus section.
     */
    'enabled'  => env('DISQUS_ENABLED', true),

    /*
     * Your disqus username.
     */
    'username' => env('DISQUS_USERNAME', 'pdm-sragen'),
];

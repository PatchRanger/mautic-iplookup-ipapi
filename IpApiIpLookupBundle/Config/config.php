<?php
// plugins/IpApiIpLookupBundle/Config/config.php

return array(
    'name'        => 'Ip-api.com IP lookup',
    'description' => 'Adds ip-api.com as IP lookup service.',
    'author'      => 'Dmitry Danilson',
    'version'     => '1.0.0',
    'ip_lookup_services' => array(
        'ipapi' => array(
            'display_name' => 'Ip-api.com',
            'class'        => 'MauticPlugin\IpApiIpLookupBundle\IpLookup\IpApiIpLookup'
        ),
    ),
);

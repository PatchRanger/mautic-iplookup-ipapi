<?php
/**
 * @package     IpApiIpLookupBundle
 * @copyright   2016 Dmitry Danilson. All rights reserved.
 * @author      Dmitry Danilson
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

namespace MauticPlugin\IpApiIpLookupBundle\IpLookup;

use Mautic\CoreBundle\IpLookup\AbstractRemoteDataLookup;

class IpApiIpLookup extends AbstractRemoteDataLookup
{
    /**
     * @return string
     */
    public function getAttribution()
    {
        return '<a href="http://ip-api.com/" target="_blank">ip-api.com</a> is a free lookup service.';
    }

    /**
     * @return string
     */
    protected function getUrl()
    {
        return "http://ip-api.com/json/{$this->ip}";
    }

    /**
     * @param $response
     */
    protected function parseResponse($response)
    {
        $data = json_decode($response);
        if ($data) {
            foreach ($data as $key => $value) {
                switch ($key) {
                    case 'city':
                        $key = 'city';
                        break;
                    case 'regionName':
                        $key = 'region';
                        break;
                    case 'zip':
                        $key = 'zipcode';
                        break;
                    case 'country':
                        $key = 'country';
                        break;
                    case 'lat':
                        $key = 'latitude';
                        break;
                    case 'lon':
                        $key = 'longitude';
                        break;
                    case 'isp':
                        $key = 'isp';
                        break;
                    case 'org':
                        $key = 'organization';
                        break;
                    case 'timezone':
                        $key = 'timezone';
                        break;
                }

                $this->$key = $value;
            }
        }
    }
}

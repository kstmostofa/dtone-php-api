<?php

namespace Kstmostofa\DtonePhpApi;

use Illuminate\Support\Facades\Http;

class Request
{
    static public function request($method, $endpoint, array $params = [])
    {
        $key = config('dtone.is_production') ? config('dtone.key'): config('dtone.test_key');
        $secret = config('dtone.is_production') ? config('dtone.secret'): config('dtone.test_secret');
        $domian = config('dtone.is_production') ?  "https://dvs-api.dtone.com/v1/" : "https://preprod-dvs-api.dtone.com/v1/";
        $response = Http::withBasicAuth($key, $secret)->$method($domian . $endpoint, $params);

        if(isset($params['list_api']) && $params['list_api'] == true){ 
            return array_merge(['data' => $response->json()], ['meta' => [
                'total' => $response->header('X-Total'),
                'total_pages' => $response->header('X-Total-Pages'),
                'per_page' => $response->header('X-Per-Page'),
                'X-Page' => $response->header('X-Page'),
                'next_page' => $response->header('X-Next-Page'),
                'prev_page' => $response->header('X-Prev-Page'),
            ]]);
        }else{
            return $response->json();
        }
    }

    static public function services($page, $per_page)
    {
        $params = [];
        isset($page) ? $params['page'] = $page : null;
        isset($per_page) ? $params['per_page'] = $per_page : null;
        $params['list_api'] = true;
        return Request::request('get', 'services', $params);
    }


    static public function serviceById($id)
    {
        $endpoint = 'services/' . $id ;
        return Request::request('get', $endpoint);
    }

    static public function countries($page, $per_page)
    {
        $params = [];
        isset($page) ? $params['page'] = $page : null;
        isset($per_page) ? $params['per_page'] = $per_page : null;
        $params['list_api'] = true;
        return Request::request('get', 'countries', $params);
    }


    static public function countryByIsoCode($iso_code)
    {
        $endpoint = 'countries/' . $iso_code ;
        return Request::request('get', $endpoint);
    }

    static public function operators($country_iso_code, $page, $per_page)
    {
        $params = [];
        isset($page) ? $params['page'] = $page : null;
        isset($per_page) ? $params['per_page'] = $per_page : null;
        isset($country_iso_code) ? $params['country_iso_code'] = $country_iso_code : null;
        $params['list_api'] = true;
        return Request::request('get', 'operators', $params);
    }


    static public function operatorById($id)
    {
        $endpoint = 'operators/' . $id ;
        return Request::request('get', $endpoint);
    }

    static public function balances()
    {
        return Request::request('get', 'balances');
    }


    static public function products($type, $service_id, $country_iso_code, $benefit_types, $page, $per_page)
    {
        $params = [];
        count($benefit_types) ? $params['benefit_types'] = $benefit_types : null;
        isset($type) ? $params['type'] = $type : null;
        isset($service_id) ? $params['service_id'] = $service_id : null;
        isset($page) ? $params['page'] = $page : null;
        isset($per_page) ? $params['per_page'] = $per_page : null;
        isset($country_iso_code) ? $params['country_iso_code'] = $country_iso_code : null;
        $params['list_api'] = true;
        return Request::request('get', 'products', $params);
    }

    static public function transactions($page, $per_page)
    {
        $params = [];
        isset($page) ? $params['page'] = $page : null;
        isset($per_page) ? $params['per_page'] = $per_page : null;
        $params['list_api'] = true;
        return Request::request('get', 'transactions', $params);
    }


    static public function createTransaction($external_id, $product_id, $credit_party_identifier)
    {
        $params = [];
        isset($external_id) ? $params['external_id'] = $external_id : null;
        isset($product_id) ? $params['product_id'] = $product_id : null;
        isset($credit_party_identifier) ? $params['credit_party_identifier'] = $credit_party_identifier : null;
        return Request::request('post', 'async/transactions', $params);
    }


    static public function productById($id)
    {
        $endpoint = 'products/' . $id ;
        return Request::request('get', $endpoint);
    }

    static public function LookUpOperatorsForMobileNumber($mobile_number)
    {
        $endpoint = 'lookup/mobile-number/' . $mobile_number ;
        $params['list_api'] = true;
        return Request::request('get', $endpoint, $params);
    }
}

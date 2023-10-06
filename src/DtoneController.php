<?php

namespace Kstmostofa\DtonePhpApi;

use Kstmostofa\DtonePhpApi\Request;

class DtoneController
{
    public function search($query, $limit = 25, $offset = 0, $rating = null, $lang = null)
    {
        return Request::search('gifs', $query, $limit, $offset, $rating, $lang);
    }

    public function services($page = null, $per_page = null)
    {
        return Request::services($page, $per_page);
    }

    public function serviceById($id)
    {
        return Request::serviceById($id);
    }    

    public function countries($page = null, $per_page = null)
    {
        return Request::countries($page, $per_page);
    }

    public function countryByIsoCode($iso_code)
    {
        return Request::countryByIsoCode($iso_code);
    }

    public function operators($country_iso_code = null,$page = null, $per_page = null)
    {
        return Request::operators($country_iso_code, $page, $per_page);
    }

    public function operatorById($id)
    {
        return Request::operatorById($id);
    } 

    public function balances()
    {
        return Request::balances();
    }

    public function products($type= null, $service_id= null, $country_iso_code = null, $benefit_types = [], $page = null, $per_page = null)
    {
        return Request::products($type, $service_id, $country_iso_code, $benefit_types, $page, $per_page);
    }

    public function transactions($page = null, $per_page = null)
    {
        return Request::transactions($page, $per_page);
    }

    public function productById($id)
    {
        return Request::productById($id);
    }
    
    public function LookUpOperatorsForMobileNumber($mobile_number)
    {
        return Request::LookUpOperatorsForMobileNumber($mobile_number);
    }

    public function createTransaction($external_id, $product_id, $credit_party_identifier)
    {
        return Request::CreateTransaction($external_id, $product_id, $credit_party_identifier);
    }   
}

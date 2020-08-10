<?php


namespace Bedivierre\Alfastrah;


class AS_API
{
    public static $dictionary_address_type = 'wapi/dictionary/address-type/names';
    public static $dictionary_country_name = 'wapi/dictionary/countries/names/rus';
    public static $dictionary_doc_juridical_names = 'wapi/dictionary/documents/juridical/names';
    public static $dictionary_doc_physical_identity_names = 'wapi/dictionary/documents/physical/identity/names';
    public static $dictionary_doc_physical_licence_names = 'wapi/dictionary/documents/physical/licence/names';
    public static $dictionary_doc_vehicle_names = 'wapi/dictionary/documents/vehicle/names';
    public static $dictionary_phone_type_names = 'wapi/dictionary/phones/names';
    public static $dictionary_vehicle_purpose_names = 'wapi/dictionary/purpose/names';
    public static $dictionary_vehicle_category = 'wapi/dictionary/vehicle/category';
    public static $dictionary_vehicle_mark = 'wapi/dictionary/vehicle/mark';
    public static $dictionary_vehicle_model = 'wapi/dictionary/vehicle/mark/{id}/model';
    public static $dictionary_violations = 'wapi/dictionary/violations';

    public static $kbm_juridical = 'wapi/osago/kbm/juridical';
    public static $kbm_physical = 'wapi/osago/kbm/physical';

    public static $calculation = 'wapi/osago/calculation';
    public static $contract = 'wapi/osago/contract/{osago_uuid}/eosago';
    public static $contract_status = 'wapi/osago/contract/{osago_uuid}/status';
    public static $payment = 'wapi/osago/payment/{osago_uuid}';


}
<?php

// Enum definition for CNT segment control total qualifiers
// https://service.unece.org/trade/untdid/d17b/tred/tred6069.htm
enum UNControlTotalQualifier: string 
{
    public static function source()
    {
        return "https://service.unece.org/trade/untdid/d17b/tred/tred6069.htm";
    }

    case TOTAL_NUMBER_OF_LINE_ITEM_QUANTITIES = '1';
    case NUMBER_OF_LINE_ITEMS_IN_MESSAGE = '2';
    case NUMBER_OF_LINE_AND_SUB_ITEMS = '3';
    case NUMBER_OF_INVOICE_LINES = '4';
    case NUMBER_OF_CUSTOMS_ITEM_DETAIL_LINES = '5';
    case NUMBER_OF_CUSTOMS_ENTRIES = '6';
    case TOTAL_GROSS_WEIGHT = '7';
    case TOTAL_PIECES = '8';
    case TOTAL_NUMBER_OF_ULD = '9';
    case TOTAL_NUMBER_OF_CONSIGNMENTS = '10';
    case CONSIGNMENT_PACKAGE_QUANTITY = '11';
    case INVOICE_TOTAL_AMOUNT = '12';
    case LOADING_LIST_DOCUMENT_QUANTITY = '13';
    case NUMBER_OF_CUSTOMS_COMMERCIAL_DETAIL_LINES = '14';
    case TOTAL_CONSIGNMENT_CUBE = '15';
    case TOTAL_NUMBER_OF_EQUIPMENT = '16';
    case CONSIGNMENT_FOR_CUSTOMS_TOTAL_AMOUNT = '17';
    case TOTAL_REPORTED_QUANTITY_IN_NET_WEIGHT = '18';
    case TOTAL_REPORTED_QUANTITY_IN_SUPPLEMENTARY_UNITS = '19';
    case TOTAL_REPORTED_INVOICE_VALUE = '20';
    case TOTAL_REPORTED_ANCILLARY_COSTS = '21';
    case TOTAL_REPORTED_STATISTICAL_VALUE = '22';
    case TOTAL_ORDERED_QUANTITY = '23';
    case NUMBER_OF_ORDERS_REFERENCED = '24';
    case NUMBER_OF_REJECTED_ORDER_LINES = '25';
    case TOTAL_GROSS_MEASUREMENT_CUBE = '26';
    case TOTAL_NUMBER_OF_CREDIT_ITEMS = '27';
    case TOTAL_NUMBER_OF_DEBIT_ITEMS = '28';
    case TOTAL_NET_WEIGHT_OF_CONSIGNMENT = '29';
    case TOTAL_NUMBER_OF_EMPTY_CONTAINERS = '30';
    case NUMBER_OF_MESSAGES = '31';
    case TOTAL_GROSS_WEIGHT_WITHIN_TRANSPORT = '32';
    case TOTAL_NUMBER_OF_ORIGINAL_BILLS_OF_LADING = '33';
    case TOTAL_NUMBER_OF_COPY_BILLS_OF_LADING = '34';
    case NUMBER_OF_CONTAINERS_TO_BE_DISCHARGED = '35';
    case NUMBER_OF_CONTAINERS_TO_BE_LOADED = '36';
    case NUMBER_OF_CONTAINERS_TO_BE_RESTOWED = '37';
    case NUMBER_OF_CONTAINERS_TO_BE_SHIFTED = '38';
    case TOTAL_NUMBER_OF_INDIVIDUAL_TRANSACTIONS = '39';
    case TOTAL_NUMBER_OF_SEQUENCE_DETAILS = '40';
    case TOTAL_NUMBER_OF_CREW = '41';
    case TOTAL_NUMBER_OF_PASSENGERS = '42';
    case TOTAL_NUMBER_OF_WORK_TASKS = '43';
    case TOTAL_NUMBER_OF_MILESTONES = '44';
    case TOTAL_NUMBER_OF_AVAILABLE_RESOURCES = '45';
    case TOTAL_NUMBER_OF_CONSTRAINTS = '46';
    case TOTAL_WHOLESALER_UNSOLD_QUANTITY = '47';
    case TOTAL_QUANTITY_HELD_BY_DELIVERY_VEHICLES = '48';
    case TOTAL_QUANTITY_HELD_BY_RETAIL_OUTLETS = '49';
    case TOTAL_REJECTED_RETURN_QUANTITY = '50';
    case NUMBER_OF_GOODS_ITEMS = '51';
    case NUMBER_OF_PATIENTS = '52';
    case HASH_TOTAL_OF_REPORTED_DEBIT_ITEMS = '53';
    case HASH_TOTAL_OF_REPORTED_CREDIT_ITEMS = '54';
    case TOTAL_NUMBER_OF_ERRORS_REPORTED = '55';
    case TOTAL_NUMBER_OF_TRANSPORT_UNITS = '56';
    case TOTAL_LOADING_METRES = '57';
    case DAYS_UNDER_CUSTOMS_TRANSIT_CONTROL = '58';
    case TOTAL_GROSS_WEIGHT_OF_CONSIGNMENT_SHIPPER_MEASURED = '59';
    case TOTAL_PALLET_GROSS_WEIGHT = '60';
    case NUMBER_OF_AFFIXED_SEALS = '61';
    case NUMBER_OF_PREMISES = '62';
    case NUMBER_OF_METERS = '63';

    public static function getDescription(self $qualifier): string {
        return match($qualifier) {
            self::TOTAL_NUMBER_OF_LINE_ITEM_QUANTITIES => 'Total of line item quantities',
            self::NUMBER_OF_LINE_ITEMS_IN_MESSAGE => 'Number of line items in message',
            self::NUMBER_OF_LINE_AND_SUB_ITEMS => 'Number of line and sub items in message',
            self::NUMBER_OF_INVOICE_LINES => 'Number of invoice lines',
            self::NUMBER_OF_CUSTOMS_ITEM_DETAIL_LINES => 'Number of Customs item detail lines',
            self::NUMBER_OF_CUSTOMS_ENTRIES => 'Number of Customs entries',
            self::TOTAL_GROSS_WEIGHT => 'Total gross weight',
            self::TOTAL_PIECES => 'Total pieces',
            self::TOTAL_NUMBER_OF_ULD => 'Total number of ULD (Unit Load Device)',
            self::TOTAL_NUMBER_OF_CONSIGNMENTS => 'Total number of consignments',
            self::CONSIGNMENT_PACKAGE_QUANTITY => 'Consignment package quantity',
            self::INVOICE_TOTAL_AMOUNT => 'Invoice total amount',
            self::LOADING_LIST_DOCUMENT_QUANTITY => 'Loading list document quantity',
            self::NUMBER_OF_CUSTOMS_COMMERCIAL_DETAIL_LINES => 'Number of Customs commercial detail lines',
            self::TOTAL_CONSIGNMENT_CUBE => 'Total consignment, cube',
            self::TOTAL_NUMBER_OF_EQUIPMENT => 'Total number of equipment',
            self::CONSIGNMENT_FOR_CUSTOMS_TOTAL_AMOUNT => 'Consignment for customs total amount',
            self::TOTAL_REPORTED_QUANTITY_IN_NET_WEIGHT => 'Total reported quantity in net weight',
            self::TOTAL_REPORTED_QUANTITY_IN_SUPPLEMENTARY_UNITS => 'Total reported quantity in supplementary units',
            self::TOTAL_REPORTED_INVOICE_VALUE => 'Total reported invoice(s) value',
            self::TOTAL_REPORTED_ANCILLARY_COSTS => 'Total reported ancillary costs',
            self::TOTAL_REPORTED_STATISTICAL_VALUE => 'Total reported statistical value',
            self::TOTAL_ORDERED_QUANTITY => 'Total ordered quantity',
            self::NUMBER_OF_ORDERS_REFERENCED => 'Number of orders referenced in this message',
            self::NUMBER_OF_REJECTED_ORDER_LINES => 'Number of rejected order lines',
            self::TOTAL_GROSS_MEASUREMENT_CUBE => 'Total gross measurement/cube',
            self::TOTAL_NUMBER_OF_CREDIT_ITEMS => 'Total number of credit items given for control purposes',
            self::TOTAL_NUMBER_OF_DEBIT_ITEMS => 'Total number of debit items given for control purposes',
            self::TOTAL_NET_WEIGHT_OF_CONSIGNMENT => 'Total net weight of consignment',
            self::TOTAL_NUMBER_OF_EMPTY_CONTAINERS => 'Total number of empty containers',
            self::NUMBER_OF_MESSAGES => 'Number of messages',
            self::TOTAL_GROSS_WEIGHT_WITHIN_TRANSPORT => 'Total gross weight of the goods within the means of transport',
            self::TOTAL_NUMBER_OF_ORIGINAL_BILLS_OF_LADING => 'Total number of original Bills of Lading',
            self::TOTAL_NUMBER_OF_COPY_BILLS_OF_LADING => 'Total number of copy Bills of Lading',
            self::NUMBER_OF_CONTAINERS_TO_BE_DISCHARGED => 'Number of containers to be discharged',
            self::NUMBER_OF_CONTAINERS_TO_BE_LOADED => 'Number of containers to be loaded',
            self::NUMBER_OF_CONTAINERS_TO_BE_RESTOWED => 'Number of containers to be restowed',
            self::NUMBER_OF_CONTAINERS_TO_BE_SHIFTED => 'Number of containers to be shifted',
            self::TOTAL_NUMBER_OF_INDIVIDUAL_TRANSACTIONS => 'Total number of individual transactions',
            self::TOTAL_NUMBER_OF_SEQUENCE_DETAILS => 'Total number of sequence details in message',
            self::TOTAL_NUMBER_OF_CREW => 'Total number of crew',
            self::TOTAL_NUMBER_OF_PASSENGERS => 'Total number of passengers',
            self::TOTAL_NUMBER_OF_WORK_TASKS => 'Total number of work tasks',
            self::TOTAL_NUMBER_OF_MILESTONES => 'Total number of milestones',
            self::TOTAL_NUMBER_OF_AVAILABLE_RESOURCES => 'Total number of available resources',
            self::TOTAL_NUMBER_OF_CONSTRAINTS => 'Total number of constraints',
            self::TOTAL_WHOLESALER_UNSOLD_QUANTITY => 'Total wholesaler unsold quantity',
            self::TOTAL_QUANTITY_HELD_BY_DELIVERY_VEHICLES => 'Total quantity held by delivery vehicles',
            self::TOTAL_QUANTITY_HELD_BY_RETAIL_OUTLETS => 'Total quantity held by retail outlets',
            self::TOTAL_REJECTED_RETURN_QUANTITY => 'Total rejected return quantity',
            self::NUMBER_OF_GOODS_ITEMS => 'Number of goods items in the message',
            self::NUMBER_OF_PATIENTS => 'Number of patients',
            self::HASH_TOTAL_OF_REPORTED_DEBIT_ITEMS => 'Hash total of reported debit items',
            self::HASH_TOTAL_OF_REPORTED_CREDIT_ITEMS => 'Hash total of reported credit items',
            self::TOTAL_NUMBER_OF_ERRORS_REPORTED => 'Total number of errors reported',
            self::TOTAL_NUMBER_OF_TRANSPORT_UNITS => 'Total number of transport units',
            self::TOTAL_LOADING_METRES => 'Total loading metres',
            self::DAYS_UNDER_CUSTOMS_TRANSIT_CONTROL => 'Days under customs transit control',
            self::TOTAL_GROSS_WEIGHT_OF_CONSIGNMENT_SHIPPER_MEASURED => 'Total gross weight of consignment, shipper measured',
            self::TOTAL_PALLET_GROSS_WEIGHT => 'Total pallet gross weight',
            self::NUMBER_OF_AFFIXED_SEALS => 'Number of affixed seals',
            self::NUMBER_OF_PREMISES => 'Number of premises',
            self::NUMBER_OF_METERS => 'Number of meters',
        };
    }
}

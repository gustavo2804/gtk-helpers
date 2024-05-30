<?php

// https://service.unece.org/trade/untdid/d07a/tred/tred2005.htm
enum UNDateTimePeriodFunctionCodeQualifier: string
{
	public static function source()
	{
		return "https://service.unece.org/trade/untdid/d07a/tred/tred2005.htm";
	}

    case ServiceCompletionDateTimeActual                         = '1';
    case DeliveryDateTimeRequested                               = '2';
    case InvoiceDocumentIssueDatetime                            = '3';
    case OrderDocumentIssueDatetime                              = '4';
    case SaleableStockDemandCoverPeriodExpected                  = '5';
    case MovedFromLocationDate                                   = '6';
    case EffectiveFromDatetime                                   = '7';
    case OrderReceivedDatetime                                   = '8';
    case ProcessingDatetime                                      = '9';
    case ShipmentDateTimeRequested                               = '10';
    case DespatchDateAndOrTime                                   = '11';
    case TermsDiscountDueDatetime                                = '12';
    case TermsNetDueDate                                         = '13';
    case PaymentDateTimeDeferred                                 = '14';
    case PromotionStartDatetime                                  = '15';
    case PromotionEndDatetime                                    = '16';
    case DeliveryDateTimeEstimated                               = '17';
    case InstallationDateTimePeriod                              = '18';
    case MeatAgeingPeriod                                        = '19';
    case ChequeDatetime                                          = '20';
    case ChargeBackDatetime                                      = '21';
    case FreightBillDatetime                                     = '22';
    case EquipmentReconditioningDateTimeActual                   = '23';
    case TransferNoteAcceptanceDateAndTime                       = '24';
    case DeliveryDateTimeActual                                  = '35';
    case ExpiryDate                                              = '36';
    case ShipNotBeforeDatetime                                   = '37';
    case ShipNotLaterThanDatetime                                = '38';
    case ShipWeekOfDate                                          = '39';
    case ClinicalInformationIssueDateAndOrTime                   = '40';
    case EventDurationExpected                                   = '41';
    case SupersededDatetime                                      = '42';
    case EventDurationIntended                                   = '43';
    case Availability                                            = '44';
    case CompilationDateAndTime                                  = '45';
    case CancellationDate                                        = '46';
    case StatisticalTimeSeriesDate                               = '47';
    case Duration                                                = '48';
    case DeliverNotBeforeAndNotAfterDates                        = '49';
    case GoodsReceiptDatetime                                    = '50';
    case CumulativeQuantityStartDate                             = '51';
    case CumulativeQuantityEndDate                               = '52';
    case BuyersLocalTime                                         = '53';
    case SellersLocalTime                                        = '54';
    case ConfirmedDatetime                                       = '55';
    case OriginalAuthorisationDateAndOrTime                      = '56';
    case PrecautionRelevantPeriod                                = '57';
    case ClearanceDateCustoms                                    = '58';
    case InboundMovementAuthorizationDate                        = '59';
    case EngineeringChangeLevelDate                              = '60';
    case CancelIfNotDeliveredByThisDate                          = '61';
    case ExcludedDate                                            = '62';
    case DeliveryDateTimeLast                                    = '63';
    case DeliveryDateTimeEarliest                                = '64';
    case DeliveryDateTime1stSchedule                             = '65';
    case ExcludedPeriod                                          = '66';
    case DeliveryDateTimeCurrentSchedule                         = '67';
    case AdditionalPeriod                                        = '68';
    case DeliveryDateTimePromisedBefore                          = '69';
    case AdditionalDate                                          = '70';
    case DeliveryDateTimeRequestedForAfterAndIncluding           = '71';
    case DeliveryDateTimePromisedForAfterAndIncluding            = '72';
    case GuaranteePeriod                                         = '73';
    case DeliveryDateTimeRequestedForPriorToAndIncluding         = '74';
    case DeliveryDateTimePromisedForPriorToAndIncluding          = '75';
    case DeliveryDateTimeScheduledFor                            = '76';
    case SpecificationRevisionDate                               = '77';
    case EventDateTimePeriodActual                               = '78';
    case ShipmentDateTimePromisedFor                             = '79';
    case PlanningEndDateAndOrTimeActual                          = '80';
    case ShipmentDateTimeRequestedForAfterAndIncluding           = '81';
    case MedicineAdministrationTime                              = '82';
    case DispensingIntervalMinimum                               = '83';
    case ShipmentDateTimeRequestedForPriorToAndIncluding         = '84';
    case ShipmentDateTimePromisedForPriorToAndIncluding          = '85';
    case MedicationDateTimeStart                                 = '86';
    case TravelServiceConnectionTime                             = '87';
    case SummerTimeStart                                         = '88';
    case InquiryDate                                             = '89';
    case ReportStartDate                                         = '90';
    case ReportEndDate                                           = '91';
    case ContractEffectiveDate                                   = '92';
    case ContractExpiryDate                                      = '93';
    case ProductionManufactureDate                               = '94';
    case BillOfLadingDate                                        = '95';
    case DischargeDateTime                                       = '96';
    case TransactionCreationDate                                 = '97';
    case WinterTimeStart                                         = '98';
    case QuotationOpeningDate                                    = '99';
    case ProductAgeingPeriodBeforeDelivery                       = '100';
    case ProductionDateNoScheduleEstablishedAsOf                 = '101';
    case HealthProblemPeriod                                     = '102';
}

<?php
/*******************************************************************************
 * Copyright 2009-2018 Amazon Services. All Rights Reserved.
 * Licensed under the Apache License, Version 2.0 (the "License"); 
 *
 * You may not use this file except in compliance with the License. 
 * You may obtain a copy of the License at: http://aws.amazon.com/apache2.0
 * This file is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR 
 * CONDITIONS OF ANY KIND, either express or implied. See the License for the 
 * specific language governing permissions and limitations under the License.
 *******************************************************************************
 * PHP Version 5
 * @category Amazon
 * @package  FBA Outbound Service MWS
 * @version  2010-10-01
 * Library Version: 2016-01-01
 * Generated: Wed Sep 12 07:08:09 PDT 2018
 */

/**
 * Create Fulfillment Order Sample
 */

require_once('.config.inc.php');

/************************************************************************
 * Instantiate Implementation of FBAOutboundServiceMWS
 *
 * AWS_ACCESS_KEY_ID and AWS_SECRET_ACCESS_KEY constants
 * are defined in the .config.inc.php located in the same
 * directory as this sample
 ***********************************************************************/
// More endpoints are listed in the MWS Developer Guide
// North America:
$serviceUrl = "https://mws.amazonservices.com/FulfillmentOutboundShipment/2010-10-01";
// Europe
//$serviceUrl = "https://mws-eu.amazonservices.com/FulfillmentOutboundShipment/2010-10-01";
// Japan
//$serviceUrl = "https://mws.amazonservices.jp/FulfillmentOutboundShipment/2010-10-01";
// China
//$serviceUrl = "https://mws.amazonservices.com.cn/FulfillmentOutboundShipment/2010-10-01";


 $config = array (
   'ServiceURL' => $serviceUrl,
   'ProxyHost' => null,
   'ProxyPort' => -1,
   'ProxyUsername' => null,
   'ProxyPassword' => null,
   'MaxErrorRetry' => 3,
 );

 $service = new FBAOutboundServiceMWS_Client(
        AWS_ACCESS_KEY_ID,
        AWS_SECRET_ACCESS_KEY,
        $config,
        APPLICATION_NAME,
        APPLICATION_VERSION);

/************************************************************************
 * Uncomment to try out Mock Service that simulates FBAOutboundServiceMWS
 * responses without calling FBAOutboundServiceMWS service.
 *
 * Responses are loaded from local XML files. You can tweak XML files to
 * experiment with various outputs during development
 *
 * XML files available under FBAOutboundServiceMWS/Mock tree
 *
 ***********************************************************************/
 // $service = new FBAOutboundServiceMWS_Mock();

/************************************************************************
 * Setup request parameters and uncomment invoke to try out
 * sample for Create Fulfillment Order Action
 ***********************************************************************/
 // @TODO: set request. Action can be passed as FBAOutboundServiceMWS_Model_CreateFulfillmentOrder
 $item = new FBAOutboundServiceMWS_Model_CreateFulfillmentOrderItem();
//  $item->setSellerSKU('TW-BHER-94M2');
//  $item->setSellerFulfillmentOrderItemId('TW-BHER-94M2');
//  $item->setQuantity(1);
//  $items = new FBAOutboundServiceMWS_Model_CreateFulfillmentOrderItemList();
//  $items->setmember($item);
 $address = new FBAOutboundServiceMWS_Model_Address();
 $address->setName('phase 11 ');
 $address->setLine1('10001 US-27');
 $address->setLine2('india');
 $address->setLine3('india');
 $address->setDistrictOrCounty('Sebring');
 $address->setCity('Florida');
 $address->setStateOrProvinceCode('FL');
 $address->setCountryCode('US');
 $address->setPostalCode('33876');
 $address->setPhoneNumber('8894054847');
 $request = new FBAOutboundServiceMWS_Model_CreateFulfillmentOrderRequest();
 $request->setSellerId(MERCHANT_ID);
 $request->setSellerFulfillmentOrderId('1001');
 $request->setDisplayableOrderId('1001');
 $request->setDisplayableOrderDateTime('2016-03-16T14:32:16.50-07');
 $request->setDisplayableOrderComment('Its a testing order');
 $request->setShippingSpeedCategory('Standard');
 
 $request->setDestinationAddress($address);
 $request->setItems($items);
 // object or array of parameters
 invokeCreateFulfillmentOrder($service, $request);

/**
  * Get Create Fulfillment Order Action Sample
  * Gets competitive pricing and related information for a product identified by
  * the MarketplaceId and ASIN.
  *
  * @param FBAOutboundServiceMWS_Interface $service instance of FBAOutboundServiceMWS_Interface
  * @param mixed $request FBAOutboundServiceMWS_Model_CreateFulfillmentOrder or array of parameters
  */

  function invokeCreateFulfillmentOrder(FBAOutboundServiceMWS_Interface $service, $request)
  {
      try {
        $response = $service->CreateFulfillmentOrder($request);

        echo ("Service Response\n");
        echo ("=============================================================================\n");

        $dom = new DOMDocument();
        $dom->loadXML($response->toXML());
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        echo $dom->saveXML();
        echo("ResponseHeaderMetadata: " . $response->getResponseHeaderMetadata() . "\n");

     } catch (FBAOutboundServiceMWS_Exception $ex) {
        echo("Caught Exception: " . $ex->getMessage() . "\n");
        echo("Response Status Code: " . $ex->getStatusCode() . "\n");
        echo("Error Code: " . $ex->getErrorCode() . "\n");
        echo("Error Type: " . $ex->getErrorType() . "\n");
        echo("Request ID: " . $ex->getRequestId() . "\n");
        echo("XML: " . $ex->getXML() . "\n");
        echo("ResponseHeaderMetadata: " . $ex->getResponseHeaderMetadata() . "\n");
     }
 }


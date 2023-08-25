<?php

/**
 * ALL API URL define
 *
 * @author wareon <wareon@qq.com>
 * @date 2020/1/10 12:25
 * @since rakuten rms 1.0
 */

namespace Wareon\RakutenRms;

class ApiDefine
{
    const VER = '20230201';// Item API Update before Version

    const HOST = 'https://api.rms.rakuten.co.jp';
    // 楽天API エンドポイント関連
    const RMS_API_ITEM_SEARCH = '/es/1.0/item/search';
    const RMS_API_ITEM_INSERT = '/es/1.0/item/insert';
    const RMS_API_ITEM_UPDATE = '/es/1.0/item/update';
    const RMS_API_ITEM_DELETE = '/es/1.0/item/delete';
    const RMS_API_ITEM_GET = '/es/1.0/item/get';
    const RMS_API_ITEMS_UPDATE = '/es/1.0/items/update';

    // ※SKU移行後店舗様向け
    const RMS_API_ITEM_SEARCH2 = '/es/2.0/items/search';
    const RMS_API_ITEM_INSERT2 = '/es/2.0/items/manage-numbers/';
    const RMS_API_ITEM_UPDATE2 = '/es/2.0/items/manage-numbers/';
    const RMS_API_ITEM_DELETE2 = '/es/2.0/items/manage-numbers/';
    const RMS_API_ITEM_GET2 = '/es/2.0/items/manage-numbers/';
    const RMS_API_ITEMS_UPDATE2 = '/es/2.0/items/manage-numbers/';

    const RMS_API_PRODUCT_SEARCH = '/es/2.0/product/search';

    const RMS_API_NAVIGATION_GENRE = '/es/1.0/navigation/genre/get';

    const RMS_API_INQUIRIES_COUNT = '/es/1.0/inquirymng-api/inquiries/count';
    const RMS_API_INQUIRIES_GET = '/es/1.0/inquirymng-api/inquiries';
    const RMS_API_INQUIRY_GET = '/es/1.0/inquirymng-api/inquiry/';
    const RMS_API_INQUIRY_REPLY = '/es/1.0/inquirymng-api/inquiry/reply';
    const RMS_API_INQUIRY_ATTACHMENT = '/es/1.0/inquirymng-api/attachment';
    const RMS_API_INQUIRY_ATTACHMENT_GET = '/es/1.0/inquirymng-api/attachment';

    const RMS_API_CABINET_USAGE_GET = '/es/1.0/cabinet/usage/get';
    const RMS_API_CABINET_FOLDERS_GET = '/es/1.0/cabinet/folders/get';
    const RMS_API_CABINET_FOLDERS_INSERT = '/es/1.0/cabinet/folder/insert';
    const RMS_API_CABINET_FILES_SEARCH = '/es/1.0/cabinet/files/search';
    const RMS_API_CABINET_FILE_INSERT = '/es/1.0/cabinet/file/insert';
    const RMS_API_CABINET_FILE_UPDATE = '/es/1.0/cabinet/file/update';
    const RMS_API_CABINET_FILE_DELETE = '/es/1.0/cabinet/file/delete';
    const RMS_API_ORDER_GET = '/es/1.0/order/ws';
    const RMS_API_ORDER_SOAP_WSDL = '/es/1.0/order/ws?WSDL';
    const RMS_API_INVENTORY_SOAP_ADDRESS = '/es/1.0/inventory/ws';
    const RMS_API_INVENTORY_SOAP_WSDL = 'https://inventoryapi.rms.rakuten.co.jp/rms/mall/inventoryapi';
    const RMS_API_PAYMENT_SOAP_WSDL = 'https://orderapi.rms.rakuten.co.jp/rccsapi-services/RCCSApiService?wsdl';

    const RMS_API_CATEGORY_SETS_GET = '/es/1.0/categoryapi/shop/categorysets/get';
    const RMS_API_CATEGORIES_GET = '/es/1.0/categoryapi/shop/categories/get';
    const RMS_API_CATEGORY_GET = '/es/1.0/categoryapi/shop/category/get';
    const RMS_API_CATEGORY_INSERT = '/es/1.0/categoryapi/shop/category/insert';
    const RMS_API_CATEGORY_UPDATE = '/es/1.0/categoryapi/shop/category/update';
    const RMS_API_CATEGORY_DELETE = '/es/1.0/categoryapi/shop/category/delete';
    const RMS_API_CATEGORY_MOVE = '/es/1.0/categoryapi/shop/category/move';

    // 楽天ペイAPI エンドポイント
    const RMS_API_RAKUTEN_PAY_GET_ORDER = '/es/2.0/order/getOrder/';
    const RMS_API_RAKUTEN_PAY_SEARCH_ORDER = '/es/2.0/order/searchOrder/';
    const RMS_API_RAKUTEN_PAY_CONFIRM_ORDER = '/es/2.0/order/confirmOrder/';
    const RMS_API_RAKUTEN_PAY_UPDATE_ORDER_DELIVERY = '/es/2.0/order/updateOrderDelivery/';
    const RMS_API_RAKUTEN_PAY_UPDATE_ORDER_SENDER = '/es/2.0/order/updateOrderSender/';
    const RMS_API_RAKUTEN_PAY_GET_PAYMENT = '/es/2.0/order/getPayment/';
    const RMS_API_RAKUTEN_PAY_CANCEL_ORDER = '/es/2.0/order/cancelOrder/';
    const RMS_API_RAKUTEN_PAY_UPDATE_ORDER_SHIPPING = '/es/2.0/order/updateOrderShipping/';
    const RMS_API_RAKUTEN_PAY_UPDATE_ORDER_SHIPPING_ASYNC = '/es/2.0/order/updateOrderShippingAsync/';
    const RMS_API_RAKUTEN_PAY_UPDATE_GET_RESULT_UPDATE_ORDER_SHIPPING_ASYNC = '/es/2.0/order/getResultUpdateOrderShippingAsync/';
    const RMS_API_RAKUTEN_PAY_UPDATE_GET_SUB_STATUS_LIST = '/es/2.0/order/getSubStatusList/';
    const RMS_API_RAKUTEN_PAY_UPDATE_ORDER_SUB_STATUS = '/es/2.0/order/updateOrderSubStatus/';
    const RMS_API_RAKUTEN_PAY_UPDATE_ORDER_MEMO = '/es/2.0/order/updateOrderMemo/';
    const RMS_API_RAKUTEN_PAY_UPDATE_ORDER_REMARKS = '/es/2.0/order/updateOrderRemarks/';
    const RMS_API_RAKUTEN_PAY_UPDATE_ORDER_SENDER_AFTER_SHIPPING = '/es/2.0/order/updateOrderSenderAfterShipping/';
    const RMS_API_RAKUTEN_PAY_CANCEL_ORDER_AFTER_SHIPPING = '/es/2.0/order/cancelOrderAfterShipping/';
    const RMS_API_RAKUTEN_PAY_UPDATE_ORDER_ORDERER = '/es/2.0/order/updateOrderOrderer/';

    // order sample api
    const RMS_API_RAKUTEN_PAY_SAMPLE_SEARCH_ORDER = '/es/2.0/sample.order/searchOrder/';
    const RMS_API_RAKUTEN_PAY_SAMPLE_GET_ORDER = '/es/2.0/sample.order/getOrder/';
    const RMS_API_RAKUTEN_PAY_SAMPLE_CONFIRM_ORDER = '/es/2.0/sample.order/confirmOrder/';
    const RMS_API_RAKUTEN_PAY_SAMPLE_UPDATE_ORDER_SHIPPING = '/es/2.0/sample.order/updateOrderShipping/';
    const RMS_API_RAKUTEN_PAY_SAMPLE_UPDATE_ORDER_SHIPPING_ASYNC = '/es/2.0/sample.order/updateOrderShippingAsync/';
    const RMS_API_RAKUTEN_PAY_SAMPLE_UPDATE_GET_RESULT_UPDATE_ORDER_SHIPPING_ASYNC = '/es/2.0/sample.order/getResultUpdateOrderShippingAsync/';
    const RMS_API_RAKUTEN_PAY_SAMPLE_UPDATE_GET_SUB_STATUS_LIST = '/es/2.0/sample.order/getSubStatusList/';
    const RMS_API_RAKUTEN_PAY_SAMPLE_UPDATE_ORDER_SUB_STATUS = '/es/2.0/sample.order/updateOrderSubStatus/';
    const RMS_API_RAKUTEN_PAY_SAMPLE_UPDATE_ORDER_MEMO = '/es/2.0/sample.order/updateOrderMemo/';
    const RMS_API_RAKUTEN_PAY_SAMPLE_UPDATE_ORDER_REMARKS = '/es/2.0/sample.order/updateOrderRemarks/';
    const RMS_API_RAKUTEN_PAY_SAMPLE_UPDATE_ORDER_SENDER = '/es/2.0/sample.order/updateOrderSender/';
    const RMS_API_RAKUTEN_PAY_SAMPLE_UPDATE_ORDER_SENDER_AFTER_SHIPPING = '/es/2.0/sample.order/updateOrderSenderAfterShipping/';
    const RMS_API_RAKUTEN_PAY_SAMPLE_CANCEL_ORDER = '/es/2.0/sample.order/cancelOrder/';
    const RMS_API_RAKUTEN_PAY_SAMPLE_CANCEL_ORDER_AFTER_SHIPPING = '/es/2.0/sample.order/cancelOrderAfterShipping/';
    const RMS_API_RAKUTEN_PAY_SAMPLE_UPDATE_ORDER_ORDERER = '/es/2.0/sample.order/updateOrderOrderer/';
    const RMS_API_RAKUTEN_PAY_SAMPLE_UPDATE_ORDER_DELIVERY = '/es/2.0/sample.order/updateOrderDelivery/';
    const RMS_API_RAKUTEN_PAY_SAMPLE_GET_PAYMENT = '/es/2.0/sample.order/getPayment/';

    // cabinet
    const RMS_API_RAKUTEN_CABINET_USAGE_GET = '/es/1.0/cabinet/usage/get';
    const RMS_API_RAKUTEN_CABINET_FOLDERS_GET = '/es/1.0/cabinet/folders/get';
    const RMS_API_RAKUTEN_CABINET_FOLDER_FILES_GET = '/es/1.0/cabinet/folder/files/get';
    const RMS_API_RAKUTEN_CABINET_FILES_SEARCH = '/es/1.0/cabinet/files/search';
    const RMS_API_RAKUTEN_CABINET_FILE_DELETE = '/es/1.0/cabinet/file/delete';
    const RMS_API_RAKUTEN_CABINET_TRASHBOX_FILES_GET = '/es/1.0/cabinet/trashbox/files/get';
    const RMS_API_RAKUTEN_CABINET_TRASHBOX_FILE_REVERT = '/es/1.0/cabinet/trashbox/file/revert';
    const RMS_API_RAKUTEN_CABINET_FILE_INSERT = '/es/1.0/cabinet/file/insert';
    const RMS_API_RAKUTEN_CABINET_FILE_UPDATE = '/es/1.0/cabinet/file/update';
    const RMS_API_RAKUTEN_CABINET_FOLDER_INSERT = '/es/1.0/cabinet/folder/insert';

    const RMS_API_SHOP_TOPDISPLAY = '/es/1.0/shop/topDisplay';
    const RMS_API_SHOP_SHOPLAYOUTIMAGE = '/es/1.0/shop/shopLayoutImage';
    const RMS_API_SHOP_SHOPLAYOUTCOMMON = '/es/1.0/shop/shopLayoutCommon';
    const RMS_API_SHOP_NAVIBUTTONINFO = '/es/1.0/shop/naviButtonInfo';
    const RMS_API_SHOP_NAVIBUTTON = '/es/1.0/shop/naviButton';
    const RMS_API_SHOP_LAYOUTTEXTSMALL = '/es/1.0/shop/layoutTextSmall';
    const RMS_API_SHOP_LAYOUTLOSSLEADER = '/es/1.0/shop/layoutLossLeader';
    const RMS_API_SHOP_LAYOUTITEMMAP = '/es/1.0/shop/layoutItemMap';
    const RMS_API_SHOP_LAYOUTCATEGORYMAP = '/es/1.0/shop/layoutCategoryMap';
    const RMS_API_SHOP_SHOPCALENDAR = '/es/1.0/shop/shopCalendar';
    const RMS_API_SHOP_MASTER = '/es/1.0/shop/shopMaster';
    const RMS_API_SHOP_DELVDATE_MASTER = '/es/1.0/shop/delvdateMaster';
    const RMS_API_SHOP_DELIVERY_SET_INFO = '/es/1.0/shop/deliverySetInfo';
    const RMS_API_SHOP_SORYOKBN = '/es/1.0/shop/soryoKbn';
    const RMS_API_SHOP_SHOPAREASORYO = '/es/1.0/shop/shopAreaSoryo';
    const RMS_API_SHOP_DELVAREAMASTER = '/es/1.0/shop/delvAreaMaster';
    const RMS_API_SHOP_LAYOUTTEXTLARGE = '/es/1.0/shop/layoutTextLarge';
    const RMS_API_SHOP_GOLDTOP = '/es/1.0/shop/goldTop';

    // Coupon
    const RMS_API_RAKUTEN_COUPON_ISSUE = '/es/1.0/coupon/issue';
    const RMS_API_RAKUTEN_COUPON_UPDATE = '/es/1.0/coupon/update';
    const RMS_API_RAKUTEN_COUPON_DELETE = '/es/1.0/coupon/delete';
    const RMS_API_RAKUTEN_COUPON_GET = '/es/1.0/coupon/get';
    const RMS_API_RAKUTEN_COUPON_SEARCH = '/es/1.0/coupon/search';
    const RMS_API_RAKUTEN_THANKSCOUPON_BASE = '/es/1.0/thankscoupon';

    // 商品登録(ItemAPI)設定関連
    const RMS_CATALOG_EXCEPTION_REASON_NO_JAN = 5;

    const RMS_IMAGE_BASE_URL = 'https://image.rakuten.co.jp/';

    // 在庫設定関連
    const RMS_ITEM_INVENTORY_TYPE_NORMAL = 1; // 通常在庫設定
    const RMS_ITEM_INVENTORY_TYPE_VARIATION = 2; // 項目選択肢別在庫設定

    // 受注関連設定
    const RMS_GET_ORDER_DATE_TYPE_ORDER = 1; // 注文日で取得

    // Request Type
    const REQUEST_XML = 1;
    const REQUEST_JSON = 2;
    const REQUEST_FILE = 3;
    const REQUEST_ALL = 4;
    const REQUEST_SOAP = 5;
    const REQUEST_XML_FILE = 6;
}

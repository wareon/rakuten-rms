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
    const HOST = 'https://api.rms.rakuten.co.jp';
    // 楽天API エンドポイント関連
    const RMS_API_ITEM_SEARCH = '/es/1.0/item/search';
    const RMS_API_ITEM_INSERT = '/es/1.0/item/insert';
    const RMS_API_ITEM_UPDATE = '/es/1.0/item/update';
    const RMS_API_ITEM_GET = '/es/1.0/item/get';

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

    // 楽天ペイAPI エンドポイント
    const RMS_API_RAKUTEN_PAY_GET_ORDER = '/es/2.0/order/getOrder/';
    const RMS_API_RAKUTEN_PAY_SEARCH_ORDER = '/es/2.0/order/searchOrder/';
    const RMS_API_RAKUTEN_PAY_CONFIRM_ORDER = '/es/2.0/order/confirmOrder/';
    const RMS_API_RAKUTEN_PAY_UPDATE_ORDER_DELIVERY = '/es/2.0/order/updateOrderDelivery/';
    const RMS_API_RAKUTEN_PAY_UPDATE_ORDER_SENDER = '/es/2.0/order/updateOrderSender/';
    const RMS_API_RAKUTEN_PAY_GET_PAYMENT = '/es/2.0/order/getPayment/';
    const RMS_API_RAKUTEN_PAY_CANCEL_ORDER = '/es/2.0/order/cancelOrder/';
    const RMS_API_RAKUTEN_PAY_UPDATE_ORDER_SHIPPING = '/es/2.0/order/updateOrderShipping/';

    // 商品登録(ItemAPI)設定関連
    const RMS_CATALOG_EXCEPTION_REASON_NO_JAN = 5;

    const RMS_IMAGE_BASE_URL = 'https://image.rakuten.co.jp/';

    // 在庫設定関連
    const RMS_ITEM_INVENTORY_TYPE_NORMAL = 1; // 通常在庫設定
    const RMS_ITEM_INVENTORY_TYPE_VARIATION = 2; // 項目選択肢別在庫設定

    // 受注関連設定
    const RMS_GET_ORDER_DATE_TYPE_ORDER = 1; // 注文日で取得
}




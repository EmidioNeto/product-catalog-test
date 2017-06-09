<?php
/**
 * Setup routes with a single request method:
 *
 */
$app->get('/wms', App\Resource\Wms\WmsAction::class, 'wms.get');

$app->post('/catalog', App\Resource\Catalog\CatalogAction::class, 'catalog.post');

$app->get('/stock/{sku:[^/]+}/{size:[^/]+}[/]', App\Resource\Stock\StockAction::class, 'stock.get');

$app->get('/cms/category/{category:[^/]+}', App\Resource\Cms\CmsAction::class, 'cms.category.get');

$app->get('/cms/sku/{sku:[^/]+}', App\Resource\Cms\CmsAction::class, 'cms.sku.get');

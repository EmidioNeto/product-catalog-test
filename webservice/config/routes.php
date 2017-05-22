<?php
/**
 * Setup routes with a single request method:
 *
 * $app->get('/', App\Action\HomePageAction::class, 'home');
 * $app->post('/album', App\Action\AlbumCreateAction::class, 'album.create');
 * $app->put('/album/:id', App\Action\AlbumUpdateAction::class, 'album.put');
 * $app->patch('/album/:id', App\Action\AlbumUpdateAction::class, 'album.patch');
 * $app->delete('/album/:id', App\Action\AlbumDeleteAction::class, 'album.delete');
 *
 * Or with multiple request methods:
 *
 * $app->route('/contact', App\Action\ContactAction::class, ['GET', 'POST', ...], 'contact');
 */
$app->get('/', App\Action\HomePageAction::class, 'home');

$app->get('/wms', App\Resource\Wms\WmsAction::class, 'wms.get');

$app->post('/catalog', App\Resource\Catalog\CatalogAction::class, 'catalog.post');

$app->get('/stock/{sku:[^/]+}/{size:[^/]+}[/]', App\Resource\Stock\StockAction::class, 'stock.get');

$app->get('/cms/category/{category:[^/]+}', App\Resource\Cms\CmsAction::class, 'cms.category.get');

$app->get('/cms/sku/{sku:[^/]+}', App\Resource\Cms\CmsAction::class, 'cms.sku.get');

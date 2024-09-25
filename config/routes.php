<?php
/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Http\Middleware\BodyParserMiddleware;
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

/*
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 */

return function (RouteBuilder $builder): void {
    $builder->scope('/', function (RouteBuilder $routes) {
        // Register scoped middleware for in scopes.
        $routes->registerMiddleware('csrf', new CsrfProtectionMiddleware([
            'httponly' => true,
        ]));

        /*
        * Apply a middleware to the current route scope.
        * Requires middleware to be registered through `Application::routes()` with `registerMiddleware()`
        */
        $routes->applyMiddleware('csrf');

        /*
        * Here, we are connecting '/' (base path) to a controller called 'Pages',
        * its action called 'display', and we pass a param to select the view file
        * to use (in this case, templates/Pages/home.php)...
        */
        $routes->connect('/', ['controller' => 'Home', 'action' => 'index', 'home']);
        $routes->registerMiddleware('bodyParser', new BodyParserMiddleware());

        $routes->connect('/posts', ['controller' => 'Home', 'action' => 'index']);

        $routes->prefix('api', function (RouteBuilder $builder) {
            $builder->setExtensions(['json']);
            $builder->applyMiddleware('bodyParser');
            $builder->connect('/posts/add', ['controller' => 'Posts', 'action' => 'add', '_method' => 'POST']);
            $builder->connect('/posts', ['controller' => 'Posts', 'action' => 'index', '_method' => 'GET']);
            //$builder->connect('/posts/edit', ['controller' => 'Posts', 'action' => 'edit', '_method' => 'POST']);
        });
        /*
        * ...and connect the rest of 'Pages' controller's URLs.
        */
        $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

        /*
        * Connect catchall routes for all controllers.
        *
        * The `fallbacks` method is a shortcut for
        *
        * ```
        * $builder->connect('/:controller', ['action' => 'index']);
        * $builder->connect('/:controller/:action/*', []);
        * ```
        *
        * You can remove these routes once you've connected the
        * routes you want in your application.
        */
        $routes->fallbacks();
    });
};

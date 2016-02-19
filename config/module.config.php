<?php
/**
 * Created by PhpStorm.
 * User: Thiago
 * Date: 01/09/2015
 * Time: 14:08
 */

namespace TSS\Bootstrap;

use TSS\Bootstrap\Controller\Plugin\EmailPlugin;
use TSS\Bootstrap\Controller\Plugin\ImageThumbPlugin;
use TSS\Bootstrap\View\Helper\Referer;
use Zend\ServiceManager\ServiceLocatorInterface;

return array(
    'controllers' => array(
        'invokables' => array(),
    ),
    'controller_plugins' => array(
        'factories' => array(
            'email' => function (\Zend\ServiceManager\AbstractPluginManager $pluginManager) {
                $sm = $pluginManager->getServiceLocator();
                $config = $sm->get('config');
                $transport = $sm->get('mail.transport');
                $emailPlugin = new EmailPlugin($transport, $config['mail']['options']);

                return $emailPlugin;
            },
            'imageThumb' => function () {
                $thumbImage = new ImageThumbPlugin(
                    "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",
                    192,
                    192
                );

                return $thumbImage;
            },
        ),
        'invokables' => array(
            'tssReferer' => Controller\Plugin\Referer::class,
        )
    ),

    'doctrine' => array(
        'driver' => array(
            'tss_bootstrap_entities' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/TSS/Bootstrap/Entity'),
            ),
            'orm_default' => array(
                'drivers' => array(
                    'TSS\Bootstrap' => 'tss_bootstrap_entities',
                ),
            ),
        ),
    ),

    'router' => array(
        'routes' => array(),
    ),

    'view_helpers' => array(
        'aliases' => array(),
        'factories' => array(
            'tssPaginator' => function (\Zend\ServiceManager\AbstractPluginManager $pluginManager) {
                $params = $pluginManager->getServiceLocator()->get('ControllerPluginManager')->get('params');
                $paginator = new View\Helper\PaginatorHelper();

                $paginator->setParams($params);

                return $paginator;
            },
            'tssReferer' => function (ServiceLocatorInterface $helpers) {
                $application = $helpers->getServiceLocator()->get('Application');
                $referer = new Referer($application->getRequest());
                return $referer;
            },
        ),
        'invokables' => array(
            'tssFlashMessenger' => View\Helper\FlashMessenger::class,
            'tssFormCheckbox' => Form\View\Helper\FormCheckbox::class,
            'tssFormRow' => Form\View\Helper\FormRow::class,
            'tssFormRowHorizontal' => Form\View\Helper\FormRowHorizontal::class,
        )
    ),

    'view_helper_config' => array(
        'flashmessenger' => array(
            'message_open_format' => '<div%s><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><ul><li>',
            'message_close_string' => '</li></ul></div>',
            'message_separator_string' => '</li><li>'
        )
    ),

    'view_manager' => array(
        'controller_map' => array(
            'TSS\Bootstrap' => true,
        ),
        'template_map' => array(),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),

    'console' => array(
        'router' => array(
            'routes' => array(),
        ),
    ),
);
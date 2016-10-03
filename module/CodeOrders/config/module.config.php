<?php
return [
    'router' => [
        'routes' => [
            'code-orders.rest.ptypes' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/ptypes[/:ptypes_id]',
                    'defaults' => [
                        'controller' => 'CodeOrders\\V1\\Rest\\Ptypes\\Controller',
                    ],
                ],
            ],
            'code-orders.rest.users' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/users[/:users_id]',
                    'defaults' => [
                        'controller' => 'CodeOrders\\V1\\Rest\\Users\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'code-orders.rest.ptypes',
            1 => 'code-orders.rest.users',
        ],
    ],
    'zf-rest' => [
        'CodeOrders\\V1\\Rest\\Ptypes\\Controller' => [
            'listener' => 'CodeOrders\\V1\\Rest\\Ptypes\\PtypesResource',
            'route_name' => 'code-orders.rest.ptypes',
            'route_identifier_name' => 'ptypes_id',
            'collection_name' => 'ptypes',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \CodeOrders\V1\Rest\Ptypes\PtypesEntity::class,
            'collection_class' => \CodeOrders\V1\Rest\Ptypes\PtypesCollection::class,
            'service_name' => 'ptypes',
        ],
        'CodeOrders\\V1\\Rest\\Users\\Controller' => [
            'listener' => \CodeOrders\V1\Rest\Users\UsersResource::class,
            'route_name' => 'code-orders.rest.users',
            'route_identifier_name' => 'users_id',
            'collection_name' => 'users',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \CodeOrders\V1\Rest\Users\UsersEntity::class,
            'collection_class' => \CodeOrders\V1\Rest\Users\UsersCollection::class,
            'service_name' => 'users',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'CodeOrders\\V1\\Rest\\Ptypes\\Controller' => 'HalJson',
            'CodeOrders\\V1\\Rest\\Users\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'CodeOrders\\V1\\Rest\\Ptypes\\Controller' => [
                0 => 'application/vnd.code-orders.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'CodeOrders\\V1\\Rest\\Users\\Controller' => [
                0 => 'application/vnd.code-orders.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'CodeOrders\\V1\\Rest\\Ptypes\\Controller' => [
                0 => 'application/vnd.code-orders.v1+json',
                1 => 'application/json',
            ],
            'CodeOrders\\V1\\Rest\\Users\\Controller' => [
                0 => 'application/vnd.code-orders.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \CodeOrders\V1\Rest\Ptypes\PtypesEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'code-orders.rest.ptypes',
                'route_identifier_name' => 'ptypes_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \CodeOrders\V1\Rest\Ptypes\PtypesCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'code-orders.rest.ptypes',
                'route_identifier_name' => 'ptypes_id',
                'is_collection' => true,
            ],
            \CodeOrders\V1\Rest\Users\UsersEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'code-orders.rest.users',
                'route_identifier_name' => 'users_id',
                'hydrator' => \Zend\Hydrator\ClassMethods::class,
            ],
            \CodeOrders\V1\Rest\Users\UsersCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'code-orders.rest.users',
                'route_identifier_name' => 'users_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-apigility' => [
        'db-connected' => [
            'CodeOrders\\V1\\Rest\\Ptypes\\PtypesResource' => [
                'adapter_name' => 'dummy',
                'table_name' => 'ptypes',
                'hydrator_name' => \Zend\Hydrator\ArraySerializable::class,
                'controller_service_name' => 'CodeOrders\\V1\\Rest\\Ptypes\\Controller',
                'entity_identifier_name' => 'id',
            ],
        ],
    ],
    'zf-content-validation' => [
        'CodeOrders\\V1\\Rest\\Ptypes\\Controller' => [
            'input_filter' => 'CodeOrders\\V1\\Rest\\Ptypes\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'CodeOrders\\V1\\Rest\\Ptypes\\Validator' => [
            0 => [
                'name' => 'name',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '45',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'service_manager' => [
        'factories' => [
            \CodeOrders\V1\Rest\Users\UsersResource::class => \CodeOrders\V1\Rest\Users\UsersResourceFactory::class,
            \CodeOrders\V1\Rest\Users\UsersRepository::class => \CodeOrders\V1\Rest\Users\UsersRepositoryFactory::class,
        ],
    ],
    'zf-mvc-auth' => [
        'authorization' => [
            'CodeOrders-V1-Rest-Users-Controller' => [
                'collection' => [
                    'GET' => true,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => true,
                    'POST' => false,
                    'PUT' => true,
                    'PATCH' => true,
                    'DELETE' => true,
                ],
            ],
        ],
    ],
];

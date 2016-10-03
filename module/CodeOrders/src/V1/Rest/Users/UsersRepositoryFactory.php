<?php
/**
 * Created by PhpStorm.
 * User: terainfor
 * Date: 29/09/16
 * Time: 14:34
 */

namespace CodeOrders\V1\Rest\Users;


use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class UsersRepositoryFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $dbadapter = $serviceLocator->get('dummy');
        $userMapper = new UsersMapper();
        $hydrator = new HydratingResultSet($userMapper, new UsersEntity());
        $tablegateway = new TableGateway('oauth_users', $dbadapter, null, $hydrator);
        $usersrepository = new UsersRepository($tablegateway);
        return $usersrepository;
    }

    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return object
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when
     *     creating a service.
     * @throws ContainerException if any other error occurs
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        // TODO: Implement __invoke() method.
    }
}
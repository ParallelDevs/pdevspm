<?php

namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class MenuBuilder
{
    private $factory;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }


    public function createMainMenu(RequestStack $requestStack)
    {
        $menu = $this->factory->createItem('root', ['childrenAttributes' => ['class' => 'sidebar-menu']]);

        $menu->addChild('Project', [
            'route' => 'project',
            'label' => '<i class="fa fa-sitemap"></i><span>Projects</span>',
            'extras' => ['safe_label' => true]
        ]);

        $menu->addChild('User', [
            'route' => 'admin_user',
            'label' => '<i class="fa fa-users"></i><span>User</span>',
            'extras' => ['safe_label' => true]
        ]);

        $menu->addChild('Configuration', [
            'uri' => '#',
            'label' => '<i class="fa fa-cogs"></i><span>Configuration</span><i class="fa fa-angle-left pull-right"></i>',
            'attributes' => ['class' => 'treeview'],
            'childrenAttributes' => ['class' => 'treeview-menu'],
            'extras' => ['safe_label' => true]
        ]);

        $menu['Configuration']->addChild('Project', [
            'uri' => '#',
            'label' => '<span>Project</span><i class="fa fa-angle-left pull-right"></i>',
            'attributes' => ['class' => 'treeview'],
            'childrenAttributes' => ['class' => 'treeview-menu'],
            'extras' => ['safe_label' => true]
        ]);

        $menu['Configuration']['Project']->addChild('ProjectStatus', [
          'route' => 'config_project_status',
          'label' => '<span>Project Status</span>',
          'extras' => ['safe_label' => true]
        ]);

        $menu['Configuration']['Project']->addChild('ProjectType', [
          'route' => 'config_project_type',
          'label' => '<span>Project Type</span>',
          'extras' => ['safe_label' => true]
        ]);

        $menu['Configuration']['Project']->addChild('VersionStatus', [
            'route' => 'versionstatus',
            'label' => '<span>Version Status</span>',
            'extras' => ['safe_label' => true]
        ]);

        $menu['Configuration']->addChild('Task', [
            'uri' => '#',
            'label' => '<span>Task</span><i class="fa fa-angle-left pull-right"></i>',
            'attributes' => ['class' => 'treeview'],
            'childrenAttributes' => ['class' => 'treeview-menu'],
            'extras' => ['safe_label' => true]
        ]);

        $menu['Configuration']['Task']->addChild('task_status', [
            'route' => 'config_task_status',
            'label' => '<span>Task Status</span>',
            'extras' => ['safe_label' => true]
        ]);

        $menu['Configuration']['Task']->addChild('TaskType', [
            'route' => 'config_task_type',
            'label' => '<span>Task Types</span>',
            'extras' => ['safe_label' => true]
        ]);

        $menu['Configuration']['Task']->addChild('TaskLabel', [
            'route' => 'config_task_label',
            'label' => '<span>Task Labels</span>',
            'extras' => ['safe_label' => true]
        ]);

        $menu['Configuration']['Task']->addChild('task_priority', [
            'route' => 'config_task_priority',
            'label' => '<span>Task Priority</span>',
            'extras' => ['safe_label' => true]
        ]);

        return $menu;
    }

}

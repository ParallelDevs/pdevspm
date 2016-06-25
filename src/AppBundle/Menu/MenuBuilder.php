<?php

namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;

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

    public function createMainMenu(array $options)
    {
        $menu = $this->factory->createItem('root');

        $menu->setChildrenAttribute('class', 'sidebar-menu');
        // Header
        $menu->addChild('MAIN NAVIGATION');
        $menu['MAIN NAVIGATION']->setAttribute('class', 'header');

        // Project
        $menu->addChild('project', [
            'label' => '<i class="fa fa-sitemap"></i> <span>Projects</span> <i class="fa fa-angle-left pull-right"></i>',
            'uri' => '#',
            'extras' => ['safe_label' => true],
        ]);
        $menu['project']->setAttribute('class', 'treeview');
        $menu['project']->setChildrenAttribute('class', 'treeview-menu');
        $menu['project']->addChild('list', [
          'label' => '<i class="fa fa-circle-o"></i> View All',
          'route' => 'project_index',
          'extras' => ['safe_label' => true],
        ]);
        $menu['project']->addChild('New', [
          'label' => '<i class="fa fa-circle-o"></i> Add Project',
          'route' => 'project_new',
          'extras' => ['safe_label' => true],
        ]);

        return $menu;
    }
}

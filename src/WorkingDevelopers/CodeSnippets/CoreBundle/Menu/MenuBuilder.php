<?php
/**
 * Created by Christoph Graupner <ch.graupner@workingdeveloper.net>.
 *
 * Copyright (c) 2015 WorkingDevelopers.NET
 */

namespace WorkingDevelopers\CodeSnippets\CoreBundle\Menu;


use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;

class MenuBuilder
{
    private $factory;

    /**
     * @param FactoryInterface $factory
     *
     * Add any other dependency you need
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param array $options
     * @return \Knp\Menu\ItemInterface
     */
    public function createMainMenu(array $options)
    {
        $menu = $this->factory->createItem('root', ['branch_class' => 'treeview']);
        $menu->setChildrenAttribute('class', 'sidebar-menu');

        $menu = $this->factory->createItem(
            'root',
            [
                'childrenAttributes' => array(
                    'class' => 'sidebar-menu main-menu'
                )
            ]
        );

        $menu->addChild('Dashboard', array('route' => 'wd_cs_domain_homepage'));

        $menu->addChild('MAIN NAVIGATION')
             ->setAttribute('class', 'header');
        $this->createMainNavigationMenu($menu, $options);
//        $menu->addChild($this->createMainNavigationMenu());

        $menu->addChild('ADMINISTRATION')
             ->setAttribute('class', 'header');
        $this->createAdministrationMenu($menu);

        $menu->addChild('EXTRAS')
             ->setAttribute('class', 'header');
        $this->createExtraMenu($menu);


        // ... add more children

        return $menu;
    }

    protected function createMainNavigationMenu(ItemInterface $menu, $options)
    {
//        $menu = $this->factory->createItem('MAIN Navigation')
//        ->setAttribute('class','treeview');

        $menu->addChild('Dashboard', array(
                'route' => 'wd_cs_domain_homepage',
                'class' => 'treeview',
                //                'extras' => [
                //                    'icon' => 'dashboard'
                //                ]
            )
        )
             ->setExtra('icon', 'dashboard')
             ->setExtra('label', 'new');
        // ... add more children

//        $menuDiagrams = $menu->addChild(
//            'Snippets',
//            array_merge(
//                [
//                    'uri' => '#',
//                    'attributes' => [
//                        'id' => 'user_edit_profile'
//                    ],
//                    'childrenAttributes' =>
//                        array(
//                            'role' => 'menu',
//                            'class' => 'treeview-menu'
//                        ),
//                    'linkAttributes' => [
//                        'aria-expanded' => 'false',
//                        'role' => 'sub-menu',
////                        'data-toggle' => 'dropdown',
//                        'class' => 'treeview'
//                    ],
//                    'extras' => [
//                        'icon' => 'dashboard'
//                    ]
//
//                ],
//                $options
//            )
//        );
        $menu->addChild(
            'Snippets', [
                'route' => 'wd_cs_admin_snippet',
                //'routeParameters' => array('id' => $blog->getId()),
                //                'attributes' => [
                //                    'id' => 'menu_user_admin_home'
                //                ]
            ]
        )->setExtra('icon', 'files-o');

        $menu->addChild(
            'Language',
            [
                'route' => 'wd_cs_admin_programminglanguage',
                //'routeParameters' => array('id' => $blog->getId()),
                //                'attributes' => [
                //                    'id' => 'menu_user_admin_home'
                //                ]
            ]
        )->setExtra('icon', 'file-code-o');
        $menu->addChild(
            'Tags', [
                'route' => 'wd_cs_admin_tag',
                //'routeParameters' => array('id' => $blog->getId()),
                //                    'attributes' => [
                //                        'id' => 'menu_user_admin_home'
                //                    ]
            ]
        )->setExtra('icon', 'flag-o');;
        $menu->addChild(
            'Test', [
                'route' => 'wd_cs_admin_tag',
                //'routeParameters' => array('id' => $blog->getId()),
                //                    'attributes' => [
                //                        'id' => 'menu_user_admin_home'
                //                    ]
            ]
        )
             ->setExtra('icon', 'file-code-o')
             ->setExtra('color', 'yellow');

        return $menu;
    }

    protected function createAdministrationMenu(ItemInterface $menu)
    {
        $menuConfig = $menu->addChild('Configuration',
            array(
                'uri' => '#',
                'branch_class' => 'treeview',
                'childrenAttributes' => array(
                    'class' => 'treeview-menu'
                )

            )
        )->setExtra('icon', 'gears');
        $menuConfig->addChild('Config Parameters',
            [
                'route' => 'wd_cs_admin_config'
            ]
        )->setExtra('icon', 'circle-o');
        // ... add more children
        $menu->addChild(
            'Snippets', [
                'route' => 'wd_cs_admin_snippet',
                //'routeParameters' => array('id' => $blog->getId()),
                'attributes' => [
                    'id' => 'menu_user_admin_home'
                ]
            ]
        );
        $menu->addChild(
            'Language',
            [
                'route' => 'wd_cs_admin_programminglanguage',
                //'routeParameters' => array('id' => $blog->getId()),
                'attributes' => [
                    'id' => 'menu_user_admin_home'
                ]
            ]
        );

        return $menu;
    }

    protected function createExtraMenu(ItemInterface $menu)
    {
        $menu->addChild('UI Examples', array('route' => '_wd_cs_theme_core_example_dashboard'))
             ->setExtra('icon', 'book');;
        // ... add more children

        return $menu;
    }

    /**
     * @param array $options
     * @return \Knp\Menu\ItemInterface
     */
    public function createSidebarMenu(array $options)
    {
        $menu = $this->factory->createItem('root');
        $menu->addChild('MAIN NAVIGATION')
             ->setAttribute('class', 'header')
             ->setChildrenAttribute('class', 'treeview');
        $this->createMainNavigationMenu($menu, $options);
        $menu->addChild('ADMINISTRATION')
             ->setAttribute('class', 'header');
        $this->createAdministrationMenu($menu);

        return $menu;
    }

    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem(
            'root',
            [
                'childrenAttributes' => array(
                    'class' => 'nav navbar-nav main-menu'
                )
            ]
        );

        $menu->addChild(
            'Home',
            array_merge(
                [
                    'route' => 'wd_cs_domain_homepage',
                    'attributes' => [
                        'id' => 'user_edit_profile'
                    ]
                ],
                $options
            )
        );
        $menuDiagrams = $menu->addChild(
            'Diagrams',
            array_merge(
                [
                    'uri' => '#',
                    'attributes' => [
                        'id' => 'user_edit_profile'
                    ],
                    'childrenAttributes' =>
                        array(
                            'role' => 'menu',
                            'class' => 'dropdown-menu'
                        ),
                    'linkAttributes' => [
                        'aria-expanded' => 'false',
                        'role' => 'button',
                        'data-toggle' => 'dropdown',
                        'class' => 'dropdown-toggle'
                    ]

                ],
                $options
            )
        );

        $menuDiagrams->addChild(
            'Pedigree',
            array_merge(
                [
                    'route' => 'wd_cs_domain_homepage',
                    //'routeParameters' => array('id' => $blog->getId()),
                    'attributes' => [
                        'id' => 'menu_user_admin_home'
                    ]
                ],
                $options
            )
        );

        $this->addDiagramMenu($menuDiagrams, $factory, $options);


        $menuLocations = $menu->addChild(
            'Locations',
            array_merge(
                [
                    'route' => 'wd_cs_domain_homepage',
                    'attributes' => ['id' => 'user_edit_profile']
                ],
                $options
            )
        );

        // ... add more children

        return $menu;
    }

    protected function addDiagramMenu(ItemInterface $menu, FactoryInterface $factory, $options)
    {
        $menu->addChild(
            'Pedigree',
            array_merge(
                [
                    'route' => 'fgt_homepage',
                    //'routeParameters' => array('id' => $blog->getId()),
                    'attributes' => [
                        'id' => 'menu_user_admin_home'
                    ]
                ],
                $options
            )
        );
        return $menu;
    }

    public function userMenu(FactoryInterface $factory, array $options)
    {
        $menu     = $factory->createItem(
            'root',
            array(
                'childrenAttributes' => array(
                    'class' => 'nav navbar-nav navbar-right'
                )
            )
        );
        $menuUser = $menu->addChild(
            'User',
            [
                'uri' => '#',
                //                'route' => 'fos_user_profile_edit',
                //'currentAsLink' => true
                //'class' => 'dropdown',
                //'branch_class' => 'dropdown',
                //                'attributes' =>
                'childrenAttributes' => array(
                    'role' => 'menu',
                    'class' => 'dropdown-menu'
                ),
                'linkAttributes' => [
                    'aria-expanded' => 'false',
                    'role' => 'button',
                    'data-toggle' => 'dropdown',
                    'class' => 'dropdown-toggle'
                ]
            ]
        );

        if ($this->getAuth()->isLoggedIn()) {
            $this->addLoginMenu($menuUser, $factory, $options);
        } else {
            $this->addLoggedOutMenu($menuUser, $factory, $options);
        }

        return $menu;
    }

    protected function addLoginMenu(ItemInterface $menu, FactoryInterface $factory, $options)
    {
        $menu->addChild(
            'Edit profile',
            array_merge(
                [
                    'route' => 'fos_user_profile_edit',
                    //'routeParameters' => array('id' => $blog->getId()),
                    'attributes' => [
                        'id' => 'user_edit_profile'
                    ]
                ],
                $options
            )
        );
        if ($this->getAuth()->isAdmin()) {
            $menu->addChild(
                '',
                [
                    'attributes' => [
                        'class' => 'divider'
                    ],

                ]
            );
            $menu->addChild(
                'Administration',
                array_merge(
                    [
                        'route' => 'fgt_admin_homepage',
                        //'routeParameters' => array('id' => $blog->getId()),
                        ['attributes' => ['id' => 'menu_user_admin_home']]
                    ],
                    $options
                )
            );
        }
        $menu->addChild(
            '',
            [
                'attributes' => [
                    'class' => 'divider'
                ],
            ]
        );
        $menu->addChild(
            'Logout',
            array_merge(
                [
                    'route' => '_fgt_logout',
                    //'routeParameters' => array('id' => $blog->getId()),
                    ['attributes' => ['id' => 'user_edit_profile']]
                ],
                $options
            )
        );

        return $menu;
    }

    protected function addLoggedOutMenu(ItemInterface $menu, FactoryInterface $factory, $options)
    {
        $menu->addChild(
            '',
            [
                'attributes' => [
                    'class' => 'divider'
                ]
            ]
        );
        $menu->addChild(
            'Register',
            array_merge(
                [
                    'route' => '_fgt_login',
                    //'routeParameters' => array('id' => $blog->getId()),
                    ['attributes' => ['id' => 'menu_user_admin_home']]
                ],
                $options
            )
        );
        return $menu;
    }

    protected function addCssClass(ItemInterface $menu, $class)
    {
        $classes   = preg_split('/\s+/', $menu->getAttribute('class'));
        $classes[] = $class;
        $menu->setAttribute('class', implode(' ', $classes));
    }

}
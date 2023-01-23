<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}
/**
 *
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * SuiteCRM is an extension to SugarCRM Community Edition developed by SalesAgility Ltd.
 * Copyright (C) 2011 - 2018 SalesAgility Ltd.
 *
 * MintHCM is a Human Capital Management software based on SuiteCRM developed by MintHCM, 
 * Copyright (C) 2018-2019 MintHCM
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by SugarCRM" 
 * logo and "Supercharged by SuiteCRM" logo and "Reinvented by MintHCM" logo. 
 * If the display of the logos is not reasonably feasible for technical reasons, the 
 * Appropriate Legal Notices must display the words "Powered by SugarCRM" and 
 * "Supercharged by SuiteCRM" and "Reinvented by MintHCM".
 */

$layout_defs["AM_ProjectTemplates"] = array(
    'subpanel_setup' => array(
        'am_tasktemplates_am_projecttemplates' =>
            array(
                'order' => 100,
                'module' => 'AM_TaskTemplates',
                'subpanel_name' => 'default',
                'sort_order' => 'asc',
                'sort_by' => 'id',
                'title_key' => 'LBL_AM_TASKTEMPLATES_AM_PROJECTTEMPLATES_FROM_AM_TASKTEMPLATES_TITLE',
                'get_subpanel_data' => 'am_tasktemplates_am_projecttemplates',
                'top_buttons' =>
                    array(
                        0 =>
                            array(
                                'widget_class' => 'SubPanelTopButtonQuickCreate',
                            ),
                        1 =>
                            array(
                                'widget_class' => 'SubPanelTopSelectButton',
                                'mode' => 'MultiSelect',
                            ),
                    ),
            ),
        /*
		'am_projecttemplates_contacts_1' =>
            array(
                'order' => 101,
                'module' => 'Contacts',
                'subpanel_name' => 'default',
                'sort_order' => 'asc',
                'sort_by' => 'id',
                'title_key' => 'LBL_AM_PROJECTTEMPLATES_RESOURCES_TITLE',
                'get_subpanel_data' => 'am_projecttemplates_contacts_1',
                'top_buttons' =>
                    array(
                        0 =>
                            array(
                                'widget_class' => 'SubPanelTopButtonQuickCreate',
                            ),
                        1 =>
                            array(
                                'widget_class' => 'SubPanelTopSelectButton',
                                'mode' => 'MultiSelect',
                            ),
                    ),
            ),
		*/
        'am_projecttemplates_resources' => array(
            'order' => 101,
            'module' => 'AM_ProjectTemplates',
            'subpanel_name' => 'AM_ProjectTemplates',
            'type' => 'collection',
            'sort_order' => 'asc',
            'sort_by' => 'id',
            'title_key' => 'LBL_AM_PROJECTTEMPLATES_RESOURCES_TITLE',
            'top_buttons' =>
                array(
                    0 =>
                        array(
                            'widget_class' => 'SubPanelTopSelectUsersButton', 'mode' => 'MultiSelect',
                        ),
                    1 =>
                        array(
                            'widget_class' => 'SubPanelTopSelectContactsButton', 'mode' => 'MultiSelect',
                        ),
                ),
            'collection_list' => array(
                'users' => array(
                    'module' => 'Users',
                    'subpanel_name' => 'ForProject',
                    'get_subpanel_data' => 'am_projecttemplates_users_1',
                ),
				'contacts' => array(
                    'module' => 'Contacts',
                    'subpanel_name' => 'ForProject',
                    'get_subpanel_data' => 'am_projecttemplates_contacts_1',
                ),

            )
        ),
		



    ),


);
<?php

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

class DashboardBackups extends Basic
{

    public $new_schema = true;
    public $module_dir = 'DashboardBackups';
    public $object_name = 'DashboardBackups';
    public $table_name = 'dashboardbackups';
    public $importable = true;
    public $id;
    public $name;
    public $date_entered;
    public $date_modified;
    public $modified_user_id;
    public $modified_by_name;
    public $created_by;
    public $created_by_name;
    public $description;
    public $deleted;
    public $created_by_link;
    public $modified_user_link;
    public $assigned_user_id;
    public $assigned_user_name;
    public $assigned_user_link;
    public $encoded_pages;
    public $encoded_dashlets;
    public $dashboardbackups_dashboardmanager;
    public $dashboardmanager_name;
    public $dashboardmanager_id;

    public function bean_implements($interface)
    {
        if ("ACL" === $interface) {
            return true;
        } else {
            return false;
        }
    }
    public function ACLAccess($view, $is_owner = 'not_set', $in_group = 'not_set')
    {
        global $current_user;
        if ($current_user->isAdmin()) {
            return true;
        }
        return false;
    }

    public function retrieve($id = -1, $encode = true, $deleted = true)
    {
        $parent = parent::retrieve($id, $encode, $deleted);
        $this->unserializeData();
        return $parent;
    }

    public function save($check_notify = false)
    {
        if (!empty($_REQUEST['customAction']) && $_REQUEST['customAction'] === 'restoreBackup') {
            $this->_restoreBackup();
        }

        $this->serializeData();
        return parent::save($check_notify);
    }

    public function serializeData()
    {
        $this->encoded_pages = base64_encode(serialize($this->pages));
        $this->encoded_dashlets = base64_encode(serialize($this->dashlets));
    }

    public function unserializeData()
    {
        $this->pages = unserialize(base64_decode($this->encoded_pages));
        $this->dashlets = unserialize(base64_decode($this->encoded_dashlets));

        $this->pages = empty($this->pages) ? array() : $this->pages;
        $this->dashlets = empty($this->dashlets) ? array() : $this->dashlets;
    }

    protected function _restoreBackup()
    {
        if (!empty($this->assigned_user_id)) {
            $user = BeanFactory::getBean('Users', $this->assigned_user_id);
            if (isset($user->id) && $user->id === $this->assigned_user_id) {
                $user->setPreference('pages', $this->pages, 0, 'Home');
                $user->setPreference('dashlets', $this->dashlets, 0, 'Home');
                $user->savePreferencesToDB();
            }
        }
    }

}

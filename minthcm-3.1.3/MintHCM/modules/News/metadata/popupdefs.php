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

$popupMeta = array(
    'moduleMain' => 'News',
    'varName' => 'News',
    'orderBy' => 'news.name',
    'whereClauses' => array(
        'name' => 'news.name',
        'news_type' => 'news.news_type',
        'assigned_user_name' => 'news.assigned_user_name',
        'news_status' => 'news.news_status',
        'publication_date' => 'news.news_stapublication_datetus',
    ),
    'searchInputs' => array(
        'name',
        'news_type',
        'assigned_user_name',
        'news_status',
        'publication_date',
    ),
    'searchdefs' => array(
        'name' => array(
            'name' => 'name',
            'width' => '10%',
        ),
        'news_type' => array(
            'type' => 'enum',
            'studio' => 'visible',
            'label' => 'LBL_NEWS_TYPE',
            'width' => '10%',
            'name' => 'news_type',
        ),
        'assigned_user_name' => array(
            'link' => true,
            'type' => 'relate',
            'label' => 'LBL_ASSIGNED_TO_NAME',
            'id' => 'ASSIGNED_USER_ID',
            'width' => '10%',
            'name' => 'assigned_user_name',
        ),
        'news_status' => array(
            'type' => 'enum',
            'studio' => 'visible',
            'label' => 'LBL_NEWS_STATUS',
            'width' => '10%',
            'name' => 'news_status',
        ),
        'publication_date' => array(
            'type' => 'date',
            'default' => true,
            'vname' => 'LBL_PUBLICATION_DATE',
            'width' => '10%',
            'name' => 'publication_date',
        ),
    ),
);

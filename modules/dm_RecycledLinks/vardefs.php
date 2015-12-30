<?php


$dictionary['dm_RecycledLinks'] = array(
    'table' => 'dm_recycledlinks',
    'audited' => true,
    'activity_enabled' => false,
    'duplicate_merge' => true,
    'fields' => array (
        'id' => array(
            'name' => 'id',
            'vname' => 'LBL_ID',
            'type' => 'id',
            'required' => true,
            'reportable' => true,
            'duplicate_on_record_copy' => 'no',
            'comment' => 'Unique identifier',
            'mandatory_fetch' => true,
        ),
        'name' => array(
            'name' => 'name',
            'vname' => 'LBL_NAME',
            'type' => 'name',
            'link' => true, // bug 39288
            'dbType' => 'varchar',
            'len' => 255,
            'unified_search' => true,
            'full_text_search' => array('enabled' => true, 'boost' => 3),
            'required' => true,
            'importable' => 'required',
            'duplicate_merge' => 'enabled',
            //'duplicate_merge_dom_value' => '3',
            'merge_filter' => 'selected',
            'duplicate_on_record_copy' => 'always',
            'readonly' => true,
        ),
        'date_entered' => array(
            'name' => 'date_entered',
            'vname' => 'LBL_DATE_ENTERED',
            'type' => 'datetime',
            'group' => 'created_by_name',
            'comment' => 'Date record created',
            'enable_range_search' => true,
            'options' => 'date_range_search_dom',
            'studio' => array(
                    'portaleditview' => false, // Bug58408 - hide from Portal edit layout
            ),
            'duplicate_on_record_copy' => 'no',
            'readonly' => true,
            'massupdate' => false,
        ),
        'date_modified' => array(
            'name' => 'date_modified',
            'vname' => 'LBL_DATE_MODIFIED',
            'type' => 'datetime',
            'group' => 'modified_by_name',
            'comment' => 'Date record last modified',
            'enable_range_search' => true,
            'studio' => array(
                    'portaleditview' => false, // Bug58408 - hide from Portal edit layout
            ),
            'options' => 'date_range_search_dom',
            'duplicate_on_record_copy' => 'no',
            'readonly' => true,
            'massupdate' => false,
        ),
        'modified_user_id' => array(
            'name' => 'modified_user_id',
            'rname' => 'user_name',
            'id_name' => 'modified_user_id',
            'vname' => 'LBL_MODIFIED',
            'type' => 'assigned_user_name',
            'table' => 'users',
            'isnull' => false,
            'group' => 'modified_by_name',
            'dbType' => 'id',
            'reportable' => true,
            'comment' => 'User who last modified record',
            'massupdate' => false,
            'duplicate_on_record_copy' => 'no',
            'readonly' => true,
        ),
        'modified_by_name' => array(
            'name' => 'modified_by_name',
            'vname' => 'LBL_MODIFIED',
            'type' => 'relate',
            'reportable' => false,
            'source' => 'non-db',
            'rname' => 'full_name',
            'table' => 'users',
            'id_name' => 'modified_user_id',
            'module' => 'Users',
            'link' => 'modified_user_link',
            'duplicate_merge' => 'disabled',
            'massupdate' => false,
            'duplicate_on_record_copy' => 'no',
            'readonly' => true,
            'sort_on' => array('last_name'),
        ),
        'created_by' => array(
            'name' => 'created_by',
            'rname' => 'user_name',
            'id_name' => 'modified_user_id',
            'vname' => 'LBL_CREATED',
            'type' => 'assigned_user_name',
            'table' => 'users',
            'isnull' => false,
            'dbType' => 'id',
            'group' => 'created_by_name',
            'comment' => 'User who created record',
            'massupdate' => false,
            'duplicate_on_record_copy' => 'no',
            'readonly' => true,
        ),
        'created_by_name' => array(
            'name' => 'created_by_name',
            'vname' => 'LBL_CREATED',
            'type' => 'relate',
            'reportable' => false,
            'link' => 'created_by_link',
            'rname' => 'full_name',
            'source' => 'non-db',
            'table' => 'users',
            'id_name' => 'created_by',
            'module' => 'Users',
            'duplicate_merge' => 'disabled',
            'importable' => false,
            'massupdate' => false,
            'duplicate_on_record_copy' => 'no',
            'readonly' => true,
            'sort_on' => array('last_name'),
        ),
        'deleted' => array(
            'name' => 'deleted',
            'vname' => 'LBL_DELETED',
            'type' => 'bool',
            'default' => '0',
            'reportable' => false,
            'duplicate_on_record_copy' => 'no',
            'comment' => 'Record deletion indicator'
        ),
        'created_by_link' => array(
            'name' => 'created_by_link',
            'type' => 'link',
            'relationship' => strtolower($module) . '_created_by',
            'vname' => 'LBL_CREATED_USER',
            'link_type' => 'one',
            'module' => 'Users',
            'bean_name' => 'User',
            'source' => 'non-db',
        ),
        'modified_user_link' => array(
            'name' => 'modified_user_link',
            'type' => 'link',
            'relationship' => strtolower($module) . '_modified_user',
            'vname' => 'LBL_MODIFIED_USER',
            'link_type' => 'one',
            'module' => 'Users',
            'bean_name' => 'User',
            'source' => 'non-db',
        ),
        'bean_module' => array (
			'required' => true,
            'name' => 'bean_module',
            'vname' => 'LBL_BEAN_MODULE',
            'type' => 'varchar',
            'dbType' => 'varchar',
            'len' => 255,
            'unified_search' => false,
            'required' => true,
            'importable' => 'required',
            'duplicate_merge' => 'enabled',
            'merge_filter' => 'selected',
            'duplicate_on_record_copy' => 'always',
            'readonly' => true,
        ),
        'bean_id' => array (
            'required' => true,
            'name' => 'bean_id',
            'vname' => 'LBL_BEAN_ID',
            'type' => 'id',
            'massupdate' => false,
            'no_default' => false,
            'comments' => '',
            'help' => '',
            'importable' => 'false',
            'duplicate_merge' => 'enabled',
            'duplicate_merge_dom_value' => '1',
            'audited' => false,
            'reportable' => true,
            'unified_search' => false,
            'merge_filter' => 'disabled',
            'calculated' => false,
            'len' => '36',
            'size' => '20',
            'default' => '',
			'studio' => true,
            'readonly' => true
        ),
        'relationship' => array (
			'required' => true,
            'name' => 'relationship',
            'vname' => 'LBL_RELATIONSHIP',
            'type' => 'varchar',
            'dbType' => 'varchar',
            'len' => 255,
            'unified_search' => false,
            'required' => true,
            'importable' => 'required',
            'duplicate_merge' => 'enabled',
            'merge_filter' => 'selected',
            'duplicate_on_record_copy' => 'always',
            'readonly' => true,
        ),
        'related_module' => array (
            'name' => 'related_module',
            'vname' => 'LBL_RELATED_MODULE',
            'type' => 'varchar',
            'dbType' => 'varchar',
            'len' => 255,
            'unified_search' => false,
            'required' => true,
            'importable' => 'required',
            'duplicate_merge' => 'enabled',
            'merge_filter' => 'selected',
            'duplicate_on_record_copy' => 'always',
            'readonly' => true,
        ),
        'related_id' => array (
            'required' => true,
            'name' => 'related_id',
            'vname' => 'LBL_BEAN_ID',
            'type' => 'id',
            'massupdate' => false,
            'no_default' => false,
            'comments' => '',
            'help' => '',
            'importable' => 'false',
            'duplicate_merge' => 'enabled',
            'duplicate_merge_dom_value' => '1',
            'audited' => false,
            'reportable' => true,
            'unified_search' => false,
            'merge_filter' => 'disabled',
            'calculated' => false,
            'len' => '36',
            'size' => '20',
            'default' => '',
            'studio' => true,
            'readonly' => true
        ),
        'restored' => array (
            'required' => true,
            'name' => 'restored',
            'vname' => 'LBL_RESTORED',
            'type' => 'checkbox',
            'dbType' => 'tinyint',
            'len' => 1,
            'massupdate' => false,
            'no_default' => false,
            'comments' => '',
            'help' => '',
            'importable' => 'false',
            'duplicate_merge' => 'enabled',
            'duplicate_merge_dom_value' => '1',
            'audited' => false,
            'reportable' => true,
            'unified_search' => false,
            'merge_filter' => 'disabled',
            'calculated' => false,
            'default' => 0,
            'studio' => true,
            'readonly' => true
        ),
        'date_restored' => array (
            'name' => 'date_restored',
            'vname' => 'LBL_DATE_RESTORED',
            'type' => 'datetime',
            'group' => 'modified_by_name',
            'comment' => 'Date record was restored',
            'enable_range_search' => true,
            'studio' => true,
            'options' => 'date_range_search_dom',
            'duplicate_on_record_copy' => 'no',
            'readonly' => true,
            'massupdate' => false,
        ),
		'dm_recycler_dm_recycledlinks' => array(
			'name' => 'dm_recycler_dm_recycledlinks',
			'type' => 'link',
			'relationship' => 'dm_recycler_dm_recycledlinks',
			'source' => 'non-db',
			'module' => 'dm_Recycler',
			'bean_name' => 'dm_Recycler',
			'side' => 'right',
			'vname' => 'LBL_DM_RECYCLER_DM_RECYCLEDLINKS_FROM_DM_RECYCLEDLINKS_TITLE',
			'id_name' => 'dm_recycledlinks_id',
			'link-type' => 'one',
		),
		'dm_recycler_dm_recycledlinks_name' => array(
			'name' => 'dm_recycler_dm_recycledlinks_name',
			'type' => 'relate',
			'source' => 'non-db',
			'vname' => 'LBL_DM_RECYCLER_DM_RECYCLEDLINKS_FROM_DM_RECYCLER_TITLE',
			'save' => true,
			'id_name' => 'dm_recycler_id',
			'link' => 'dm_recycler_dm_recycledlinks',
			'table' => 'dm_recycler',
			'module' => 'dm_Recycler',
		),
		'dm_recycler_id' => array(
			'name' => 'dm_recycler_id',
			'type' => 'id',
			'source' => 'non-db',
			'vname' => 'LBL_DM_RECYCLER_DM_RECYCLEDLINKS_1_FROM_DM_RECYCLEDLINKS_TITLE_ID',
			'id_name' => 'dm_recycler_id',
			'link' => 'dm_recycler_dm_recycledlinks',
			'table' => 'dm_recycler',
			'module' => 'dm_Recycler',
			'reportable' => false,
			'side' => 'right',
			'rname' => 'id',
			'massupdate' => false,
			'duplicate_merge' => 'disabled',
			'hideacl' => true,
		)
    ),
    'indices' => array(
        'id' => array(
            'name' => 'idx_' . preg_replace('/[^a-z_\-]/i', '', strtolower($module)) . '_pk',
            'type' => 'primary',
            'fields' => array('id')
        ),
        'date_modified' => array(
            'name' => 'idx_' . strtolower($module) . '_date_modfied',
            'type' => 'index',
            'fields' => array('date_modified')
        ),
        'deleted' => array(
            'name' => 'idx_' . strtolower($module) . '_id_del',
            'type' => 'index',
            'fields' => array('id', 'deleted')
        ),
        'date_entered' => array(
            'name' => 'idx_' . strtolower($module) . '_date_entered',
            'type' => 'index',
            'fields' => array('date_entered')
        ),
    ),
    'relationships' => array (
        strtolower($module) . '_modified_user' => array(
            'lhs_module' => 'Users',
            'lhs_table' => 'users',
            'lhs_key' => 'id',
            'rhs_module' => $module,
            'rhs_table' => strtolower($module),
            'rhs_key' => 'modified_user_id',
            'relationship_type' => 'one-to-many'
        ),
        strtolower($module) . '_created_by' => array(
            'lhs_module' => 'Users',
            'lhs_table' => 'users',
            'lhs_key' => 'id',
            'rhs_module' => $module,
            'rhs_table' => strtolower($module),
            'rhs_key' => 'created_by',
            'relationship_type' => 'one-to-many'
        ),
    ),
    'optimistic_locking' => true,
    'unified_search' => false,
    'duplicate_check' => array(
        'enabled' => false,
    )
);
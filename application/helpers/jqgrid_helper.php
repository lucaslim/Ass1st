<?php
function buildGrid($aData) {
	$CI = &get_instance();
	$CI -> load -> library('jqgrid_lib');
	$jqGrid = $CI -> jqgrid_lib;
	if (isset($aData['set_columns'])) {
		$aProperty = array();
		foreach ($aData['set_columns'] as $sProperty) {
			$lProperty = array('name' => $sProperty['name']);

			if (isset($sProperty['index']) && !empty($sProperty['index']))
				$lProperty["index"] = $sProperty['index'];

			$lProperty["width"] = $sProperty['width'];
			$lProperty["editable"] = array('readonly' => 'true', 'size' => $sProperty['size']);

			if (isset($sProperty['formatter']) && !empty($sProperty['formatter'])) {
				$lProperty["formatter"] = $sProperty['formatter'];

				//Check formatoptions has variables
				if (isset($sProperty['formatoptions']) && !empty($sProperty['formatoptions']) && is_array($sProperty['formatoptions'])) {
					$lProperty["formatoptions"] = $sProperty["formatoptions"];
				}
			}

			$aProperty[] = array($sProperty['label'] => $lProperty);
		}
		$jqGrid -> setColumns($aProperty);
	}

	var_dump($aData['custom']);

	if (isset($aData['custom'])) {
		if (isset($aData['custom']['button'])) {
			$jqGrid -> setCustomButtons(array($aData['custom']['button']));
		}
		if (isset($aData['custom']['function'])) {
			$jqGrid -> setCustomFunctions(array($aData['custom']['function']));
		}
	}

	if (isset($aData['div_name'])) {
		$jqGrid -> setDivName($aData['div_name']);
	} else {
		$jqGrid -> setDivName('grid');
	}

	if (isset($aData['source']))
		$jqGrid -> setSourceUrl(base_url() . 'index.php/' . $aData['source']);

	if (isset($aData['sort_name']))
		$jqGrid -> setSortName($aData['sort_name']);

	if (isset($aData['add_url']))
		$jqGrid -> setAddUrl(base_url() . $aData['add_url']);

	if (isset($aData['delete_url']))
		$jqGrid -> setDeleteUrl(base_url() . $aData['delete_url']);

	if (isset($aData['edit_url']))
		$jqGrid -> setEditUrl(base_url() . $aData['edit_url']);

	if (isset($aData['caption']))
		$jqGrid -> setCaption($aData['caption']);

	if (isset($aData['primary_key']))
		$jqGrid -> setPrimaryKey($aData['primary_key']);

	if (isset($aData['grid_height']))
		$jqGrid -> setGridHeight($aData['grid_height']);

	if (isset($aData['subgrid']))
		$jqGrid -> setSubGrid($aData['subgrid']);

	if (isset($aData['subgrid_url']))
		$jqGrid -> setSubGridUrl($aData['subgrid_url']);

	if (isset($aData['subgrid_columnnames']))
		$jqGrid -> setSubGridColumnNames($aData['subgrid_columnnames']);

	if (isset($aData['subgrid_columnwidth']))
		$jqGrid -> setSubGridColumnWidth($aData['subgrid_columnwidth']);

	if (isset($aData['row_num']))
		$jqGrid -> setRowNum($aData['row_num']);

	return $jqGrid -> buildGrid();
}

function buildSubGridData($aData) {
	$CI = &get_instance();
	//get id
	$id = $CI -> input -> get('id');

	if (isset($aData['method']) && isset($aData['model'])) {
		$CI -> load -> model($aData['model']);

		$aDataList = $CI -> $aData['model'] -> $aData['method']($id);

		if (!is_null($aDataList) && isset($aData['columns']) && count($aDataList) > 0) {
			$columnData = array();
			//$rs -> rows[0]['id'] = $id;
			foreach ($aData['columns'] as $col) {
				array_push($columnData, $aDataList[0] -> $col);
			}
			$rs -> rows[0]['cell'] = $columnData;

			echo json_encode($rs);
		}
	}
}

function buildGridData($aData) {

	$CI = &get_instance();
	$isSearch = $CI -> input -> get('_search');
	$searchField = $CI -> input -> get('searchField');
	$searchString = $CI -> input -> get('searchString');
	$searchOperator = $CI -> input -> get('searchOper');
	$page = $CI -> input -> get('page');
	// search filters
	$filters = $CI -> input -> get('filters');
	// get the requested page
	$limit = $CI -> input -> get('rows');
	// get how many rows we want to have into the grid
	$sidx = $CI -> input -> get('sidx');
	// get index row - i.e. user click to sort
	$sord = $CI -> input -> get('sord');
	// get the direction

	if ($isSearch)
		$whereParam = buildWhereClauseForSearch($searchField, $searchString, $searchOperator);
	else
		$whereParam = NULL;

	$paramArr['whereParam'] = $whereParam;
	$paramArr['reload'] = TRUE;

	/*you can add aditional params in the where clause here:
	 $paramArr['outletid']		= $CI->session->userdata(SELECTED_OUTLET);
	 $paramArr['invtypeId']	= $CI->session->userdata(SELECTED_INVENTORY_TYPE);
	 $paramArr['postingYear'] 	= getPostingYear();
	 */
	if (isset($aData['method']) && isset($aData['model'])) {

		$CI -> load -> model($aData['model']);
		$aDataList = $CI -> $aData['model'] -> $aData['method']($paramArr);

		$count = count($aDataList);
		if ($count > 0)
			$total_pages = ceil($count / $limit);
		else
			$total_pages = 0;

		if ($page > $total_pages)
			$page = $total_pages;
		$start = $limit * $page - $limit;

		$paramArr['start'] = $start;
		$paramArr['limit'] = $limit;
		$paramArr['sortField'] = $sidx;
		$paramArr['sortOrder'] = $sord;
		$paramArr['whereParam'] = $whereParam;
		$paramArr['filters'] = $filters;
		$paramArr['isSearch'] = $isSearch;
		$paramArr['reload'] = TRUE;
		$aDataList = $CI -> $aData['model'] -> $aData['method']($paramArr);

		$count = count($aDataList);
		if ($count > 0)
			$total_pages = ceil($count / $limit);
		else
			$total_pages = 0;

		if ($page > $total_pages)
			$page = $total_pages;

		$i = 0;
		if (isset($aData['columns']) && $aDataList != null) {
			foreach ($aDataList as $row) {
				$columnData = array();
				foreach ($aData['columns'] as $sData) {
					array_push($columnData, $row -> $sData);
				}
				$rs -> rows[$i]['id'] = $row -> $aData['pkid'];
				$rs -> rows[$i]['cell'] = $columnData;
				$i++;
			}
			$rs -> cols = $columnData;
		}
		$rs -> page = $page;
		$rs -> total = $total_pages;
		$rs -> records = $count;
		echo json_encode($rs);
	}
}

function buildWhereClauseForSearch($searchField, $searchString, $searchOperator) {
	$searchString = mysql_real_escape_string($searchString);
	$searchField = mysql_real_escape_string($searchField);
	$operator['eq'] = "$searchField='$searchString'";
	//equal to
	$operator['ne'] = "$searchField<>'$searchString'";
	//not equal to
	$operator['lt'] = "$searchField < $searchString";
	//less than
	$operator['le'] = "$searchField <= $searchString ";
	//less than or equal to
	$operator['gt'] = "$searchField > $searchString";
	//less than
	$operator['ge'] = "$searchField >= $searchString ";
	//less than or equal to
	$operator['bw'] = "$searchField like '$searchString%'";
	//begins with
	$operator['bn'] = "$searchField not like '$searchString%'";
	//not begins with
	$operator['in'] = "$searchField in ($searchString)";
	//in
	$operator['ni'] = "$searchField not in ($searchString)";
	//not in
	$operator['ew'] = "$searchField like '%$searchString'";
	//ends with
	$operator['en'] = "$searchField not like '%$searchString%'";
	//not ends with
	$operator['cn'] = "$searchField like '%$searchString%'";
	//in
	$operator['nc'] = "$searchField not like '%$searchString%'";
	//not in
	$operator['nu'] = "$searchField is null";
	//is null
	$operator['nn'] = "$searchField is not null";
	//is not null

	if (isset($operator[$searchOperator])) {
		return $operator[$searchOperator];
	} else {
		return null;
	}
}

/**
 * Filter JQGrid
 *
 * This will return results based on the parameters given
 *
 */

function filter_grid($db, $params, $table_name, $default_sort_field = NULL) {
	//Set start
	$start = isset($params['start']) ? $params['start'] : NULL;
	//Set limit
	$limit = isset($params['limit']) ? $params['start'] : NULL;
	//Set sort field
	$sortField = isset($params['sortField']) && $params['sortField'] != '' ? $params['sortField'] : $default_sort_field;
	//Set sort order
	$sortOrder = isset($params['sortOrder']) ? $params['sortOrder'] : 'asc';
	//Set where
	$whereParam = isset($params['whereParam']) ? $params['whereParam'] : NULL;
	//Set filters
	$filters = isset($params['filters']) ? json_decode($params['filters']) : NULL;
	//Set search
	$isSearch = isset($params['isSearch']) ? json_decode($params['isSearch']) : NULL;

	//Set limit if both start and limit isn't null
	if (!empty($start) && !empty($limit))
		$db -> limit($limit, $start);

	$db -> where('(1=1)');

	//Set where parameter
	if (!empty($whereParam))
		$db -> where('(' . $whereParam . ')');

	//Set search
	if ($isSearch && $filters != null) {
		//get rules
		foreach ($filters -> rules as $rule) {
			$field = $rule -> field;
			$value = mysql_real_escape_string($rule -> data);

			//add like clause
			$db -> like($field, $value, 'after');
		}
	}
	if (isset($sortField))
		$db -> order_by($sortField, $sortOrder);

	//Execute query
	$query = $db -> get($table_name);

	if ($query -> num_rows() > 0)
		return $query -> result();

	return null;
}

// --------------------------------------------------------------------

function custom_hyper_link($function_name, $params) {
	
	$str = 'function ' . $function_name . ' (cellvalue, options, rowObject) {';
	
	//add all custom variables into the javascript function
	foreach ($params as $key => $value) {
		$str .= 'var ' . $key . ' = ' . convert_javascript_value_type($value) . ';'; 
	}
	
	$str .= 'alert(options.rowId);';
	
	$str .= '}';

	return $str;
}

/**
 * Convert to proper javascript value type
 *
 * This will make sure that all strings from the associative array has a ''(quotes) 
 * and bool/integer is without quotes for the javascript file
 *
 */

function convert_javascript_value_type($value) {
	if(is_integer($value) || is_bool($value))
		return $value;
	else
		return '\'' . $value . '\'';
}

// --------------------------------------------------------------------

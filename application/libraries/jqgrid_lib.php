<?php
/*@Developer - Mark Lenard M. Mirandilla
 *@Version 1.0
 *@Description jqgrid library for Codeigniter
 */
class jqgrid_lib {
	private $divName;
	private $sourceUrl;
	private $colNames;
	private $colModels;
	private $rowNum;
	private $sortName;
	private $caption;
	private $gridHeight;
	private $addUrl;
	private $editUrl;
	private $deleteUrl;
	private $customButtons;
	private $customFunctions;
	private $subgrid;
	private $subGridUrl;
	private $subGridColumnNames;
	private $subGridColumnWidth;

	public function setColumns($columns) {
		$tmpColNames = array();
		$tmpColModels = '';

		foreach ($columns as $columnNames => $columnOptions) {
			foreach ($columnOptions as $columnName => $columnOption) {
				$tmpColNames[] = $columnName;
				$tmpColModels .= json_encode($columnOption) . ",";
			}
		}
		$this -> colNames = json_encode($tmpColNames);
		$this -> colModels = '[' . $tmpColModels . ']';
	}

	public function setDivName($divName) {
		$this -> divName = $divName;
	}

	public function setSourceUrl($url) {
		$this -> sourceUrl = $url;
	}

	public function setSortName($sortName) {
		$this -> sortName = $sortName;
	}

	public function setCaption($caption) {
		$this -> caption = $caption;
	}

	public function setGridHeight($height) {
		$this -> gridHeight = $height;
	}

	public function setPrimaryKey($primaryKey) {
		$this -> primaryKey = $primaryKey;
	}

	public function setAddUrl($url) {
		$this -> addUrl = $url;
	}

	public function setEditUrl($url) {
		$this -> editUrl = $url;
	}

	public function setDeleteUrl($url) {
		$this -> deleteUrl = $url;
	}

	public function setCustomButtons($buttons) {
		$this -> customButtons = $buttons;
	}

	public function setCustomFunctions($customFunctions) {
		$this -> customFunctions = $customFunctions;
	}

	public function setSubGrid($isSubGrid = FALSE) {
		$this -> subGrid = $isSubGrid;
	}

	public function setSubGridUrl($subGridUrl) {
		$this -> subGridUrl = $subGridUrl;
	}

	public function setSubGridColumnNames($columnNames) {
		$this -> subGridColumnNames = $columnNames;
	}

	public function setSubGridColumnWidth($columnWidth) {
		$this -> subGridColumnWidth = $columnWidth;
	}
	//NEW
	public function setRowNum($rowNum){
		$this -> rowNum = $rowNum;
	}

	public function buildGrid() {
		$buildDivName = $this -> divName;
		$buildSourceUrl = $this -> sourceUrl;
		$buildColNames = $this -> colNames;
		$buildColModels = $this -> colModels;
		$buildRowNum = $this -> rowNum;
		$buildSortName = $this -> sortName;
		$buildEditUrl = $this -> editUrl;
		$buildAddUrl = $this -> addUrl;
		$buildDeleteUrl = $this -> deleteUrl;
		$buildCaption = $this -> caption;
		$buildGridHeight = $this -> gridHeight;
		$buildPrimaryKey = $this -> primaryKey;
		$buildCustomButtons = $this -> customButtons;
		$buildSubGrid = $this -> subgrid;
		$buildSubGridUrl = $this -> subGridUrl;
		$buildSubGridColumnNames = $this -> subGridColumnNames;
		$buildSubGridColumnWidth = $this -> subGridColumnWidth;

		$grid = "<script type='text/javascript'>";
		$grid .= "$('#$buildDivName').jqGrid({
				url:'$buildSourceUrl',
				datatype: 'json',
				colNames:$buildColNames,
				colModel:$buildColModels,
				rowNum:$buildRowNum,
				rowList:[10,20,30],
				pager: '#pager',
				toppager:true,
				cloneToTop:false,
				sortname: '$buildSortName',
				viewrecords: true,
				sortorder: 'asc',
				caption:'$buildCaption'";
		$grid .= "});";

		//NavBar
		$grid .= "$('#$buildDivName').jqGrid('navGrid','#pager',
					{search:true,edit:false,add:false,del:false,cloneToTop:true}, //options
					{} // search options
					)";
		if (!empty($buildCustomButtons)) {
			foreach ($buildCustomButtons as $customButton) {
				$customButton = ".navButtonAdd('#grid_toppager_left'," . $customButton . ")";
				$grid .= $customButton;
			}
		}

		$grid .= ".navButtonAdd('#grid_toppager_left',
					{ caption:'', buttonicon:'ui-icon-trash', onClickButton:jqGridDelete ,title: 'Delete selected row', position: 'first', cursor: 'pointer'})
					.navButtonAdd('#grid_toppager_left',
					{ caption:'', buttonicon:'ui-icon-pencil', onClickButton:jqGridEdit,title: 'Edit selected row', position: 'first', cursor: 'pointer'})
					.navButtonAdd('#grid_toppager_left',
					{ caption:'', buttonicon:'ui-icon-plus', onClickButton:jqGridAdd,title: 'Add new record', position: 'first', cursor: 'pointer'});";

		$grid .= "
		function jqGridAdd() {
			location.href='$buildAddUrl?oper=add';
		}

		function jqGridEdit() {
			var grid = $('#$buildDivName');
			var sel_id = grid.jqGrid('getGridParam', 'selrow');
			var myCellData = grid.jqGrid('getCell', sel_id, '$buildPrimaryKey');
			if(!myCellData) {
				alert('No selected row');
			} else {
				//alert(myCellData);

            location.href='$buildEditUrl' + myCellData;
			}
		}

		function jqGridDelete() {
			var grid = $('#$buildDivName');
			var sel_id = grid.jqGrid('getGridParam', 'selrow');
			var recid = grid.jqGrid('getCell', sel_id, '$buildPrimaryKey');
			if(!recid) {
				alert('No selected row');
			} else {
				var ans = confirm('Delete selected record?');
				if(ans) {
					var data = {};
					data.recid = recid;
					$.post('$buildDeleteUrl',data);
					$('#$buildDivName').trigger('reloadGrid');
				}
			}
		}

		";

		if (!empty($this -> customFunctions)) {
			foreach ($this->customFunctions as $customFunction) {
				$grid .= $customFunction;
			}
		}

		//Set Grid Height
		$grid .= "$('#$buildDivName').setGridHeight($buildGridHeight,true);";
		$grid .= "$('.ui-jqgrid-titlebar-close','#gview_$buildDivName').remove();";
		$grid .= "</script>";
		return $grid;
	}

}

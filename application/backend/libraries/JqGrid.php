<?php

class JqGrid {

    private $divName;
    private $pager;
    private $sourceUrl;
    private $colNames;
    private $colModels;
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
    private $loadOnce;
    private $gridComplete;
    private $opcionesGrid;
    private $onSelectRow;
    private $multiCheck;

    public function setColumns($columns) {
        $tmpColNames = array();
        $tmpColModels = '';

        foreach ($columns as $columnNames => $columnOptions) {
            foreach ($columnOptions as $columnName => $columnOption) {
                $tmpColNames[] = $columnName;
                $tmpColModels .= json_encode($columnOption) . ",";
            }
        }
        $this->colNames = json_encode($tmpColNames);
        $this->colModels = '[' . $tmpColModels . ']';
    }

    public function setDivName($divName) {
        $this->divName = $divName;
    }

    public function setPager($pager) {
        $this->pager = $pager;
    }

    public function setSourceUrl($url) {
        $this->sourceUrl = $url;
    }

    public function setSortName($sortName) {
        $this->sortName = $sortName;
    }

    public function setCaption($caption) {
        $this->caption = $caption;
    }

    public function setGridHeight($height) {
        $this->gridHeight = $height;
    }

    public function setPrimaryKey($primaryKey) {
        $this->primaryKey = $primaryKey;
    }

    public function setAddUrl($url) {
        $this->addUrl = $url;
    }

    public function setEditUrl($url) {
        $this->editUrl = $url;
    }

    public function setDeleteUrl($url) {
        $this->deleteUrl = $url;
    }

    public function setCustomButtons($buttons) {
        $this->customButtons = $buttons;
    }

    public function setCustomFunctions($customFunctions) {
        $this->customFunctions = $customFunctions;
    }

    public function setSubGrid($isSubGrid = FALSE) {
        $this->subGrid = $isSubGrid;
    }

    public function setSubGridUrl($subGridUrl) {
        $this->subGridUrl = $subGridUrl;
    }

    public function setSubGridColumnNames($columnNames) {
        $this->subGridColumnNames = $columnNames;
    }

    public function setSubGridColumnWidth($columnWidth) {
        $this->subGridColumnWidth = $columnWidth;
    }

    public function setloadOnce($loadOnce) {
        $this->loadOnce = $loadOnce;
    }

    public function setonSelectRow($onSelectRow){
        $this->onSelectRow = $onSelectRow;
    }

    public function setgridComplete($gridComplete) {
        $funcionesTemp = "";
        if (is_array($gridComplete)) {
            foreach ($gridComplete as $clave => $valor) {
                $funcionesTemp.=$valor . ";";
            }
            // $this->gridComplete = $funcionesTemp;
        } else {
            $funcionesTemp.= $gridComplete . ";";
        }
        $funcionesTemp.="$('.tip').tooltip();";
        // $funcionesTemp.=" var currentPage = $(this).getGridParam('page').toString();

        // //retrieve any previously stored rows for this page and re-select them
        // var retrieveSelectedRows = $(this).data(currentPage);
        // if (retrieveSelectedRows) {
        //     $.each(retrieveSelectedRows, function (index, value) {
        //         $('#grid').setSelection(value, false);
        //     });
        // }";
        $funcionesTemp.="";
        $this->gridComplete = $funcionesTemp;
    }
    function setmultiCheck($multiCheck){
        $this->multiCheck = $multiCheck;
    }

    public function buildGrid() {
        $buildDivName            = $this->divName;
        $buildSourceUrl          = $this->sourceUrl;
        $buildColNames           = $this->colNames;
        $buildColModels          = $this->colModels;
        $buildSortName           = $this->sortName;
        $buildEditUrl            = $this->editUrl;
        $buildAddUrl             = $this->addUrl;
        $buildDeleteUrl          = $this->deleteUrl;
        $buildCaption            = $this->caption;
        $buildGridHeight         = $this->gridHeight;
        $buildPrimaryKey         = $this->primaryKey;
        $buildCustomButtons      = $this->customButtons;
        $buildSubGrid            = $this->subgrid;
        $buildSubGridUrl         = $this->subGridUrl;
        $buildSubGridColumnNames = $this->subGridColumnNames;
        $buildSubGridColumnWidth = $this->subGridColumnWidth;
        $buildLoadOnce           = $this->loadOnce;
        $gridComplete            = $this->gridComplete;
        $onSelectRow             = $this->onSelectRow;
        $pager                   = $this->pager;
        $multiCheck             = $this->multiCheck;

        $grid = "<script type='text/javascript'>";
        $grid .= '$(document).ready(function(){ var lastSel;';
        $grid .= "$('#$buildDivName').jqGrid({
                    url:'$buildSourceUrl',
                    datatype: 'json',
                    colNames:$buildColNames,
                    colModel:$buildColModels,
                    rowNum:10,
                    mtype: 'POST',
                    rowList:[10,20,30],
                    pager:\"#$pager\",
                    multiselect: $multiCheck,
                     //Opcion de los checks
                    sortname: '$buildSortName',
                    viewrecords: true,
                    sortorder: 'desc',                    
                    loadonce: '$buildLoadOnce',                    
                    caption:'$buildCaption',  
                    gridComplete: function(){
                        $gridComplete
                            $('#$buildDivName tr').click(function(){ 
                                $(this).addClass('ui-state-hover').siblings().removeClass('ui-state-hover'); 
                            })                     
                    },    
    onSelectRow:function(id,status,e){
        if(id && id!==lastSel){ 
           $onSelectRow;
           jQuery(this).restoreRow(lastSel); 
           lastSel=id; 
        } 
    },
    loadBeforeSend:function(){
                    //set current page
        current_page = $(this).getGridParam('page').toString();
},
                    height:'100%'";

        $grid .= "});";
//NavBar
        //$grid .= " $('#$buildDivName').jqGrid('navGrid','#pager',{search:true,edit:false,add:true,del:true});";
        $grid .= "$('#$buildDivName').jqGrid('navGrid','#$pager',{search:false,edit:false,add:false,del:false}, {})";

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
        if (!empty($this->customFunctions)) {
            foreach ($this->customFunctions as $customFunction) {
                $grid .= $customFunction;
            }
        }

//Set Grid Height
        $grid .= "$('#$buildDivName').setGridHeight($buildGridHeight,true);";
        $grid .= "$('.ui-jqgrid-titlebar-close','#gview_$buildDivName').remove();";      
        $grid .= "});</script>";

        return $grid;
    }


    public function get_DatosGrid($aData) {

        $CI = & get_instance();
        $page = $CI->input->post('page'); // get the requested page      
        $hasta = $CI->input->post('rows'); // get how many rows we want to have into the grid    
        $campoOrdena = $CI->input->post('sidx'); // get index row - i.e. user click to sort
        $Orden = $CI->input->post('sord'); // get the direction   
        $MisParametros = array();
        $desde = $hasta * $page - $hasta;
        if (isset($aData['metodo']) && isset($aData['modelo'])) {
            $CI->load->model($aData['modelo']);
            //$aDataList = $CI->$aData['modelo']->$aData['metodo']($parametrosModel);
            $aDataList = $CI->$aData['modelo']->$aData['metodo']($aData['criterios']);
            $count = count($aDataList);
            if ($count > 0)
                $total_pages = ceil($count / 1);
            else
                $total_pages = 0;
            if ($page > $total_pages)
                $page = $total_pages;
            $i = 0;

            /*
              $opciondefault='<span data-placement="right" class="ui-icon ui-icon-trash tip icogrid"  data-original-title="Eliminar" ></span><span data-placement="right" class="ui-icon ui-icon-pencil tip icogrid"  data-original-title="Editar" ></span>';
              if (isset($aData['opciones'])) {
              $opcion = implode('',$aData['opciones']);
              $opciondefault=trim($opciondefault).trim($opcion);
              }
             */
            if (isset($aData['columns'])) {
                foreach ($aDataList as $row) {
                    $columnData = array();
                    if (isset($aData['opciones'])) {
                        $opciones = $aData['opciones'];
                        $opciondefault = "";
                        foreach ($opciones as $key => $value) {
                            $opciondefault.='<span id="' . rand(176, 53453) . '" style="cursor:pointer;display:inline-table;" data-placement="top" class="ui-icon ui-icon-' . $value . ' tip icogrid"  data-original-title="' . $key . '" ></span>';
                            // $opciondefault.='<span id="' . rand(176, 53453) . '" data-placement="right" class="ui-icon ui-icon-' . $value . ' tip icogrid"  data-original-title="' . $key . '" ></span>';
                        }
                        $r = array_merge((array) $row, array('opcion' => $opciondefault));
                        $rw = (object) $r;
                    } else {
                        $rw = (object) $row;
                    }
                    // $r = array_merge((array) $row, array('opcion' => $opciondefault));                    
                    foreach ($aData['columns'] as $sData) {
                        array_push($columnData, $rw->$sData);
                    }
                    $rs->rows[$i]['id'] = (isset($aData['cripto']))?$CI->loaders->encrypt(trim($rw->$aData['pkid'])):trim($rw->$aData['pkid']);
                    $rs->rows[$i]['cell'] = $columnData;
                    $i++;
                }
            }

            $rs->cols = $columnData;
            $rs->page = $page;
            $rs->total = $total_pages;
            $rs->records = $count;
/*            foreach ($rs as $fila => $row) {
                $temp = array();
                foreach ($row as $key => $value) {
                    $temp
                }
            }*/
            return json_encode($rs);
        }
    }

    function object2array($object) {
        if (is_object($object)) {
            foreach ($object as $key => $value) {
                $array[$key] = $value;
            }
        } else {
            $array = $object;
        }
        return $array;
    }

    function set_CrearGrid($aData) {
//    $CI = & get_instance();
//    $CI->load->library('jqgrid');
//    $jqGrid = $CI->jqgrid;
        if (isset($aData['set_columns'])) {
            $aProperty = array();
            foreach ($aData['set_columns'] as $sProperty) {
                $aProperty[] = array(
                    $sProperty['label'] =>
                    array(
                        'name' => $sProperty['name'],
                        'hidden'=>(isset($sProperty['hidden']) ? $sProperty['hidden'] : false),
                        'index' => $sProperty['name'],
                        'width' => (isset($sProperty['width']) ? $sProperty['width'] : 90),
                        'align' => (isset($sProperty['align']) ? $sProperty['align'] : 'justify'),
                        'sorttype' => (isset($sProperty['sorttype']) ? $sProperty['sorttype'] : 'text'),
                        'editable' => false,
                        'sortable' => true
//                       'editoptions' => array(
//                            'readonly' => 'true',
//                            'size' => $sProperty['size']
//                        )
                    )
                );
            }
            $this->setColumns($aProperty);
        }

        if(isset($aData['onSelectRow'])){
            $this->setonSelectRow($aData['onSelectRow']);
        }else{
            // $this->setonSelectRow('console.log(id)');
        }
        if (isset($aData['gridComplete'])) {
            $this->setgridComplete($aData['gridComplete']);
        } else {
            $this->setgridComplete('console.log("0")');
        }
        if (isset($aData['multiCheck'])) {
            $this->setmultiCheck($aData['multiCheck']);
        } else {
            $this->setmultiCheck('false');
        }

        if (isset($aData['custom'])) {
            if (isset($aData['custom']['button'])) {
                $this->setCustomButtons(array($aData['custom']['button']));
            }
            if (isset($aData['custom']['function'])) {
                $this->setCustomFunctions(array($aData['custom']['function']));
            }
        }

        if (isset($aData['div_name'])) {
            $this->setDivName($aData['div_name']);
        } else {
            $this->setDivName('grid');
        }
        if (isset($aData['pager'])) {
            $this->setPager($aData['pager']);
        } else {
            $this->setPager('pager');
        }
        if (isset($aData['source']))
            $this->setSourceUrl(base_url() . $aData['source']);

        if (isset($aData['sort_name']))
            $this->setSortName($aData['sort_name']);

        if (isset($aData['add_url']))
            $this->setAddUrl(base_url() . $aData['add_url']);

        if (isset($aData['delete_url']))
            $this->setDeleteUrl(base_url() . $aData['delete_url']);

        if (isset($aData['edit_url']))
            $this->setEditUrl(base_url() . $aData['edit_url']);

        if (isset($aData['caption']))
            $this->setCaption($aData['caption']);

        if (isset($aData['primary_key']))
            $this->setPrimaryKey($aData['primary_key']);

        if (isset($aData['grid_height']))
            $this->setGridHeight($aData['grid_height']);

        if (isset($aData['subgrid']))
            $this->setSubGrid($aData['subgrid']);

        if (isset($aData['subgrid_url']))
            $this->setSubGridUrl($aData['subgrid_url']);

        if (isset($aData['subgrid_columnnames']))
            $this->setSubGridColumnNames($aData['subgrid_columnnames']);

        if (isset($aData['subgrid_columnwidth']))
            $this->subGridColumnWidth($aData['subgrid_columnwidth']);

        if (isset($aData['loadOnce']))
            $this->setloadOnce($aData['loadOnce']);

        return $this->buildGrid();
    }

}

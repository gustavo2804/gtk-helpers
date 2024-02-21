<?php


function printRowContents(
    $dataSource, 
    $item, 
    $columnsToDisplay, 
    $itemIdentifier, 
    $dataSourceName = null, 
    $debug = false
) {
    return $dataSource->tableRowContentsForUserItemColumns(null, $item, $columnsToDisplay);
}

<?php

// onCreation
// onFirstOpen
// onClose

// Usage:
// echo generateTable($columnsToDisplay, $items, $dataSource, $dataSourceName, $debug);



function generateTableForUser(
    $user,
    $columnsToDisplay, 
    $itemsOrQueryObject, 
    $dataSource, 
    $dataSourceName = null, 
    $debug = false
) {
    $items = null;
    $count = 0;

    if (is_array($itemsOrQueryObject))
    {
        $count = count($itemsOrQueryObject);
        $items = $itemsOrQueryObject;

        if ($debug)
        {
            gtk_log("Is Array!");
            gtk_log("Items count: ".$count);
            if ($count < 200)
            {
                gtk_log("Items: ".print_r($items, true));
            }
            
        }
    }
    else
    {
        $count = $itemsOrQueryObject->count();
        $items = $itemsOrQueryObject->executeAndYield();

        if ($debug)
        {
            gtk_log("Is Query Object!");
            gtk_log("Items count: ".$count);
        }
    }


    if (!isset($dataSourceName))
    {
        $dataSourceName = $dataSource->dataAccessorName;
    }

    if ($debug)
    {
        error_log("Generating table for user: ".print_r($user, true));
        // error_log("Columns to display: ".print_r($columnsToDisplay, true));
        if (is_array($items))
        {
            error_log("Items: ".print_r($items, true));
        }
        else
        {
            error_log("Items: ".get_class($items));
        }
        error_log("Data source: ".get_class($dataSource));
    }

    $index = 0;

    ob_start(); // Start output buffering 
    ?>
    <table>
        <thead>
            <tr>
                <th>Actions</th>
                <?php foreach ($columnsToDisplay as $columnMapping): ?>
                    <?php
                        if ($columnMapping->hideOnListsForUser($user)) 
                        {
                            continue;
                        } 
                        else 
                        {
                            echo "<th class='min-w-[75px]'>";
                            echo $columnMapping->getFormLabel();
                            echo "</th>";
                        }
                    ?>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
        
        <?php if ($count == 0): ?>
        <tr>
            <td colspan="<?php echo count($columnsToDisplay) + 1; ?>">
                No hay elementos que mostrar.
            </td>
        </tr>
        <?php else: ?>
            <?php foreach ($items as $currentItem): ?>
                <?php if ($dataSource->itemIsVisibleToUser($user, $currentItem)): ?>
                    <?php $itemIdentifier = $dataSource->dataMapping->valueForIdentifier($currentItem); ?>
                    <tr 
                        class="border-b border-gray-200"
                        style=<?php echo '"'.$dataSource->rowStyleForItem($currentItem, $index).'"'; ?>
                        id=<?php echo '"cell-'.$dataSource->dataAccessorName.'-'.$itemIdentifier.'"'; ?>
                    >
                        <?php echo $dataSource->tableRowContentsForUserItemColumns(
                                                    $user, 
                                                    $currentItem, 
                                                    $columnsToDisplay); ?>
                    </tr>
                    <?php $index++; ?>
                <?php else: ?>
                    <?php if ($debug): ?>
                        <?php gtk_log("Item is not visible to user: ".print_r($currentItem, true)); ?>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
    <?php return ob_get_clean(); // End output buffering and get the buffered content as a string
}

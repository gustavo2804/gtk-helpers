<?php

// onCreation
// onFirstOpen
// onClose

// Usage:
// echo generateTable($columnsToDisplay, $items, $dataSource, $dataSourceName, $debug);



function generateTableForUser(
    $user,
    $columnsToDisplay, 
    $items, 
    $dataSource, 
    $dataSourceName = null, 
    $debug = false
) {
    if (!isset($dataSourceName))
    {
        $dataSourceName = $dataSource->dataAccessorName;
    }
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


        <?php $currentItem = $items->current(); ?>
        <?php $index       = 0; ?>
        
        <?php if (!$currentItem): ?>
        <tr>
            <td colspan="<?php echo count($columnsToDisplay) + 1; ?>">
                No hay elementos que mostrar.
            </td>
        </tr>
        <?php else: ?>
            <?php $currentUser = DataAccessManager::get("session")->getCurrentUser(); ?>
            <?php // while ($currentItem): ?>
            <?php foreach ($items as $currentItem): ?>
                <?php if ($dataSource->itemIsVisibleToUser($currentUser, $currentItem)): ?>
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
                <?php endif; ?>
                <?php //$currentItem = $items->next(); ?>
                <?php //$index++; ?>
            <?php // endwhile; ?>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
    <?php return ob_get_clean(); // End output buffering and get the buffered content as a string
}

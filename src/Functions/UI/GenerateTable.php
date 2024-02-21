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
        <?php if (!count($items)): ?>
        <tr>
            <td colspan="<?php echo count($columnsToDisplay) + 1; ?>">
                No hay elementos que mostrar.
            </td>
        </tr>
        <?php else: ?>
            <?php $currentUser = DataAccessManager::get("session")->getCurrentUser(); ?>
            <?php foreach ($items as $index => $item): ?>
                <?php if ($dataSource->itemIsVisibleToUser($currentUser, $item)): ?>
                    <?php $itemIdentifier = $dataSource->dataMapping->valueForIdentifier($item); ?>
                    <tr 
                        class="border-b border-gray-200"
                        style=<?php echo '"'.$dataSource->rowStyleForItem($item, $index).'"'; ?>
                        id=<?php echo '"cell-'.$dataSource->dataAccessorName.'-'.$itemIdentifier.'"'; ?>
                    >
                        <?php echo $dataSource->tableRowContentsForUserItemColumns(
                                                    $user, 
                                                    $item, 
                                                    $columnsToDisplay); ?>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
    <?php return ob_get_clean(); // End output buffering and get the buffered content as a string
}

<!-- admin delete -->
<?php
    if ($row["status"]=="1"){
        echo "<a href='delete_off.php?id=".$row['user_id']."'>
            <button type='button' class='btn btn-danger'>
                <i class='anticon anticon-delete'></i>
            </button>
        </a>";
    } elseif ($row["status"]=="0"){
        echo "<a href='delete.php?id=".$row['user_id']."'>
            <button type='button' class='btn btn-danger'>
                <i class='anticon anticon-delete'></i>
            </button>
        </a>";
    }

?>
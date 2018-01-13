<?php

/**
* Уязвимости:
 * - sql инъекция
**/

function load_users_data($user_ids) {
    $user_ids = explode(',', $user_ids);
    $data = [];

        $db = mysqli_connect("127.0.0.1", "root", "", "b2b");
        if ($db) {
            foreach ($user_ids as $user_id) {
                $user_id = mysqli_real_escape_string($db, $user_id);

                if (trim($user_id) == '') {
                    continue;
                }

                if (!is_numeric($user_id)) {
                    echo 'All ids must be in a number format';
                    return false;
                }

                $sql = mysqli_query($db, "SELECT * FROM users WHERE id=$user_id");
                while ($obj = $sql->fetch_object()) {
                    $data[$user_id] = $obj->name;
                }
            }

            mysqli_close($db);

            return $data;

        }

        return false;
}

$data = load_users_data($_GET['user_ids']);
if ($data) {
    foreach ($data as $user_id => $name) {
        echo " <a href=\"/show_user.php?id=$user_id\">$name</a> ";
    }
}


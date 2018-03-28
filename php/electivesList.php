<?php
    require "database.php";

    $database = new DataBase("localhost", "uxProj", "root", "asdf");
    $sql = "SELECT * FROM electives WHERE";

    if($_GET['id'] === 'winter'){
        $sql = $sql . "term = 'winter'";
    } elseif($_GET['id'] === 'summer'){
        $sql = $sql . "term = 'summer'";
    }

    $query = $database->executeQuery($query, "Failed finding electives!");

    $template = "               <table>" . 
                    "                   <tr>
                                            <th>Избираема дисциплина</th>
                                            <th>Лектор</th>
                                            <th>Категория</th>
                                            <th>Кредити</th>
                                            <th>Рейтинг</th>
                                        </tr>\n";
    while($row = $query->fetch(PDO::FETCH_ASSOC)){
        $template = "                   <tr>\n";

        foreach($row as $key => $value){
           /* if($key === "lecturer"){
                $sql = "SELECT "
            }*/
            $temaplate = $template . "                      <td>$value</td>/n";
        }

        $template = "                   </tr>\n";
    }

    $template = "               </table>";
?>
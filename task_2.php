<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8" name = "viewport" content = "width-device=width, initial-scale=1" />
        <link rel = "stylesheet" type = "text/css" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
        <title>Matiur Rahman</title>
    </head>
    <body>
        <nav class = "navbar navbar-default">
            <div class = "container-fluid">
                <a class = "navbar-brand" href = "www.matiur.me">Matiur Rahman</a>
            </div>
        </nav>
        <div class = "row">	
            <div class = "col-md-3">
            </div>
            <div class = "col-md-6 well">
                <h3 class = "text-primary">Task - 2</h3>
                <hr style = "border-top:1px dotted #000;"/>

                <br/>
                <table class = "table table-bordered alert-warning table-hover">
                    <thead>
                    <th>Category Name</th>
                    <th>Total Items</th>

                    </thead>
                    <tbody>
                        <?php
                        require 'class.php';
                        $conn = new db_class();
                        $sql = "SELECT *,count(cr.ParentcategoryId) as p_count FROM category  cat left join catetory_relations cr on cr.ParentcategoryId =cat.Id 
                               
                                group by cr.ParentcategoryId order by p_count desc";
                        $read = $conn->runQuery($sql);

                        while ($fetch = $read->fetch_array()) {
                            
                            ?>
                            <tr>
                                <td><?php echo $fetch['Name'] ?> (<?php echo $fetch['p_count'] ?>)</td>
                                <td><?php echo $fetch['p_count'] ?></td>
                            </tr>
                            <?php
                        }
                        ?>	
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
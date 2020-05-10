<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8" name = "viewport" content = "width-device=width, initial-scale=1" />
        <link rel = "stylesheet" type = "text/css" href = "https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
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
                <h3 class = "text-primary">Task - 1</h3>
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
                        $sql = "SELECT *,count(icr.categoryId) as Total_Items FROM category  cat left join item_category_relations icr on icr.categoryId =cat.Id 
                               group by icr.categoryId order by Total_Items desc
                                ";
                        $read = $conn->runQuery($sql);
                        while ($fetch = $read->fetch_array()) {
                            ?>
                            <tr>
                                <td><?php echo $fetch['Name'] ?></td>
                                <td><?php echo $fetch['Total_Items'] ?></td>
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
<?php
    //When clicked on search button
if (isset($_POST['search'])) {
    //Defining data entries
    $SearchTitle = $_POST['SearchTitle'];
    $SearchGenre = $_POST['SearchGenre'];
    $SearchRating = $_POST['SearchRating'];
    $SearchYear = $_POST['SearchYear'];
  
    //Logical operations for different options to search    
    if (!empty($_POST['SearchTitle'])And empty($_POST['SearchGenre']) 
        And empty($_POST['SearchRating']) And empty($_POST['SearchYear'])
    ) {
        $query = "SELECT * FROM `movies` WHERE Title LIKE '%".$SearchTitle."%'";
        $search_result = filterTable($query);
    } else if (empty($_POST['SearchTitle'])And !empty($_POST['SearchGenre'])
        And empty($_POST['SearchRating']) And empty($_POST['SearchYear'])
    ) {
        $query = "SELECT * FROM `movies` WHERE Genre = '$SearchGenre'";
        $search_result = filterTable($query);
    } else if (empty($_POST['SearchTitle'])And empty($_POST['SearchGenre']) 
        And !empty($_POST['SearchRating']) And empty($_POST['SearchYear'])
    ) {
        $query = "SELECT * FROM `movies` WHERE Rating = '$SearchRating'";
        $search_result = filterTable($query);
    } else if (empty($_POST['SearchTitle'])And empty($_POST['SearchGenre']) 
        And empty($_POST['SearchRating']) And !empty($_POST['SearchYear'])
    ) {
        $query = "SELECT * FROM `movies` WHERE Year = '$SearchYear'";
        $search_result = filterTable($query);
    } else if (!empty($_POST['SearchTitle'])And !empty($_POST['SearchGenre']) 
        And empty($_POST['SearchRating']) And empty($_POST['SearchYear'])
    ) {
        $query = "SELECT * FROM `movies` WHERE
            Title LIKE '%".$SearchTitle."%' AND Genre = '$SearchGenre' ";
        $search_result = filterTable($query);
    } else if (!empty($_POST['SearchTitle'])And empty($_POST['SearchGenre']) 
        And !empty($_POST['SearchRating']) And empty($_POST['SearchYear'])
    ) {
        $query = "SELECT * FROM `movies` WHERE 
            Title LIKE '%".$SearchTitle."%' AND Rating = '$SearchRating'";
        $search_result = filterTable($query);
    } else if (!empty($_POST['SearchTitle'])And empty($_POST['SearchGenre']) 
        And empty($_POST['SearchRating']) And !empty($_POST['SearchYear'])
    ) {
        $query = "SELECT * FROM `movies` WHERE 
            Title LIKE '%".$SearchTitle."%' AND Year = '$SearchYear'";
        $search_result = filterTable($query);
    } else if (empty($_POST['SearchTitle'])And !empty($_POST['SearchGenre']) 
        And empty($_POST['SearchRating']) And !empty($_POST['SearchYear'])
    ) {
        $query = "SELECT * FROM `movies` WHERE 
            Genre = '$SearchGenre' AND Year = '$SearchYear'";
        $search_result = filterTable($query);
    } else if (empty($_POST['SearchTitle'])And !empty($_POST['SearchGenre']) 
        And !empty($_POST['SearchRating']) And empty($_POST['SearchYear'])
    ) {
        $query = "SELECT * FROM `movies` WHERE 
            Genre = '$SearchGenre' AND Rating = '$SearchRating'";
        $search_result = filterTable($query);
    } else if (empty($_POST['SearchTitle'])And empty($_POST['SearchGenre']) 
        And !empty($_POST['SearchRating']) And !empty($_POST['SearchYear'])
    ) {
        $query = "SELECT * FROM `movies` WHERE 
            Year = '$SearchYear' AND Rating = '$SearchRating'";
        $search_result = filterTable($query);
    } else if (!empty($_POST['SearchTitle'])And !empty($_POST['SearchGenre']) 
        And !empty($_POST['SearchRating']) And empty($_POST['SearchYear'])
    ) {
        $query = "SELECT * FROM `movies` WHERE 
            Title LIKE '%".$SearchTitle."%' AND Genre = '$SearchGenre' 
            AND Rating = '$SearchRating'";
        $search_result = filterTable($query);
    } else if (!empty($_POST['SearchTitle'])And !empty($_POST['SearchGenre']) 
        And empty($_POST['SearchRating']) And !empty($_POST['SearchYear'])
    ) {
        $query = "SELECT * FROM `movies` WHERE 
            Title LIKE '%".$SearchTitle."%' AND Genre = '$SearchGenre' 
            AND Year = '$SearchYear'";
        $search_result = filterTable($query);
    } else if (!empty($_POST['SearchTitle'])And empty($_POST['SearchGenre']) 
        And !empty($_POST['SearchRating']) And !empty($_POST['SearchYear'])
    ) {
        $query = "SELECT * FROM `movies` WHERE 
            Title LIKE '%".$SearchTitle."%' AND Rating = '$SearchRating' 
            AND Year = '$SearchYear'";
        $search_result = filterTable($query);
    } else if (empty($_POST['SearchTitle'])And !empty($_POST['SearchGenre']) 
        And !empty($_POST['SearchRating']) And !empty($_POST['SearchYear'])
    ) {
        $query = "SELECT * FROM `movies` WHERE 
            Genre = '$SearchGenre' AND Rating = '$SearchRating' 
            AND Year = '$SearchYear'";
        $search_result = filterTable($query);
    } else if (!empty($_POST['SearchTitle'])And !empty($_POST['SearchGenre']) 
        And !empty($_POST['SearchRating']) And !empty($_POST['SearchYear'])
    ) {
        $query = "SELECT * FROM `movies` WHERE 
            Title LIKE '%".$SearchTitle."%' AND Genre = '$SearchGenre' 
            AND Rating = '$SearchRating' AND Year = '$SearchYear'";
        $search_result = filterTable($query);
    } else {
        $query = "SELECT * FROM `movies`";
        $search_result = filterTable($query);
    }    
} else {
    $query = "SELECT * FROM `movies`";
    $search_result = filterTable($query);
}



// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "movies");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>PHP HTML TABLE DATA SEARCH</title>
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        
        <form action="index.php" method="post">
            <input type="text" name="SearchTitle" 
            placeholder="Search by Title"><br><br>
            
            <input type="text" name="SearchGenre" 
            placeholder="Search by Genre"><br><br>
            
            <input type="text" name="SearchRating" 
            placeholder="Search by Rating"><br><br>
            
            <input type="text" name="SearchYear" 
            placeholder="Search by Year"><br><br>
            <input type="submit" name="search" value="Search"><br><br>
        <table>
        <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Studio</th>
                    <th>Status</th>
                    <th>Sound</th>
                    <th>Versions</th>
                    <th>RecRetPrice</th>
                    <th>Rating</th>
                    <th>Year</th>
                    <th>Genre</th>
                    <th>Aspect</th>
                </tr>
<?php
                 //Flag value for checking if data is found
                 $found=0;
while($row = mysqli_fetch_array($search_result)):?>
<tr>
                    <td><?php echo $row['ID'];?></td>
                    <td><?php echo $row['Title'];?></td>
                    <td><?php echo $row['Studio'];?></td>
                    <td><?php echo $row['Status'];?></td>
                    <td><?php echo $row['Sound'];?></td>
                    <td><?php echo $row['Versions'];?></td>
                    <td><?php echo $row['RecRetPrice'];?></td>
                    <td><?php echo $row['Rating'];?></td>
                    <td><?php echo $row['Year'];?></td>
                    <td><?php echo $row['Genre'];?></td>
                    <td><?php echo $row['Aspect'];?></td>
                </tr>
                <?php
                $found=1; 
endwhile;
                ?>
                <?php
                //if data can not found.
                if ($found==0) {
                    echo "No Results Found. Please Try Another Search Option";
                }
                ?>
                </table>

            

        </form>
        
    </body>
</html>

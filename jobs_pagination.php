<?php
$con3 = mysqli_connect('localhost','root','','elbatal');

if(mysqli_connect_error()){
    echo "connection failed :" .mysqli_connect_error();
    die();
}

$page = 1;
$offset = 0;
$amount = 10;

    if(isset($_GET['page'])&& is_numeric($_GET['page'])){
        $page =round($_GET['page']);
    }
    
    if(isset($_GET['amount'])&& is_numeric($_GET['amount'])){
        $amount =round($_GET['amount']);
    }
    
    $offset = ($page - 1) * $amount ;
    
    $all = mysqli_query($con3,"SELECT * FROM jobs");
    
    $result3 = mysqli_query($con3,"SELECT * FROM jobs LIMIT {$amount} OFFSET {$offset}");
    
    $total = mysqli_num_rows($all);
    $pages = ceil($total / $amount);
    
    if(mysqli_error($con3)){
        echo "sql Error : " . mysqli_error($con3);
        die();
    }
    
    $num = mysqli_num_rows($result3);
    
    $data =[];
    
    for($i=0; $i < $num ;$i++){
        $data [] = mysqli_fetch_assoc($result3);
    }

    
?>

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">



<table class="table" style="border: 1px solid #CCC">
    <thead>
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>title</th>
            <th>description</th>
            <th>salary</th>
            <th>country</th>
            <th>experince</th>
            <th>approved</th>
            <th>available</th>
            <th>gender</th>
            <th>education</th>
            <th>more_info</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($data as $key => $value){
            ?>
            <tr>
                <td><?php echo $value['id']?></td>
                <td><?php echo $value['name']?></td>
                <td><?php echo $value['title']?></td>
                <td><?php echo $value['description']?></td>
                <td><?php echo $value['salary']?></td>
                <td><?php echo $value['country']?></td>
                <td><?php echo $value['experience']?></td>
                <td><?php echo $value['approved']?></td>
                <td><?php echo $value['available']?></td>
                <td><?php echo $value['gender']?></td>
                <td><?php echo $value['education']?></td>
                <td><?php echo $value['more_info']?></td>
                
            </tr>
           <?php 
        }
        ?>
        
        
        
    </tbody>    
    
</table>

<ul class="pagination" style='margin: auto; width: 300px'>
    <?php
    for ($i=1; $i <= $pages; $i++){
        if($page == $i){
            echo "<li class='active' style='width:30px; padding:7px;border : 1px solid #CCC; background-color:#FF0;'><a href='jobs_pagination.php?page={$i}&amount={$amount}'>{$i}</a></li>";
        }else{
            echo "<li  style='border : 1px solid #CCC; padding:7px; text-align:center; width:30px' ><a href='jobs_pagination.php?page={$i}&amount={$amount}'>{$i}</a></li>";
        }
        
    }
    
    ?>
    
    
</ul>


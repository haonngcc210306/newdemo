<?php
require_once('header.php');
require_once('connect.php');

?>
 <div class="container">
        <div class="row d-flex justify-content-center align-items-center p-3">
            <div class="col-md-8">

                <div class="search">
                <form class="example1" action="search.php">     
                    <input type="text" class="form-control" placeholder="Search..."  name="search">
                    <button class="btn btn-primary" name="btnSearch">Search</button>
                </form>  
                </div>
            </div>
        </div>
 
        <h2>Result for</h2>    
         <div class="row">
            <?php
              $c = new Connect();
              $dbLink = $c->connectToPDO();
              if(isset($_GET['search'])){
              $nameP = $_GET['search'];
            }else{
                $nameP="";
            }
            $sql ="SELECT * FROM product WHERE ProductName LIKE ?";
            $re = $dbLink->prepare($sql);
            $valueArray = ["%$nameP%"];
            $re->execute($valueArray);
            $row = $re->fetchAll(PDO::FETCH_BOTH);
            foreach($row as $r):
        ?>
       <div class="col-md-4 pb-3">
       <div class="card">
       <img src="image/<?=$r['img']?>" width="300px"/>
       <div class="card-body">
          <a href="detail.php?id=<?=$r['Id']?>" class ="text-decoration-none"><h5
          class="card-subtitle mb-2 text-center"><?=$r['ProductName']?></h5></a>
          <h6 class="card-subtitle mb-2 text-center"> <?=$r['Price']?></h6>
          </h5></span>
      </div>
    </div>
</div>
        <?php
        
             endforeach;
            ?>
        </div>
</div>
<?php
require_once('footer.php');
?>
                                                                                                                                                                                   
              

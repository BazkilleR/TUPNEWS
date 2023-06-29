<div class="container search"> 
        <!-- <form role="form"> 
            <div class="form-group">
                <input type="text" class="form-control input-lg" placeholder="Search.." />
                <span>
                    <a href="#">
                         <i class="form-control-feedback fa fa-user"></i>
                    </a>
                </span>    
                   
            </div>
        </form> -->
        <div class="container mt-5">
            <form name="search" method="post">
                <div class="input-group border ">
                    <input type="text" name="input" placeholder="Search.." aria-describedby="button-addon3" 
                    class="form-control bg-none border-0">
                    <div class="input-group-append border-0">
                        <button id="button-addon3" type="submit" class="btn btn-link btns">
                            <a href="#"><i class="fa fa-search"></i></a>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        
        <section>
        <div class="container-fluid mt-5">
        <?php
            // conect database
            include 'server.php';
            mysqli_query($conn, 'Use tup_news;');

            // check if user use date filter
            if (empty($_POST['date'])) {
                $query = "  SELECT * FROM news 
                            WHERE category='tcas67' 
                            ORDER BY UploadDate DESC";
                $result = mysqli_query($conn, $query);
            } else {
                $UploadDate = $_POST['date'];
                $query =  " SELECT * FROM news 
                            WHERE category='tcas67' 
                            AND UploadDate='$UploadDate'
                            ORDER BY UploadDate DESC";
                $result = mysqli_query($conn, $query);
            }

            // get data
            while ($dbarr = mysqli_fetch_array($result)) {
                $topic = $dbarr['topic'];
                $descr = $dbarr['descr'];
                $UploadDate = $dbarr['UploadDate'];
                $img = $dbarr['img'];
            ?>  
            <div class="newscard">
                <!-- CARD -->
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?= $img ?>" class="img-fluid rounded-start">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $topic ?></h5>
                                <p class="card-text"><?= $descr ?></p>
                                <p class="card-text"><small class="text-body-secondary"><?= $UploadDate ?></small></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            } 
            mysqli_close($conn);
            ?>
            </div>
        </div>
    </section>
    </div>
</div>
<?php include 'template/head.php'; ?>

<?php include 'template/admin.php'; ?>

<body>

<div class="wrapper">

    <?php include 'template/sidebar.php'; ?>

    <div class="main-panel">
        <?php include 'template/topnav.php'; ?>


        <div class="content">
            <div class="container-fluid">
                <h3>MESSAGES</h3>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-plain">
                            <div class="header">
                                <h4 class="title">INBOX</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>   
                                        <th>Email</th>   
                                        <th>Subject</th>
                                        <th>Message</th> 
                                        <th>Date</th> 
                                    </tr>

                                    <?php  
                                        include 'db/db.php';

                                        $query = "SELECT * FROM tbl_msg ORDER BY id ASC";
                                        $result = mysqli_query($con,$query);

                                        if ($result) {

                                                $i = 1;
                                            while($row = mysqli_fetch_assoc($result)){
                                                $name   = $row['name'];
                                                $email  = $row['email'];
                                                $subject  = $row['subject'];
                                                $msg    = $row['msg'];
                                                $date   = $row['msg_date'];
                                            
                                        


                                    ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo $name ?></td>
                                        <td><?php echo $email ?></td>
                                        <td><?php echo $subject ?></td>
                                        <td><?php echo $msg ?></td>
                                        <td><?php echo date("d-m-Y",strtotime($date)); ?></td>

                                    </tr>    

                                    <?php }} ?>     
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'template/footer.php'; ?>

    </div>
</div>


</body>

<?php include 'template/foot.php'; ?>
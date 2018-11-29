<?php 
    session_start();

    require_once('dbconnect.php');
    $sql = "SELECT * FROM `upload`";
    $res = mysqli_query($conn, $sql);

    if (isset($_POST['upload'])) 
    {
        $file_name = $_FILES['file']['name'];
        $file_type = $_FILES['file']['type'];
        $file_size = $_FILES['file']['size'];

        $fileExt = explode('.', $file_name);
        $fileActualExt = strtolower(end($fileExt));
    }

    //$conn = mysqli_connect("localhost", "root", "", "login");

    //$sql = "SELECT * FROM login.users WHERE first='$first'";

    //$result = mysqli_query($conn, $sql);

    if (isset($_SESSION['id'])) 
    {
        echo $_SESSION['id'];
        echo $_SESSION['first'];
        echo $_SESSION['last'];
?>


<html>
<head> 

<title>Login</title>
    <link rel="stylesheet" type="text/css" href="fileStyle.css">

<body>

    <div class="limit">
        <div class="container-table">
            <div class="wrap-table">
                <div class="table1">
        <img src="" class="avatar">
        <h1>File</h1>

        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="file">
            <input type="submit" name="upload">UPLOAD</input>
            
            <h2>My Files</h2>

            <table border=\"1\">
                    <tr>
                        <th width=\"200px\">Name</th>
                        <th width=\"200px\">Owner</th>
                        <th width=\"200px\">Last Modified</th>
                        <th width=\"200px\">Date Uploaded</th>
                        <th width=\"200px\">Type</th>
                        <th width=\"200px\">Size</th>
                    </tr>
                    <?php
                        while ($r = mysqli_fetch_assoc($res)) {
                    ?>
                    <tr>
                        <td width=\"200px\"><?php echo $r['name']; ?></td>
                        <td width=\"200px\"></td>
                        <td width=\"200px\"><?php echo date("F d Y H:i:s", getlastmod()); ?></td>
                        <td width=\"200px\"></td>
                        <td width=\"200px\"><?php echo $r['type']; ?></td>
                        <td width=\"200px\"><?php echo $r['size']; ?></td>
                    </tr>
                <?php } ?>
            </table>

           <!--  <?php
                /*echo "<span><table border=\"1\" bgcolor=\"#006699\" >
                    <tr>
                        <th width=\"200px\">Name</th>
                        <th width=\"200px\">Owner</th>
                        <th width=\"200px\">Last Modified</th>
                        <th width=\"200px\">Date Uploaded</th>
                        <th width=\"80px\">Type</th>
                        <th width=\"80px\">Size</th>
                    </tr>
                    </table></span>";*/
                //while ($row = mysqli_fetch_array($result)) 
                //{
                    //$first = $row['first'];
                    //$last = $row['last'];

                    /*echo "<table border=\"1\">
                        <tr>
                            <td width=\"200px\">".$file_name."</td>
                            <td width=\"200px\">".$_SESSION['last']."</td>
                            <td width=\"200px\">".$_SESSION['email']."</td>
                            <td width=\"200px\">".$_SESSION['uid']."</td>
                            <td width=\"80px\">".$fileActualExt."</td>
                            <td width=\"80px\">".$file_size."</td>
                        </tr>
                    </table>";*/
                //}
            ?> -->

            <!-- <table>
                <thead>
                <tr class="tableHeading">
                    <th class="column1">Name</th>
                    <th class="column2">Owner</th>
                    <th class="column3">Last Modified</th>
                    <th class="column4">Date Uploaded</th>
                    <th class="column5">Type</th>
                    <th class="column6">Size</th>
                </tr>
                </thead>

                <tr>
                    <td class="column1">Resume</td>
                    <td class="column2">Public</td>
                    <td class="column3">Sept 10,2018</td>
                    <td class="column4">Aug 28,2018</td>
                    <td class="column5">pdf</td>
                    <td class="column6">1120 kb</td>
                </tr>
            </table> -->

        </form>
                </div>
            </div>
        </div>
    </div>

</body>

</head>
</html>

<!-- <?php
}

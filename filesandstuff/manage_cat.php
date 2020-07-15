<?php
    include_once 'DB_2020/pdo.php';
    
    

?>



<div class="row mt-5">
<?php if(!isset($_GET['edit_id']) || !isset($_GET['delete_id'])) { ?>
    <div class="col-lg-6 pt-4  col-md-5">
        <form method="post" id="signinform">
            <div class="form-group row">
                <label for="catt" class="col-md-6 col-form-label text-lg-right text-md-center">New category:</label>
                <div class="col-md-5">
                    <input type="text" class="form-control pill" id="catt" name="catt" placeholder="enter category to be added">
                </div>
            </div>
        </form>
        <div class="text-center mt-3">                
            <button type="submit" form="signinform" name="submit" value="submit" class="btn pill text-white black-bg">
                &nbsp;Submit&nbsp;
            </button>
        </div>
    </div>

    <div class="col-lg-6 mt-md-3 ">
        <!-- show all categories here -->
        <h1>All categories</h1>
        <table class="table thead-light">
            <tr>
                <th>Category</th>
                <th>Action</th>
            </tr>
            <?php
            $stmt = $pdo->query("SELECT * FROM categories");
            if ($stmt->fetch(PDO::FETCH_ASSOC)){                
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr><td>",$row['cat_title'],"</td><td><a href='dashboard.php?manage_cat&edit_id=",$row['cat_id']
                    ,"'>Edit</a></td></tr>";
                }

            }

            ?>
        </table>
    </div>
<?php }
    if (isset($_GET['edit_id'])) {
        echo "<h4> Edit </h4>";
    }
 ?>
</div>
<?php
include 'header.php';

$user_id = $_GET["profile_id"];
$profile_info = new database_query("SELECT * FROM users where user_id = '$user_id'");
$result = $profile_info->query();

foreach ($result as $user) {
	?>
<div class="container">
    <div class="row my-2">
        <div class="col-lg-8 order-lg-2">

            <div class="tab-content py-4">

                <div class="tab-pane active" id="profile">
                    <h5 class="mb-3">প্রয়োজনীয় তথ্য</h5>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                      <th scope="row">নাম</th>
                                      <td><?php echo $user['fname'] . " " . $user['lname']; ?></td>
                                    </tr>

                                    <tr>
                                      <th scope="row">ই-মেইল</th>
                                      <td><?php echo $user['email']; ?></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!--/row-->
                </div>
            </div>
        </div>

        <div class="col-lg-4 order-lg-1 text-center">
            <img src="images/man_1.jpg" class="mx-auto img-fluid img-circle d-block" alt="avatar">

        </div>
    </div>
</div>

<?php
}
include 'footer.php';
?>
<?php
    include "header.php";
?>
    <section class="places">
        <div class="container">
            <form id="post_form" action="#" method="post">
                

                <div class="form-group">
                    <label for="address">কোথায় গিয়েছেন :</label>
                    <?php include "../select_city.php";?>
                </div>
                
                <!--
                <div class="form-group">
                    <label for="check_buttons">ট্যাগ সিলেক্ট করুন :</label>
                    <div id="check_buttons">

                        <label for="hill" class="btn btn-primary check_button">পাহাড় <input type="checkbox" name="tag_list[]" id="hill" class="badgebox"><span class="badge">&check;</span></label>
                        
                        <label for="sea" class="btn btn-primary check_button">সাগর <input type="checkbox" id="sea" name="tag_list[]" class="badgebox"><span class="badge">&check;</span></label>

                        <label for="river" class="btn btn-primary check_button">নদী <input type="checkbox" id="river" name="tag_list[]" class="badgebox"><span class="badge">&check;</span></label>

                        <label for="lake" class="btn btn-primary check_button">হ্রদ <input type="checkbox" id="lake" name="tag_list[]" class="badgebox"><span class="badge">&check;</span></label>
                        
                        <label for="archetype" class="btn btn-primary check_button">পুরাকীর্তি <input type="checkbox" id="archetype" name="tag_list[]" class="badgebox"><span class="badge">&check;</span></label>

                    </div>
                </div>
                -->

                <
                <div class="form-group">
                    <input class="btn btn-success" type="submit" name="submit" value="জমা দিন">
                </div>

            </form>
            <hr/>
            <hr/>

        </div>
    </section>
    <!-- end-container -->
    
    
<?php
    if(isset($_POST['submit'])){
        $selected_val = $_POST['district'];  // Storing Selected Value In Variable
        echo "You have selected :" .$selected_val;  // Displaying Selected Value
    }
    
?>

<?
include "footer.php";
?>
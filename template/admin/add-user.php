<?php include('header.php'); ?>

<!-- content -->
	<section class="row tmargin4">
        
        <form role="form">
            <div class="form-group form-inline">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username">
            </div>
            <div class="form-group form-inline">
                <label for="username">Password</label>
                <input type="text" class="form-control" id="username">
            </div>
            <div class="form-group form-inline">
                <label for="username">First Name</label>
                <input type="text" class="form-control" id="username">
            </div>
            <div class="form-group form-inline">
                <label for="username">Last Name</label>
                <input type="text" class="form-control" id="username">
            </div>
            <div class="form-group form-online">
                <label for="username">Branch</label>
                <select class="form-control">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
        </form>
        
        <a class="addbtn" href="add-user.php">ADD</a>
        <a class="cancelbtn">CANCEL</a>
	</section>
<!--/ content -->

<?php include('footer.php'); ?>
<?php include('header.php'); ?>

<!-- content -->
<div class="heading">
    <div class="row">
        <h1><img src="../assets/images/icons/add-icon.png" /> Add Branch</h1>
    </div>
</div>

	<section class="row tmargin4 branch">
        <form role="form">
            <div class="col-xs-6">
                <div class="form-group form-inline">
                    <label for="username">Branch Name</label>
                    <input type="text" class="form-control" id="username">
                </div>
                <div class="form-group form-inline">
                    <label for="username">Branch Code</label>
                    <input type="text" class="form-control" id="username">
                </div>
                <div class="form-group form-inline">
                    <label for="username">In-charge</label>
                    <select class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group form-inline">
                    <label for="username">Area</label>
                    <select class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="form-group form-inline">
                    <label for="username">Tin No.</label>
                    <input type="text" class="form-control" id="username">
                </div>
                <div class="form-group form-inline">
                    <label for="username">Contact</label>
                    <input type="text" class="form-control" id="username">
                </div>
            </div>
        </form>
        
        <div class="clear"></div>
        
        <div class="buttons">
            <a class="addbtn" href="add-user.php">ADD</a>
            <a class="cancelbtn">CANCEL</a>
        </div>
	</section>
<!--/ content -->

<?php include('footer.php'); ?>
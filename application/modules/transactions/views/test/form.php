<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <form action="<?php echo site_url('transactions/service/sync');?>" method="POST">
            <table>
                
                <?php 
                
                    $fields = array(
                        'product_id'    => 1,
                        'discount_id'   => 1, 
                        'batch_id' => 1,
                        'payment_type' => 'MC',
                        'customer_firstname' => 'John',
                        'customer_lastname' => 'Doe',
                        'card_holder' => 'John Doe',
                        'remarks' => 'This is ok',
                        'bank' => 'BPI',
                        'credit_card_holder' => 'John Doe',
                        'credit_card_no' => '12312313131',
                        'quantity' => 1,
                        'date_created' => date("Y-m-d H:i:s")
                    );
                ?>
                <tr>
                    <td>
                        Username
                    </td>
                    <td>
                        <input type="text" name="username" value="moop"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Password
                    </td>
                    <td>
                        <input type="text" name="password" value="moop"/>
                    </td>
                </tr>
                <?php foreach($fields as $name => $value){?>
                <tr>
                    <td>
                        <?php echo $name; ?>
                    </td>
                    <td>
                        <input type="text" name="<?php echo $name?>" value="<?php echo $value; ?>"/>
                    </td>
                </tr>
                <?php } ?>
                <tr>
                    <td>
                        
                    </td>
                    <td>
                        <input type="submit" value="test"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>

<link rel="stylesheet" href="<?php echo plugin_dir_url(dirname(__FILE__)); ?>style/admin-panel.css" />
<form method="post" class="panel-form">
    <h1>ระบบตรวจสอบการแจกหนังสือฟรี</h1>
        <table class=" table-style">
            <thead>
                <tr>
                <th scope="col">

                    <input type="checkbox" id="checkAll" name="id" >
                </th>

                <th scope="col">
                    Status
                </th>

                <th scope="col">
                    Account Number
                </th>

                <th scope="col">
                    Broker
                </th>

                <th scope="col">
                    Firstname
                </th>

                <th scope="col">
                    Lastname
                </th>

                <th scope="col">
                    Address
                </th>

                <th scope="col">
                    Tel
                </th>

                <th scope="col">
                    Email
                </th>

                <th scope="col">
                    Facebook
                </th>
                </tr>
            </thead>
            <tbody>
                <?php
foreach ($results as $row) {
    ?>
                <tr>
                    <th scope="row">
                        <input type="checkbox" name="id[]" value="<?php echo $row->id ?>">
                    </th >


                    <td>
                      <button type="submit" class="activation_button" status="<?php echo $row->status ?>" name="update" value="<?php echo $row->id . $row->status ?>" ><?php statusToOptionList($row->status);?></button>
                    </td>



                    <td>
                        <?php echo $row->account_number; ?>
                    </td>



                    <td>
                        <?php echo $row->broker; ?>
                    </td>


                    <td>
                        <?php echo $row->firstname; ?>
                    </td>


                    <td>
                        <?php echo $row->lastname; ?>
                    </td>


                    <td>
                        <?php echo $row->province; ?>
                        <?php echo $row->amphoe; ?>
                        <?php echo $row->zip_code; ?>
                        <?php echo $row->place; ?>
                    </td>


                    <td>
                        <?php echo $row->tel; ?>
                    </td>

                    <td>
                        <?php echo $row->email; ?>
                    </td>

                    <td>
                        <a href="<?php echo $row->facebook_name; ?>">
                        <?php echo $row->facebook_name; ?>
                        </a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>

        <input type="submit" name="delete" value="ลบข้อมูล" class="remove_item_button btn btn-danger">
    </form>
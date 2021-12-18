<?php
require_once('includes/app_top.php');
require_once('includes/mysql.class.php');
// Include database connection
require_once('includes/global.inc.php');
// Include general functions
require_once('includes/functions_general.php');
?>
<h3 style="text-align: center; font-size: 12px;">Join Team Of Rajyavardhan Singh Rathore </h3>
	 <table border="1">
<tr>
    <th>NO.</th>
    <th>NAME</th>
    <th>Mobile</th>
    <th>Email</th>
    <th>Facebook</th>
    <th>Twitter</th>
    <th>Instagram</th>
    <th>Address</th>
    <th>City</th>
    <th>State</th>
    <th>Pincode</th>
    <th>Ward</th>
    <th>Whatsapp</th>
    <th>Constitution</th>
    <th>Partyname</th>
    <th>Date</th>
</tr>
<?php
$data = $db->query("SELECT *from join_team ORDER BY id DESC");
if($data->size()>0)
{
    $count = 1;
    while($row = $data->fetch())
    {
        ?>
        <tr>
            <td><?php echo $count;?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['mobile'];?> </td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['facebook'];?></td>
            <td><?php echo $row['twitter'];?></td>
            <td><?php echo $row['instagram'];?></td>
            <td><?php echo $row['address'];?></td>
            <td><?php echo $row['city'];?></td>
            <td><?php echo $row['state'];?></td>
            <td><?php echo $row['pincode'];?></td>
            <td><?php echo $row['ward'];?></td>
            <td><?php echo $row['whatsapp'];?></td>
            <td><?php echo $row['constitution'];?></td>
            <td><?php echo $row['partyname'];?></td>
            <td><?php echo date("d-M-y",strtotime($row['dtdate']));?></td>
        </tr>
        <?php
        $count++;
    }
}
?>
<tr>
    <th>NO.</th>
    <th>NAME</th>
    <th>Mobile </th>
    <th>Email</th>
    <th>Facebook</th>
    <th>Twitter</th>
    <th>Instagram</th>
    <th>Address</th>
    <th>City</th>
    <th>State</th>
    <th>Pincode</th>
    <th>Ward</th>
    <th>Whatsapp</th>
    <th>Constitution</th>
    <th>Partyname</th>
    <th>Date</th>
</tr>
</table>
</body>
</html>
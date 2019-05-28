<?php
//set title
$title='PHP Report example';

//bring in template
require './template.php';

//get php variables
if(isset($_GET['item'])){
    $item= $_GET['item'];
}else{
    $item = '';
}

//check if this is opened or submitted via the 'submit' button
if(isset($_GET['submit'])){
$submit = 1;
}else{
$submit = 0;
}
?>

<div class='w3-panel'>
    <form method="get" class='' >
    <div class='w3-row'>
	<label class="w3-label">Item</label>
	<input type="text" id="item" name="item" class="w3-border-green w3-border w3-input" >
    </div>
    <div class='w3-row '>
        <button id='submit' name='submit' value='submit' type="submit" class="w3-button w3-green">Submit</button>
    </div>
    </form>
</div>
<div class='w3-container'>
<div id='more' class='w3-container w3-row-padding'></div>
</div>
<div class='w3-container '>

<?php
if($submit){
include ("sql-login.php");

//show errors (disable for production)
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

//sql script to run
$tsql = "
declare @item nvarchar(30)=(?)

select 
    itm.Name
    ,itm.SKU
from Items itm
where itm.SKU = @item
";

$params=array($item);
$getResults= sqlsrv_query($conn, $tsql,$params);
if ($getResults == FALSE)
    die(print_r(sqlsrv_errors()));

$fields = sqlsrv_field_metadata($getResults);
$fieldnames = array();
foreach ($fields as $f){
$fieldnames[]=$f['Name'];
}

echo "<table class='dt w3-table w3-table-all w3-card'>";
echo "<thead>\n<tr class='w3-blue'>";
echo "<th>";
echo implode('</th><th>',$fieldnames);
echo "</th>";
echo "</tr></thead>\n<tbody>\n";
while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
	echo "<tr><td>";
	echo implode('</td><td>', $row);
	echo "</td></tr>";
}
echo "</tbody></table>";

}
?>
</div>

<script>
    $(document).ready(function(){
	$('.dt').DataTable({
	    dom: 'Bfrtip',
	    buttons: [
		    'copy','excel','print'
	    ],
	    "pageLength": 50,
	    "ordering": true,
	    "bSort": false
	});
    });
</script>

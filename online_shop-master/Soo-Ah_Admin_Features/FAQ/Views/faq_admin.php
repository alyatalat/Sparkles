

<link rel="stylesheet" type="text/css" href="Layout/Style/admin.css" />
<?php
    require_once('Layout/admin_header.php');
    include('../Controller/database.php');
require_once ('../Models/FAQObject.php');


$db = Database::getDB();
$tempo = new FAQObject();

$categories = $tempo->getCategories();


?>
<link rel="stylesheet" type="text/css" href="Layout/Style/faq_admin.css" />
<script>
    $('#sidebar-first .menu-item').removeClass('selectedItem');
    $('#sidebar-first .faq').addClass('selectedItem');
</script>

<div id="main">
    <h1>Frequently Asked Questions</h1>

    <div id="seperator"></div>


    <table>
     <tr>
         <td colspan="2" class="faq_table_title first_row"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>FAQ Category List</td>
         <td class="first_row faq_link"><a href="add_faq_category.php">[Add New Category]</a></td>
     </tr>

        <tr>
            <th>FAQ Category</th>
            <th>Sort Order</th>
            <th>Action</th>
        </tr>

        <?php foreach($categories as $category){ ?>
        <tr>
            <td><?php echo $category['faq_category_name']; ?></td>
            <td><?php echo $category['faq_category_order']; ?></td>
            <td><a href="edit_faq_category.php?faq_id=<?php echo $category['faq_category_id'];?>" class="faq_link">[Edit]</a>&nbsp;<a href="../Controller/delete_faq_category.php?faq_id=<?php echo $category['faq_category_id'];?>&faq_order=<?php echo $category['faq_category_order']?>" onclick="return confirm('Are you sure you want to delete?')" class="faq_link">[Delete]</a>
            <a href="question_list.php?faq_id=<?php echo $category['faq_category_id'];?>" class="faq_link">[Question List]</a>
            </td>
        </tr>
        <?php } ?>
    </table>

</div>

    </div>

<?php
require_once('Layout/admin_footer.php');
?>
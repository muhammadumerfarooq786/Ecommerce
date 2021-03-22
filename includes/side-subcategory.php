<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i>Sub Categories</div>
    <nav class="yamm megamenu-horizontal" role="navigation">
        <ul class="nav">
            <li class="dropdown menu-item">
                <?php $sql=mysqli_query($con,"select id,subcategory  from subcategory where categoryid='$cid'");
while($row=mysqli_fetch_array($sql)){?>
                <a href="sub-category.php?scid=<?php echo $row['id'];?>" class="dropdown-toggle">
                    <?php echo $row['subcategory'];?></a>
                <?php }?>
            </li>
        </ul>
    </nav>
</div>
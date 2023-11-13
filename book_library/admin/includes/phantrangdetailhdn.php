<div class="col-sm-12 col-md-12" >
    <div style="float: right;">
        <ul class="pagination">
            <?php 
            $param = "";
            if($search){
                $param = "search=".$search."&";
            }
            if($current_page > 3) {
                $firstpage = 1 ?>
                <a href="?<?=$param?>per_page=<?=$item_per_page?>&page=<?=$firstpage?>&HDB_ID=<?=$id?>" class="page-link">First</a>
                <?php }?>
            <?php if($current_page > 1) {
                $prevpage = $current_page - 1 ?>
                <a href="?<?=$param?>per_page=<?=$item_per_page?>&page=<?=$prevpage?>&HDN_ID=<?=$id?>" class="page-link">Previous</a>
                <?php }?>
            <?php for($num = 1; $num <= $totalpage; $num++) { ?>
                <!-- <li class="paginate_button page-item active"> -->
                    <?php if($current_page != $num) { ?>
                        <?php if($num > $current_page - 3 && $num < $current_page + 3){ ?>
                    <a href="?<?=$param?>per_page=<?=$item_per_page?>&page=<?=$num?>&HDN_ID=<?=$id?>" class="page-link"><?=$num?></a>
                    <?php } ?>
                <!--  -->
                <?php }else{?>
                    <li class="paginate_button page-item active">
                    <a href="?<?=$param?>per_page=<?=$item_per_page?>&page=<?=$num?>&HDN_ID=<?=$id?>" class="page-link"><?=$num?></a>
                    </li>
                <?php }?>
                <?php } ?>
                <?php if($current_page < $totalpage) {
                    $nextpage = $current_page + 1 ?>
                    <a href="?<?=$param?>per_page=<?=$item_per_page?>&page=<?=$nextpage?>&HDN_ID=<?=$id?>" class="page-link">Next</a>
                    <?php }?>
                <?php if($current_page < $totalpage - 3) {
                    $endpage = $totalpage ?>
                <a href="?<?=$param?>per_page=<?=$item_per_page?>&page=<?=$endpage?>&HDN_ID=<?=$id?>" class="page-link">Last</a>
                <?php }?>
        </ul>
    </div>
</div>
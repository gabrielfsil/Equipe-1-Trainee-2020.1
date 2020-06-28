

    <div class="container listar-pagination">
        <nav class="pagination-listar ">
           <ul class="pagination">
           <?php if($page!=1): ?>
           <li class="page-item">
              <form method="GET">
                <input type='hidden' value="1" name="pagination">
                <button type="submit" class="page-link text-dark"> << </button>
              </form>
            </li>

            <li class="page-item">
              <form method="GET">
                <input type='hidden' value="<?= $page==1 ? 1 : $page-1 ?>" name="pagination">
                <button type="submit" class="page-link text-dark"> < </button>
              </form>
            </li>
            <?php endif; ?>

            <?php for($y=$page-1;$y<$page-1+$link_per_page && $y <= $total_links; $y++) : ?>

            <?php
              if($y == 0)
              {
                $y = 1;
              } 
            ?>
          <li class="page-item <?php if($y == $page){ echo "active";}?>" >  
          <form method="GET">
            <input type='hidden' value="<?=$y?>" name="pagination">
            <button type="submit" class="page-link text-dark" ?><?=$y?></button>
          </form>
          </li>
      <?php endfor; ?>

      
            <?php if($page!=$total_links): ?>                
              <li class="page-item">
                <form method="GET">
                  <input type='hidden' value="<?= $page==$total_links ? $total_links : $page+1 ?>" name="pagination">
                  <button type="submit" class="page-link text-dark"> > </button>
                </form>
              </li>
              <li class="page-item">
                <form method="GET">
                  <input type='hidden' value="<?=$total_links?>" name="pagination">
                  <button type="submit" class="page-link text-dark"> >> </button>
                </form>
              </li>
            <?php endif; ?>
            
           </ul>
        </nav>

    </div>   
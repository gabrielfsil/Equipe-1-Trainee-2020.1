<nav aria-label="Páginas de resultado de pesquisa de atrações" id="paginacao">
        <ul class="pagination" style="justify-content: center;">
          <?php if($page!=1): ?>    
            <li class="page-item">
              <form method="GET">
              <?php if(isset($_GET['conteudo'])) 
                echo "<input type='hidden' value=" . "'" . $_GET['conteudo'] . "'" . " name='conteudo'>";
              ?>
              <?php if(isset($_GET['categoria'])) 
                echo "<input type='hidden' value=" . "'" . $_GET['categoria'] . "'" . " name='conteudo'>";
              ?>
                <input type='hidden' value="1" name="pagination">
                <button type="submit" class="page-link"> << </button>
              </form>
            </li>
            <li class="page-item">
              <form method="GET">
              <?php if(isset($_GET['conteudo'])) 
                echo "<input type='hidden' value=" . "'" . $_GET['conteudo'] . "'" . " name='conteudo'>";
              ?>
              <?php if(isset($_GET['categoria'])) 
                echo "<input type='hidden' value=" . "'" . $_GET['categoria'] . "'" . " name='conteudo'>";
              ?>
                <input type='hidden' value="<?= $page==1 ? 1 : $page-1 ?>" name="pagination">
                <button type="submit" class="page-link"> < </button>
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
          <li class="page-item" >  
          <form method="GET">
            <?php if(isset($_GET['conteudo'])) 
              echo "<input type='hidden' value=" . "'" . $_GET['conteudo'] . "'" . " name='conteudo'>";
            ?>
            <?php if(isset($_GET['categoria'])) 
              echo "<input type='hidden' value=" . "'" . $_GET['categoria'] . "'" . " name='conteudo'>";
            ?>
            <input type='hidden' value="<?=$y?>" name="pagination">
            <button type="submit" class="page-link  <?php if($y == $page){ echo " ativado ";}?>" ><?=$y?></button>
          </form>
          </li>
      <?php endfor; ?>

      
          <?php if($page!=$total_links): ?>        
            <li class="page-item">
              <form method="GET">
                <?php if(isset($_GET['conteudo'])) 
                  echo "<input type='hidden' value=" . "'" . $_GET['conteudo'] . "'" . " name='conteudo'>";
                ?>
                <?php if(isset($_GET['categoria'])) 
                  echo "<input type='hidden' value=" . "'" . $_GET['categoria'] . "'" . " name='conteudo'>";
                ?>
                <input type='hidden' value="<?= $page==$total_links ? $total_links : $page+1 ?>" name="pagination">
                <button type="submit" class="page-link"> > </button>
              </form>
            </li>
            <li class="page-item">
              <form method="GET">
                <?php if(isset($_GET['conteudo'])) 
                  echo "<input type='hidden' value=" . "'" . $_GET['conteudo'] . "'" . " name='conteudo'>";
                ?>
                <?php if(isset($_GET['categoria'])) 
                  echo "<input type='hidden' value=" . "'" . $_GET['categoria'] . "'" . " name='conteudo'>";
                ?>
                <input type='hidden' value="<?=$total_links?>" name="pagination">
                <button type="submit" class="page-link"> >> </button>
              </form>
            </li> 
          <?php endif; ?>
        </ul>
      </nav>
      <a class="h6 row align-items-center" style="justify-content: center;" href="#atracoes-topo">Voltar ao topo</a>
<?php
if (isset($files) && count($files))
{
   ?>
      <ul>
         <?php
         foreach ($files as $file)
         {
            ?>
            <li class="image_wrap">
               <a href="#" class="delete_file_link" data-file_id="<?php echo $file->nEOfId?>">Delete</a>
               <strong><?php echo $file->cEOfBases?></strong>
               <br />
               <?php echo $file->cEOfBases?>
            </li>
            <?php
         }
         ?>
      </ul>
   </form>
   <?php
}
else
{
   ?>
   <p>No se Encontro Archivos</p>
   <?php
}
?>
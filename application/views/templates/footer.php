	</div>
       <!-- FOOTER -->
        <footer class="hidden-print">
           <p class="pull-right"><a href="#">Volver Arriba</a></p>
           <p>&middot; &copy; Realizado por <a href="https://github.com/Cesarfr">Cesarfr</a> para la <a href="http://uttecamac.edu.mx" target="_blank">Universidad Tecnológica de Tecámac</a> &middot; <a href="<?php echo site_url('home/aviso'); ?>">Aviso de privacidad</a></p>
        </footer>
    </div>
    <script type="text/javascript">
		var baseurl = "<?php print base_url(); ?>";
	</script>
    <script src="<?php echo base_url('assets/js/jquery-1.12.0.min.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>" type="text/javascript"></script>
    <!-- Date pollyfill -->
    <script src="<?php echo base_url('assets/js/nodep-date-input-polyfill.dist.js');?>" type="text/javascript"></script>
    <!-- Validation -->
	<script src="<?php echo base_url('assets/js/jquery.form-validator.min.js');?>" type="text/javascript"></script>
   <?php if(isset($_SESSION["id_u"])){ ?>
	<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js');?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/dataTables.bootstrap.min.js');?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/dataTables.responsive.min.js');?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/responsive.bootstrap.min.js');?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/raphael-min.js');?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/morris.min.js');?>" type="text/javascript"></script>
	<?php } ?>
    <script src="<?php echo base_url('assets/js/app.js');?>" type="text/javascript"></script>
</body>
</html>
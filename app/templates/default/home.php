<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>

<div class="row">
	<div class="col-md-12">
		<form method="POST">

			<div class="input-group" id="url">
				<input type="url" class="form-control input-lg" name="form[url]" placeholder="Copier un lien à raccourcir" value="" autocomplete="off" autocorrect="off" autocapitalize="off"> 
				<span class="input-group-btn">
					<input class="btn btn-default btn-lg" type="submit" name="submit" value="Murl">
				</span>
			</div>
		</form>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div id="liste">
		</div>
	</div>
</div>

<?php $this->stop('main_content') ?>


<?php $this->start('scripts') ?>
<script>
	$.getJSON( "api/myliste", function( data ) {
		var items = [];
		//console.dir(data);
		$.each( data, function( key, val ) {
			$info = '<button class="list-group-item"><a href="http://murl.ly/' + val.code + '">http://murl.ly/' + val.code + '</a><span class="badge">' + val.nb_vues + '</span></button>';
			items.push( $info );
		});
		console.dir(items);
		$( "<list-group/>", {
			html: items.join( "" )
		}).appendTo( "#liste" );
	});
</script>

<?php $this->stop('scripts') ?>

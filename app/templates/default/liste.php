<?php $this->layout('layout', ['title' => 'Accueil']) ?>


<?php $this->start('main_content') ?>


<table class="table table-hover">
	<thead>
		<tr><th>#</th><th>Murl</th> <th>Url</th><th>Views</th></tr>
	</thead>
	<tbody>
		<tr>
			<?php
			$i = 1;
			foreach ($liste as $value):?>
			<th scope="row"><?= $i ?></th> <td><a href="http://murl.ly/<?= $value['code']?>">http://murl.ly/<?= $value['code']?></a></td> <td><a href="<?= $value['url']?>"><?= $value['url']?></a></td> <td><?= $value['nb_vues']?></td> </tr> <tr>
			<?php 
			$i++;
			endforeach ?>
	</tbody>
</table>

<?php $this->stop('main_content') ?>
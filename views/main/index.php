<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Phone Book';
?>
<?php echo Yii::$app->session->getFlash('success'); ?>
<table>
	<thead>
	  <tr>
	      <th>Фамилия</th>
	      <th>Имя</th>
	      <th>Отчество</th>
	      <th>Телефон</th>
	      <th>Страна</th>
	  </tr>
	</thead>

	<tbody>
	
	<?php foreach($phones as $phone): ?>
	  	<tr>
	    	<td><?= $phone['surname'] ?></td>
	    	<td><?= $phone['name'] ?></td>
	    	<td><?= $phone['patronymic'] ?></td>
	    	<td><?= $phone['phone'] ?></td>
	    	<?php for($i = 0; $i < count($countrys); $i++): ?>
				<?php if($countrys[$i]['phone'] == $phone['phone']): ?>
					<td>
						<?= $countrys[$i]['country'] ?>
	    			</td>
				<?php endif; ?>
			<?php endfor; ?>
	    </tr>
	<?php endforeach; ?>
</tbody>
</table>
<a class="waves-effect waves-light btn modal-trigger" href="#modal1" style="margin: 50px 0 300px;">Добавить контакт</a>

<div id="modal1" class="modal">
<div class="modal-content">
	<h4>Добавить новый контакт</h4>
	<div class="row">
		<?php $form = ActiveForm::begin([
			'options' => ['class' => 'col s12'],
		]); ?>
			<div class="row">
				<div class="input-field col s12">
					<?php echo $form->field($model, 'surname')->textInput()->label('Фамилия'); ?>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<?php echo $form->field($model, 'name')->textInput()->label('Имя'); ?>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<?php echo $form->field($model, 'patronymic')->textInput()->label('Отчество'); ?>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<?php echo $form->field($model, 'phone')->textInput()->label('Телефон'); ?>
				</div>
			</div>
			<?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
		<?php ActiveForm::end(); ?>
	</div>
</div>
<div class="modal-footer">
	<a href="#!" class="modal-close waves-effect waves-green btn-flat">Отмена</a>
</div>
</div>

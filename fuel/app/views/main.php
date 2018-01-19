<?= Asset::css("admin/screen_size_max.css"); ?>

<style type="text/css">
	
	#back{
		position  : absolute;
		background: no-repeat center;
		background-size: 100% auto;
		width: 95%;
	}
	
	.field {
		border-collapse: collapse;
	}
	
	.field tr {
		border:1px #FFF solid;
		padding: 50px;
	}
	
	#god_img {
		position : relative;
		width : 15%;
		margin-right : 10px;
		margin-left : 70px;
		margin-top : 140px;
	}
	
	#scarabe_img {
		position : relative;
		width : 15%;
		margin-right : 10px;
		margin-left : 70px;
		margin-top : 140px;
	}
	
	#eye_img {
		position : relative;
		width : 15%;
		margin-right : 5px;
	}
	
	#piramid_img {
		position : relative;
		width : 15%;
		margin-right : 5px;
	}
	
	#sosei_img {
		position : relative;
		width : 15%;
		margin-right : 5px;
	}
	
	#set_card_img{
		width : 5%;
	}
	
	#open_card_img{
		width : 10%;
	}
</style>

<div><img class="back"/>
	<?= Asset::img('back.png',
				array('id'=>'back'))?>
</div>

<table class="field">
	<tr>
		<?= Asset::img('god.png',
				array('id'=>'god_img')) ?>
		<?= Asset::img('scarabe.png',
				array('id'=>'scarabe_img')) ?>
		<?= Asset::img('eye.png',
				array('id'=>'eye_img')) ?>
		<?= Asset::img('piramid.png',
				array('id'=>'piramid_img')) ?>
		<?= Asset::img('sosei.png',
				array('id'=>'sosei_img', 'onclick'=>'aaa(this.id);')) ?>
	</tr>
	
	<?php for($i = 0; $i < 5; $i++):?>
		<tr>
			<td>
				<?= Asset::img('card'.$objNo[$i].'.png',
					array('id'=>'open_card_img')) ?>
			</td>
		</tr>
	<?php endfor; ?>
</table>

<script type="text/javascript">

		$(function()
		{
			uCoachHp	= <?php echo $viewData['coachList'][$uCoach]['hp']; ?>;
			trainingFee = uCoachHp * 10;
			
			// 所持金
			userMoney = <?php echo $viewData['user']['money']; ?>;
			
			trainingFee{{$cnt}}	= document.getElementById("trainingFee{{$cnt}}");
			trainingFee{{$cnt}}.innerHTML = Math.floor(trainingFee);
			
			var inputSubmitButton{{$cnt}} = document.getElementById("inputSubmitButton" + {{$cnt}});
			
			if(correctAnswer == selectAnswer)
			{
				inputSubmitButton{{$cnt}}.innerHTML = '<input class="training_submit" type="image" src="{{IMG_URL}}popup/ok_Button.png">';
			}
			else
			{
				inputSubmitButton{{$cnt}}.innerHTML = '<input class="training_submit" type="hidden" src="{{IMG_URL}}popup/ok_Button.png">\n\
															<div class="fee_shortage_text">{{"所持金が足りません"}}</div>';
			}
			
		});

		function feeCalcuration{{$cnt}}(select)
		{
			// input class 取得
			var inputClass = $('.training_submit');
			var time	= select.value;
			
			uCoachHp	= <?php echo $viewData['coachList'][$uCoach]['hp']; ?>;
			trainingFee = uCoachHp * 10 * time * (100 - (time - 1) * 3) / 100;
			
			userMoney = <?php echo $viewData['user']['money']; ?>;
			
			trainingFee{{$cnt}}	= document.getElementById("trainingFee{{$cnt}}");
			trainingFee{{$cnt}}.innerHTML = Math.floor(trainingFee);
			
			if(userMoney > trainingFee)
			{
				inputSubmitButton{{$cnt}}.innerHTML = '<input class="training_submit" type="image" src="{{IMG_URL}}popup/ok_Button.png">';
			}else
			{
				inputSubmitButton{{$cnt}}.innerHTML = '<input class="training_submit" type="hidden" src="{{IMG_URL}}popup/ok_Button.png"><div class="fee_shortage_text">{{"所持金が足りません"}}</div>';
			}
			
		}
	</script>

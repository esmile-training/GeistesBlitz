<?php
class Controller_Main extends Controller_Base_Admin
{
	public function action_index()
	{
		
		Config::load('cardList');
		
		for($i = 0;$i < 60;$i++)
		{
			$objNo[$i] = $i + 1;
		}
		
		shuffle($objNo);
		
		$this->view_data['objNo'] = $objNo;
		
		for($j = 0;$j < 5;$j++)
		{
			$this->view_data['obj'][$j] = Config::get($objNo[$j]);
		}
		
		return View_Wrap::contents('main', $this->view_data);
	}
}


<?php
	class ResultController extends AppController{
		
		public function show(){
			
		 	$result = $this->request->data['show_result'];
		 	$this->set(compact('result'));
		}		
		
	}
<?php
	class OrderReportController extends AppController{

		public function index(){

			$this->setFlash('Multidimensional Array.');

			$this->loadModel('Order');
			$orders = $this->Order->find('all',array('conditions'=>array('Order.valid'=>1),'recursive'=>2));
			// debug($orders);exit;

			$this->set('orders',$orders);

			$this->loadModel('Portion');
			$portions = $this->Portion->PortionDetail->find('all',array('conditions'=>array('Part.valid'=>1,'PortionDetail.portion_id=Portion.id'),'recursive'=>2));

			$this->set('portions',$portions);


			// To Do - write your own array in this format

			$orders = $this->Order->OrderDetail->find('all',array('conditions'=>array('Order.valid'=>1 ,'OrderDetail.order_id=Order.id'),'recursive'=>2));

			foreach ($orders as $key => $value) {
					// $order_reports[$value['Order']['name']] = array(
					// 	($portions[$key]['PortionDetail']['value'])*($value['OrderDetail']['quantity'])
					// );
					$order_reports[$value['Order']['name']] = array();				
	
			}
			

			debug($order_reports);exit;
			$this->set('order_reports',$order_reports);



			// $this->loadModel('OrderDetail');
			// $order_report = $this->OrderDetail->find('all',array('conditions'=>array('OrderDetail.valid'=>1,'OrderDetail.order_id'=>"1")));
			

			// debug($order_report);exit;
		

			// $this->set('order_report',$order_report);

			$this->set('title',__('Orders Report'));
		}

		public function Question(){

			$this->setFlash('Multidimensional Array.');

			$this->loadModel('Order');
			$orders = $this->Order->find('all',array('conditions'=>array('Order.valid'=>1),'recursive'=>2));

			// debug($orders);exit;

			$this->set('orders',$orders);

			$this->loadModel('Portion');
			$portions = $this->Portion->find('all',array('conditions'=>array('Portion.valid'=>1),'recursive'=>2));
				
			// debug($portions);exit;

			$this->set('portions',$portions);

			$this->set('title',__('Question - Orders Report'));
		}

	}
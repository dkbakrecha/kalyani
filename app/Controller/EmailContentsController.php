<?php
App::uses('AppController', 'Controller');

class EmailContentsController extends AppController {

	public $name = 'EmailContents';
	
	public function admin_index(){
		$this->set('title_for_layout','Email Contents');
	}
	
	public function admin_edit($id=NULL){
		
		$this->set('title_for_layout', 'Update Email Content');
		
		if (!$id && empty($this->request->data)) {
			$this->redirect(array('admin' => true, 'controller' => 'emailcontents', 'action' => 'index'));
		}
		
		if (!empty($this->request->data)) {
			$data =$this->request->data ;
			$data['EmailContent']['modified'] = date("Y-m-d H:i:s");
			//prd($data);
			if ($this->EmailContent->save($data)) {
				$this->Session->setFlash(__('Email content update successfully.'), 'flash_success');
				$this->redirect(array('admin' => true, 'controller' => 'emailcontents', 'action' => 'edit',$id));
			} else {
				$this->Session->setFlash(__('Email content could not be update.'), 'flash_error');
			}
		}
		
		if (empty($this->request->data)) {
			$EmailRow = $this->EmailContent->read(null,$id);
			
			if(count($EmailRow) > 0 ){
				$this->request->data = $EmailRow;
			}
			else{
				$this->Session->setFlash(__('Invalid Resuest.'), 'flash_error');
				$this->redirect(array('admin' => true, 'controller' => 'emailcontents', 'action' => 'index'));
			}
		}
		
	}
	
	public function admin_emailgrid(){
		
		$page  = $this->request->query['page'];
		$limit = $this->request->query['rows'];
		$sidx  = $this->request->query['sidx'];
		$sord  = $this->request->query['sord'];
		
		if(!$sidx) $sidx =1;
		$order_by = $sidx.' '.$sord;
		
		$conditions = array();
		
    	$count = $this->EmailContent->find('count',array(
				'recursive'  => -1,
			  	'conditions' => $conditions,
			)
		);
		
		if($count >0){ 
			$total_pages = ceil($count/$limit); 
		}else{
			$total_pages = 0; 
		}
		
		if ($page > $total_pages) {
			$page=$total_pages;
		}
			
		$start = $limit*$page - $limit; 
		
		$emailList = $this->EmailContent->find('all',array(
			  'conditions' =>$conditions,
				'order' => $order_by,
				'limit' => $limit,
				'offset' => $start
			)
		);
		
		$temp = array();
		
		$responce = new stdClass();
		$responce->page = $page; 
		$responce->total = $total_pages; 
		$responce->records = $count; 

		$i=0; 
		if(is_array($emailList))
		{
			//prd($emailList);
			$temp = array();
			foreach($emailList as $emails):
			{
				
				$title 		 = $emails['EmailContent']['title'];
				$subject = strip_tags($emails['EmailContent']['subject']);
				$modified = $emails['EmailContent']['modified'];
				
				$action = '';
				
				if($emails['EmailContent']['status'] == 0){	
					$action .= '<i class="fa fa-circle fa-lg clrDisable" onclick="changeCmsStatus('.$emails['EmailContent']['id'].',0)"></i>';
				}
				else if($emails['EmailContent']['status'] == 1){
					$action .= '<i class="fa fa-circle fa-lg clrEmable" onclick="changeCmsStatus('.$emails['EmailContent']['id'].',1)"></i>';
				}
				
				$action .= '&nbsp;&nbsp;&nbsp;<a href="'.$this->webroot.'admin/email_contents/edit/'.$emails['EmailContent']['id'].'" ><i class="fa fa-edit fa-lg"></i></a> ';
				
        		$responce->rows[$i]['id']=$emails['EmailContent']['id'];
				$responce->rows[$i]['cell']=array($emails['EmailContent']['id'],$title,$subject,$modified,$action); 
				$i++;
			}
			endforeach;
			
		}
		echo json_encode($responce); exit;
	}
	
	public function admin_changestatus(){
		
		if($this->request->is('ajax')){
			
			$data['EmailContent']['id'] = $this->request->data['id'];
			$data['EmailContent']['status'] = $this->request->data['status'] == 1 ? 0 : 1 ;
				
			if ($this->EmailContent->save($data)) {
				echo '1';
			} else {
				echo '0';
			}
			exit;
		}
		else{
			
		}
	}
	
	public function admin_mail()
	{
		$this->set('title_for_layout', 'Compose Mail');
		$this->loadModel('Contact');
		
		if ($this->request->is('post'))
		{

			$data = $this->request->data;
			
			if(isset($data['sendMail']) && $data['sendMail'] == 'Send Mail'){
				/**
				 * User Resuest from user list functionality.
				 */
				$userArr = explode(',',$data['user_ids']);
				
				$user_emails = $this->Contact->find('all',array(
					'recursive' => -1,
					'conditions' => array('id'=>$userArr),
					'fields' => array('email','name'),
				));
				
				$email = '';
				$names = '';
				foreach($user_emails as $emails){
					$email[]= $emails['Contact']['email'];
					if(!empty($emails['Contact']['name']))
					{
						$names[]= $emails['Contact']['name'];
					}
					else
					{
						$names[]=" ";	
					}
				}
				$this->set('user_email',implode(',',$email));
				$this->set('user_names',implode(',',$names));
			}else{
				/**
				 * Mail send post request.
				 */
				$userEmails = $data['EmailContent']['to'];
				$subject = $data['EmailContent']['subject'];
				$message = $data['EmailContent']['content'];

				$expression = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$/";
				$userEmails = explode(',', $userEmails);

				$temp = '';
				foreach ($userEmails as $email)
				{
					if (!preg_match($expression, $email))
					{
						$temp .= '<strong>' . $email . '</strong> , ';
					}
				}
				if (!empty($temp))
				{
					$this->Session->setFlash(__('Incorrect mail addresses : ' . $temp ), 'flash_error');
				} else
				{
					//prd($data);
					$this->loadModel('EmailContent');
					$emailObj = new EmailContent();

					if ($emailObj->ComposeToManyMail($subject, $message, $userEmails))
					{
						$this->Session->setFlash(__('Mail successfully send.'), 'flash_success');
					} else
					{
						$this->Session->setFlash(__('Mail cannot be sent. Please try again'), 'flash_error');
					}
				}
			}
		}
	}
		
	public function admin_jpmail()
	{
		$this->set('title_for_layout', 'Compose Mail');
		$this->loadModel('User');
		
		if ($this->request->is('post'))
		{

			$data = $this->request->data;
			
			if(isset($data['sendMail']) && $data['sendMail'] == 'Send Mail'){
				/**
				 * User Resuest from user list functionality.
				 */
				$userArr = explode(',',$data['user_ids']);
				
				$user_emails = $this->User->find('all',array(
					'recursive' => -1,
					'conditions' => array('id'=>$userArr),
					'fields' => array('email','first_name','last_name'),
				));
				
				$email = '';
				$names = '';
				foreach($user_emails as $emails){
					$email[]= $emails['User']['email'];
					if(!empty($emails['User']['first_name']))
					{
						$names[]= $emails['User']['first_name'] . " " . $emails['User']['last_name'];
					}
					else
					{
						$names[]=" ";	
					}
				}
				$this->set('user_email',implode(',',$email));
				$this->set('user_names',implode(',',$names));
			}else{
				/**
				 * Mail send post request.
				 */
				$userEmails = $data['EmailContent']['to'];
				$subject = $data['EmailContent']['subject'];
				$message = $data['EmailContent']['content'];

				$expression = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$/";
				$userEmails = explode(',', $userEmails);

				$temp = '';
				foreach ($userEmails as $email)
				{
					if (!preg_match($expression, $email))
					{
						$temp .= '<strong>' . $email . '</strong> , ';
					}
				}
				if (!empty($temp))
				{
					$this->Session->setFlash(__('Incorrect mail addresses : ' . $temp ), 'flash_error');
				} else
				{
					//prd($data);
					$this->loadModel('EmailContent');
					$emailObj = new EmailContent();

					if ($emailObj->ComposeToManyMail($subject, $message, $userEmails))
					{
						$this->Session->setFlash(__('Mail successfully send.'), 'flash_success');
					} else
					{
						$this->Session->setFlash(__('Mail cannot be sent. Please try again'), 'flash_error');
					}
				}
			}
		}
	}
	
	public function admin_ckupload(){
		
		$img = $_FILES['upload']['name'];
		$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
		
		$imgName	=	uniqid().'.'.$ext;
		
		$url = PATH_UPLOAD_FILE.$imgName;
		
		if (($_FILES['upload'] == "none") OR (empty($_FILES['upload']['name'])) ){
		   $message = "No file uploaded.";
		}
		else if ($_FILES['upload']["size"] == 0){
		   $message = "The file is of zero length.";
		}
		else if (($_FILES['upload']["type"] != "image/pjpeg") AND ($_FILES['upload']["type"] != "image/jpeg") AND ($_FILES['upload']["type"] != "image/png")
		AND ($_FILES['upload']["type"] != "video/x-flv")AND ($_FILES['upload']["type"] != "audio/mpeg")){
		  
		   $message = "The image must be in either JPG or PNG format. Please upload a JPG or PNG instead.";
		}
		else if (!is_uploaded_file($_FILES['upload']["tmp_name"])){
		   $message = "You may be attempting to hack our server. We're on to you; expect a knock on the door sometime soon.";
		}
		else {
		  $message = "";
		  $move = @ move_uploaded_file($_FILES['upload']['tmp_name'], $url);
		  if(!$move)
		  {
			  //prd($url);
			 $message = "Error moving uploaded file. Check the script is granted Read/Write/Modify permissions.".$url."";
		  }
		  //$url = "../" . $url;
		}
		$funcNum = $_GET['CKEditorFuncNum'] ;
		$url =  $this->webroot.'files/uploads/'.$imgName;
		echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";	
		exit;
		
	}
        
        
        
        /**
         * Admin Contact Section
         */

        public function admin_contacts() {
            
	}
        
        public function admin_contactgrid() {
        $this->loadModel('Contact');
       // prd($this->request);
        $page = $this->request->query['page'];
        $limit = $this->request->query['rows'];
        $sidx = $this->request->query['sidx'];
        $sord = $this->request->query['sord'];

        if (!$sidx)
            $sidx = 1;

        $order_by = $sidx . ' ' . $sord;

        $conditions = array();
        $conditions['Contact.status !='] = 2;

        if (isset($this->request->query['filters'])) {
            if (!empty($this->request->query['filters'])) {
                $filters = json_decode($this->request->query['filters'], true);

                foreach ($filters['rules'] as $each_filter) {
                    if ($each_filter['field'] == 'id') {
                        $conditions['Cmspage.id'] = Sanitize::clean($each_filter['data']);
                    }
                    if ($each_filter['field'] == 'title') {
                        $conditions['Cmspage.title LIKE'] = '%' . Sanitize::clean($each_filter['data']) . '%';
                    }
                    if ($each_filter['field'] == 'parent_title') {
                        $condition['Cmspage.title LIKE'] = '%' . Sanitize::clean($each_filter['data']) . '%';

                        $CmspageTitle = $this->Cmspage->find('first', array(
                            'conditions' => $condition,
                                )
                        );
                        $conditions['Cmspage.parent_id'] = Sanitize::clean($CmspageTitle['Cmspage']['id']);
                    }
                    if ($each_filter['field'] == 'description') {
                        $conditions['Cmspage.description LIKE'] = '%' . Sanitize::clean($each_filter['data']) . '%';
                    }
                }
            }
        }

        $count = $this->Contact->find('count', array(
            'recursive' => -1,
            'conditions' => $conditions,
                )
        );


        if ($count > 0) {
            $total_pages = ceil($count / $limit);
        } else {
            $total_pages = 0;
        }

        if ($page > $total_pages) {
            $page = $total_pages;
        }

        $start = $limit * $page - $limit;

        $contactList = $this->Contact->find('all', array(
            'conditions' => $conditions,
            'order' => $order_by,
            'limit' => $limit,
            'offset' => $start
                )
        );

        $temp = array();
        $responce->page = $page;
        $responce->total = $total_pages;
        $responce->records = $count;

        $i = 0;

        if (is_array($contactList)) {
            $temp = array();
            foreach ($contactList as $contactData): {
                    //pr($productData);
                    $name = $contactData['Contact']['name'];
                    $email = $contactData['Contact']['email'];
                    $contact = $contactData['Contact']['contact'];
                    
                    $action = '';
                    if ($contactData['Contact']['status'] == 0) {
                        //$action .= '<img title="Click to change status" class="pointer" src="'.$this->webroot.'img/admin/status-red.png" onclick="changeCmsStatus('.$productData['Product']['id'].',0)" />';
                        $action .= '<i title="Click to change status" class="pointer fa fa-circle-o" onclick="changeContactstatus(' . $contactData['Contact']['id'] . ',0)"></i>';
                    } else if ($contactData['Contact']['status'] == 1) {
                        //$action .= '<img title="Click to change status" class="pointer" src="'.$this->webroot.'img/admin/status-green.png" onclick="changeCmsStatus('.$productData['Product']['id'].',1)" />';
                        $action .= '<i title="Click to change status" class="pointer fa fa-circle" onclick="changeContactstatus(' . $contactData['Contact']['id'] . ',1)"></i>';
                    }

                    $action .= '&nbsp;&nbsp;&nbsp;<a href="' . $this->webroot . 'admin/email_contents/editContact/' . $contactData['Contact']['id'] . '" ><i class="fa fa-edit"></i></a> ';
                    $action .= '&nbsp;&nbsp;&nbsp;<i title="Click to delete item" class="pointer fa fa-times-circle" onclick="deleteContact(' . $contactData['Contact']['id'] . ')"></i>';

                    $responce->rows[$i]['id'] = $contactData['Contact']['id'];
                    $responce->rows[$i]['cell'] = array($contactData['Contact']['id'], $name,$email, $contact, $action);
                    $i++;
                }
            endforeach;
        }

        echo json_encode($responce);
        exit;

	}
        
        public function admin_addcontact() {
            $this->loadModel('Contact');
                if (!empty($this->request->data)) {
			
			$data =$this->request->data ;
			
			//prd($data);
			if ($this->Contact->save($data)) {
				$this->Session->setFlash(__('New Contact save success'));
				$this->redirect(array('admin' => true, 'controller' => 'email_contents', 'action' => 'contacts'));
			} else {
				$this->Session->setFlash(__('Error. Please try again'));
			}
		}
	}
        
        public function admin_editContact($id) {
                $this->loadModel('Contact');
                if (!empty($this->request->data)) {
			$data =$this->request->data ;
			//prd($data);
			if ($this->Contact->save($data)) {
				$this->Session->setFlash(__('Contact update success'));
				$this->redirect(array('admin' => true, 'controller' => 'email_contents', 'action' => 'contacts'));
			} else {
				$this->Session->setFlash(__('Error. Please try again'));
			}
		}
                
                $conactData = $this->Contact->findById($id);
                $this->request->data = $conactData;
	}
        
        public function admin_changeContactstatus(){
		$this->loadModel('Contact');
		if($this->request->is('ajax')){
			
			$data['Contact']['id'] = $this->request->data['id'];
			$data['Contact']['status'] = $this->request->data['status'] == 1 ? 0 : 1 ;
				
			if ($this->Contact->save($data)) {
				echo '1';
			} else {
				echo '0';
			}
			exit;
		}
		else{
			
		}
	}
    
    public function admin_deleteContact() {
        $this->loadModel('Contact');
	if($this->request->is('ajax')){
			$data = array();
			$data['Contact']['id'] = $this->request->data['id'];
			$data['Contact']['status'] = '2';
			
				$this->Contact->save($data);
			exit;
		}
		else{
			$this->Session->setFlash(__('Invalid request'), 'flash_error');
			$this->redirect(array('admin' => true, 'controller' => 'Product','action' =>'index'));
		}
    }

}
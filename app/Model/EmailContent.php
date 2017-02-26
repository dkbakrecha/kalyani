<?php
App::uses('AppModel', 'Model');

class EmailContent extends AppModel {

	public $name = 'EmailContent';

	public $validate = array();
	
	public function forgetPassword($name, $email, $link){
		
		$mail_content = $this->getMailContent('FORGOT_PASSWORD');
	
		if(is_array($mail_content) && !empty($mail_content)){
			$from = $mail_content['from'];
			
			$subject = $mail_content['subject'];
			$mail_refined_content=$mail_content['message'];
			
			$myLink='<a class="" href="'.$link.'">'.$mail_content['link_title'].'</a>';
			
			$mail_refined_content = str_replace('{{receiver}}',$name,$mail_refined_content);
			$mail_refined_content = str_replace('{{link}}',$myLink,$mail_refined_content);
 
			$this->__SendMail($email,$subject,$mail_refined_content,$from);
		
		}
		
	}
	
        public function contactUsMail($userName,$userEmail,$message,$contactNo){
		
		$mail_content = $this->getMailContent('CONTACT_US');
		
		if(is_array($mail_content) && !empty($mail_content)){
			
			$userName = ucwords($userName);
			$userEmail= strtolower($userEmail);
			
			$mail_refined_content=$mail_content['content'];
			$mail_refined_content = str_replace('{{name}}',$userName,$mail_refined_content);
			$mail_refined_content = str_replace('{{email}}',$userEmail,$mail_refined_content);
			$mail_refined_content = str_replace('{{message}}',$message,$mail_refined_content);
                        $mail_refined_content = str_replace('{{cnumber}}',$contactNo,$mail_refined_content);
			
			$admin_email = strtolower(Configure::read('ADMIN_MAIL'));
						
			App::uses('CakeEmail', 'Network/Email');
		
                        $cake_email = new CakeEmail();
			$cake_email->config('default');
			$cake_email->to($admin_email);
			$cake_email->from($userEmail);
                        $cake_email->replyTo("no-replay@samrudhexim.com", "samrudhexim");
			$cake_email->subject("User query");
			$cake_email->template('default', 'default');
			$cake_email->emailFormat('html');
			$cake_email->viewVars(array(
				'content' => $mail_refined_content,
			));
			
			
                        //prd($cake_email->send());
                        //print_r ($cake_email);exit;
			
			try {
				//if(CakeRequest::host()=='192.168.1.2'){
					//print_r ($cake_email);exit;
				//	return true;
				//}
				
			$cake_email->send();
			} catch (Exception $e) {
				return false;
			}
			return true;
			
		}
		
	}
	
	private function getMailContent($unique_name){
		
		$conditions = array(
			'conditions' => array('EmailContent.unique_name LIKE' => $unique_name,'EmailContent.status'=>1), //array of conditions
			'recursive' => -1 //int
		);
		
		$mail_content = $this->find('first', $conditions);
		
		if(is_array($mail_content) && !empty($mail_content)){
			return $mail_content['EmailContent'];
		}else{
			return false;
		}
		
	}
	
	public function __SendMail($to, $subject, $content,$from){
		if(empty($from)) 
		{
			strtolower(Configure::read('ADMIN_MAIL'));
		}
		$to = strtolower($to);
		
		App::uses('CakeEmail', 'Network/Email');
		
		$cake_email = new CakeEmail();
		$cake_email->config('default');
		$cake_email->to($to);
		$cake_email->from($from);
		$cake_email->subject($subject);
		$cake_email->template('default', 'mail_content');
		$cake_email->emailFormat('html');
		$cake_email->viewVars(array(
			'mail_message' => $content,
		));
		
			//print_r ($content);
		
		try {
			//if(CakeRequest::host()=='192.168.1.2'){
				//print_r ($cake_email);exit;
			//	return true;
			//}
			
		$cake_email->send();
		} catch (Exception $e) {
			return false;
		}
		return true;
	}
	
	public function beforeSave($options = array()) {
		foreach($this->data[$this->alias] as $key=>$val){
			$this->data[$this->alias][$key] = trim($val);
		}
		return true;
	}
	
	
}
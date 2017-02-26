<?php
/**
 * Email Content Model
 * @author: Jaya Parwani
 * @created: 08-09-2014 
 */

App::uses('AppModel', 'Model');
App::uses('CakeEmail', 'Network/Email');

class EmailContent extends AppModel 
{
	
	public $validate = array(
		'title' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'Title is required'
			),
			'alphaNumeric' => array(
				'rule' => 'alphaNumericSpace',
				'message' => "Please enter only alphabet.",
			)
		),
		
		'subject' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'Subject is required'
			),
			'alphaNumeric' => array(
				'rule' => 'alphaNumericSpace',
				'message' => "Please enter a valid subject.",
			)
		),
		
		'content' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'Content is required'
			),
		),
  	);
		
	public function beforeValidate ($options = array()) 
	{
		return parent::beforeValidate($options);
	}
	
	public function beforeSave($options = array()) 
	{
		// Capitalize first letter of the title
		if ( isset($this->data[$this->alias]['title']) ) {
			$this->data[$this->alias]['title'] = ucwords($this->data[$this->alias]['title']);
		}
		return true;
	}
	
	public function getDataByKey ($key=null) {
		
		if ($key) {
			$data =	$this->find('first', array(
							'conditions' => array( 
										'status !=' => '2',
										'unique_name ' => $key
										)
					));
			$data		=	$data[$this->alias];	
		}
		
		if ( isset($data) && is_array($data) ) {
			return $data;
		} else {
			return false;
		}
	}
		
	public function forgotPassword ($email='', $name='', $pass=''){
		$email_record = $this->getDataByKey('FORGOT_PASSWORD');
		
		if ( is_array($email_record) && !empty($email_record) ) {
			
			$sub = $email_record['subject'];
			$content = $email_record['content'];
			
			$content = str_replace("{{receiver}}", '<b>'.$name.'</b>', $content);
			$content = str_replace("{{username}}", '<b>'.$email.'</b>', $content);
			$content = str_replace("{{password}}", '<b>'.$pass.'</b>', $content);
		
			if($this->_sendMail($email, $sub, $content))
			{
				return TRUE;
			}
		}		
		return FALSE;
	}
	
	public function ComposeToManyMail ($subject = NULL, $message = NULL, $userEmails = NULL){
		$email_record = $this->getDataByKey('COMPOSE_MAIL');
		
		if ( is_array($email_record) && !empty($email_record) ) {
			
			
			if(!empty($subject)){
				$sub = $subject;
			}else{
				$sub = $email_record['subject'];
			}
			
			$content = $email_record['content'] . "<br>" . $message;
			
			foreach($userEmails as $email){
				$content = str_replace("{{receiver}}", '<b>'.$email.'</b>', $content);
				$this->_sendMail($email, $sub, $content);
			}
			return TRUE;
		}		
		return FALSE;
	}
	
	
	public function contactUsMail($userName,$userEmail,$userSubject,$message){
		
		$mail_content = $this->getDataByKey('CONTACT_US');
		
		if(is_array($mail_content) && !empty($mail_content)){
			
			$userName = ucwords($userName);
			$userEmail= strtolower($userEmail);
			$subject = $mail_content['subject'] . " - " . $userSubject;
			
			$mail_refined_content=$mail_content['content'];
			$mail_refined_content = str_replace('{{name}}',$userName,$mail_refined_content);
			$mail_refined_content = str_replace('{{email}}',$userEmail,$mail_refined_content);
			$mail_refined_content = str_replace('{{message}}',$message,$mail_refined_content);
			//prd($mail_refined_content);
			$admin_email = strtolower(Configure::read('ADMIN_MAIL'));
			
			$this->__SendMail($admin_email,$subject,$mail_refined_content);			
			return true;
			
		}
		
	}
	
	
	public function _sendMail($to, $sub='', $contents='', $attachments=null, $cc=null, $bcc=null){
		
		$Email = new CakeEmail();
		$Email->config('default');		
		$Email->emailFormat('html');
		$Email->subject($sub);
		$Email->template('default', 'default');
		$Email->to($to);
		$Email->from(array('admin@admin.com' => 'My Chemistry Resources'));
		
		if(!empty($cc)) {
			$Email->cc($cc);
		}
		
		if(!empty($bcc)) {
			$Email->bcc($bcc);
		}
		
		if(!empty($attachments) && $attachments!='' && is_array($attachments)){
			$Email->attachments($attachments);
		}
						
		$Email->viewVars(array('mailContents' => $contents));
		//prd($Email);
		try{
			if($Email->send()){
				return true;
			} 
			return false;
		} catch(Exception $e){
			return $e->getMessage();
		}
	}
}

<?php
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
class NonmovinginventorisController extends AppController
{
	 var $helpers = array('Html', 'Form');
	 public $components = array(
    'Paginator',
    'DebugKit.Toolbar',
    'Session','Cookie'
 	);
	
	public function index()
	{
		$this->layout='index_layout';
		$this->loadmodel('Categorie');
		$this->set('categories_arr', $this->Categorie->find('all'));
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function user_index()
	{
		$this->layout='user_index_layout';
		$this->loadmodel('Categorie');
		$this->set('categories_arr', $this->Categorie->find('all'));
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function enquiry_submit()
	{
		$this->layout='ajax_layout';
		$name=$this->request->query('name');
		$email=$this->request->query('email');
		$phone_no=$this->request->query('phone');
		$message=$this->request->query('message');
		$this->loadmodel('Enquiry');
		$this->Enquiry->saveAll(array('name'=>$name,'email'=>$email,'phone_no'=>$phone_no,'message'=>$message));	
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function ajax_php_file() 
	{
		$this->layout='ajax_layout';
		$save_edit=$this->request->query('save_edit');
	 	$upload_image=$this->request->query('upload_image');
		$removeclass=$this->request->query('removeclass');
		$user_id=$this->Session->read('user_id');
		$date=date('Y-m-d');
		$time=date('h:i:s A');
		$update_id=$this->request->query('update');
		$this->loadmodel('classified_post');
		if($save_edit==1)
		{ 
			if(!empty($this->data['sub_category_id']))
			{
				 $sub_category_id=$this->data['sub_category_id'];
			}
			else
			{
				 $sub_category_id=0;
			}
			
			if($update_id==0)
			{
				$this->classified_post->saveAll(array('user_id'=>$user_id,'sub_category_id'=>$sub_category_id,'category_id' => $this->data['category_id'],'product_name' => $this->data['product_name'],'brand' => $this->data['brand'],'stock' => $this->data['stock'],'year_of_manufacture' => $this->data['year_of_manufacture'],'part_no' => $this->data['part_no'],'city_id' => $this->data['city_id'],'location_address' => $this->data['location_address'],'description' => $this->data['description'],'short_description' => $this->data['short_description'],'available_from' => $this->data['available_from'],'available_to' => $this->data['available_to'],'sku' => $this->data['sku'],'price' => $this->data['price'],'tax_class' => $this->data['tax_class'],'status' => $this->data['status'],'meta_title' => $this->data['meta_title'],'meta_keywords' => $this->data['meta_keywords'],'meta_description' => $this->data['meta_description'],'date'=>$date,'time'=>$time));
				$classified_post_id = $this->classified_post->getLastInsertID();
				echo "<div id='success' class='note note-success alert-notification'>
										<p>Form Submited Successfully...!!</p></div>";
				?>
				<script>
				$("#update_table").remove();
				$("#tab_general").append("<input type='hidden' value='<?php echo $classified_post_id; ?>' id='update_table'>");
				</script>
                <?php
			}
			else
			{
				$this->classified_post->id=$update_id;
				$this->classified_post->save($this->request->data);
				echo "<div id='success' class='note note-success alert-notification'>
										<p>Form Submited Successfully...!!</p></div>";
			}
		}
		if($upload_image==1)
		{
			if($this->request->form['file']['name'])
			{
				@$trCount=$this->request->query('trCount');
				if($update_id==0)
				{
					$img_name=basename( @$this->request->form['file']['name']);
					$this->classified_post->saveAll(array('photo'=>$img_name,'date'=>$date,'time'=>$time));
					$classified_post_id = $this->classified_post->getLastInsertID();
					
					$target = "images_post/".$user_id."/".$classified_post_id;
					// Check to see if directory already exists
					$exist = is_dir($target);
					if(!$exist) 
					{
						$folder = new Folder();
						$folder->create('images_post' . DS . $user_id . DS . $classified_post_id . DS);
					}
					
					$target=@$target."/".$user_id.$classified_post_id.$trCount.".jpg";
					move_uploaded_file(@$this->request->form['file']['tmp_name'],@$target);
					$img_name=$user_id.$classified_post_id.$trCount.".jpg";
					$this->classified_post->updateAll(array('classified_post.photo'=>"'$img_name'"), array('classified_post.id'=>$classified_post_id));
					?>
					<script>
					var rowCount = $('#tab_images_uploader_filelist tr').length;
					
					$('#tab_images_uploader_filelist tr').last().after('<tr id="' + rowCount + '"><td><a href="<?php echo $this->webroot; echo $target; ?>" class="fancybox-button" data-rel="fancybox-button"><img class="img-responsive" src="<?php echo $this->webroot;  echo $target; ?>" style="height:120px;" alt=""></a></td><td><button  name="' + rowCount + '" class="btn red btn-sm  addclass_function" removeclass="removeclass"><i class="fa fa-times"></i> Remove </button></td></tr>');
					$("#update_table").remove();
					$("#tab_general").append("<input type='hidden' value='<?php echo $classified_post_id; ?>' id='update_table'>");
					
					</script>
					<?php
				}
				else
				{
					$target = "images_post/".$user_id."/".$update_id;
					// Check to see if directory already exists
					$exist = is_dir($target);
					if(!$exist) 
					{
						$folder = new Folder();
						$folder->create('images_post' . DS . $user_id . DS . $update_id . DS);
					}
					
					$img_name=$user_id.$update_id.$trCount.".jpg";
					
					$target=@$target."/".$user_id.$update_id.$trCount.".jpg";
					move_uploaded_file(@$this->request->form['file']['tmp_name'],@$target);
					
					$result_categories= $this->classified_post->find('all', array('conditions' => array('classified_post.id' => $update_id)));
					foreach($result_categories as $res_values)
					{
						$photo[]=$res_values['classified_post']['photo'];	
					}
					$photo[]=$img_name;
					$photos=implode(',', $photo);
					$this->classified_post->updateAll(array('classified_post.photo'=>"'$photos'"), array('classified_post.id'=>$update_id));
					?>
					<script>
					var rowCount = $('#tab_images_uploader_filelist tr').length;
					$('#tab_images_uploader_filelist tr').last().after('<tr id="' + rowCount + '"><td><a href="<?php echo $this->webroot; echo $target; ?>" class="fancybox-button" data-rel="fancybox-button"><img class="img-responsive" src="<?php echo $this->webroot;  echo $target; ?>" style="height:120px;" alt=""></a></td><td><button name="' + rowCount + '" class="btn red btn-sm addclass_function" removeclass="removeclass"><i class="fa fa-times"></i> Remove </button></td></tr>');
					
					</script>
                    <?php
				}
				echo "<div id='success' class='note note-success alert-notification'>
										<p>Image Uploaded Successfully...!!</p></div>";
			}
			else
			{
				echo "<div id='success' class='note note-danger alert-notification'>
										<p>Please select image...!!</p></div>";
			}
			?>
            <script>
			$("#tab_images_uploader_container").empty();
					$("#tab_images_uploader_container").append('<div class="fileinput fileinput-new" data-provides="fileinput"><div class="input-group input-large"><div class="form-control uneditable-input span3" data-trigger="fileinput"><i class="fa fa-file fileinput-exists"></i>&nbsp;<span class="fileinput-filename"></span></div><span class="input-group-addon btn default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span><input name="file" id="file" type="file"></span><a href="#" class="input-group-addon btn red fileinput-exists" id="remove" data-dismiss="fileinput"> Remove </a></div><br/><button  id="upload_image"  class="btn green addclass_function" ><i class="fa fa-share"></i> Upload Files</button></div>');
					</script>
                    <?php
		}
		if($removeclass=='removeclass')
		{
			@$name=$this->request->query('name');
			$target = "images_post/".$user_id."/".$update_id;
			$target=@$target."/".$user_id.$update_id.$name.".jpg";
			$img_name=$user_id.$update_id.$name.".jpg";
			
			$file = new File($target, false, 0777);
			if($file->delete()) 
			{
				$photo_store=array();
				$result_categories= $this->classified_post->find('all', array('conditions' => array('classified_post.id' => $update_id)));
				foreach($result_categories as $res_values)
				{
					$photo=$res_values['classified_post']['photo'];	
				}
				$explode_photos=explode(",", $photo);
				foreach($explode_photos as $data_img)
				{
					if($data_img != $img_name)
					{
						if(!empty($data_img))
						{
							$photo_store[]=$data_img;
						}
					}
				}
				$photos=implode(',',$photo_store);
				$this->classified_post->updateAll(array('classified_post.photo'=>"'$photos'"), array('classified_post.id'=>$update_id));
			   echo "<div id='success' class='note note-success alert-notification'>
										<p>Image Remove Successfully...!!</p></div>";
			}
		}
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function contact_us() 
	{
		$this->layout='index_layout';
		
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function about_us() 
	{
		$this->layout='index_layout';
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function faqs() 
	{
		$this->layout='index_layout';
	
		$this->loadmodel('Faq');
		$this->set('ftc_faq', $this->Faq->find('all'));
	
	
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function term_and_condition() 
	{
		$this->layout='index_layout';
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function find_city_arr($states_id) 
	{
				
			$this->loadmodel('city_name');
			$conditions=array('states_id' => $states_id);
			
		$find_city_arr_ftc=$this->city_name->find('all',array('conditions'=>$conditions,'fields'=>array('city_name','id')));
		
	
		return $find_city_arr_ftc;
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function ecommerce_products() 
	{
		$this->layout='user_index_layout';
		$user_id=$this->Session->read('user_id');
		$this->loadmodel('categorie');
		$this->set('arr_categories',$this->categorie->find('all'));
		
		$this->loadmodel('state');
		$this->set('arr_states',$this->state->find('all'));
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function ecommerce_new_post() 
	{
		$this->layout='user_index_layout';
		$user_id=$this->Session->read('user_id');
		$this->loadmodel('categorie');
		$this->set('arr_categories',$this->categorie->find('all'));
		
		$this->loadmodel('state');
		$this->set('arr_states',$this->state->find('all'));
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public	function fetch_sub_category_ajax() 
	{
		$this->layout='ajax_layout';
		$category_id=$this->request->query('category_id');		
		$this->loadmodel('sub_categorie');
		$conditions=array('sub_categorie.categories_id' => $category_id);
		$result3=$this->sub_categorie->find('all',array('conditions'=>$conditions));
		$this->set('sub_categories_ARR',$result3);
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function register() 
	{
		$this->layout='index_layout';
		$this->loadmodel('category_of_organization');
		$this->set('result_category_of_organization',$this->category_of_organization->find('all')); 
		
		$this->loadmodel('organization_type');
		$this->set('result_organization_type',$this->organization_type->find('all')); 
		if (isset($this->request->data['final_submit']))
		{
			@$organization_name=$this->request->data['organization_name'];
			@$address_for_correspondence=$this->request->data['address_for_correspondence'];
			@$year_of_incorporation=$this->request->data['year_of_incorporation'];
			@$website_of_organization=$this->request->data['website_of_organization'];
			@$name_of_person=$this->request->data['name_of_person'];
			@$designation=$this->request->data['designation'];
			@$mobile_no=$this->request->data['mobile_no'];
			@$phone_no=$this->request->data['phone_no'];
			@$email_id=$this->request->data['email_id'];
			@$tin_no=$this->request->data['tin_no'];
			@$pan_no=$this->request->data['pan_no'];
			@$category_of_organization=$this->request->data['category_of_organization'];
			@$type_of_organization=$this->request->data['type_of_organization'];
			@$name_of_products=$this->request->data['name_of_products'];
	
			$type_of_organization_data=implode(',',$type_of_organization);
			
			$this->loadmodel('Login');
			$conditions=array("email_id"=>$email_id);
			$result_login=$this->Login->find('all',array('conditions'=>$conditions));
			
			if(sizeof($result_login)==0)
			{
				$this->loadmodel('Login');
				$this->Login->saveAll(array('designation_id' => 2,'email_id' => $email_id,'password' => md5('hello')));
				
				 $getLastInsertID = $this->Login->getLastInsertID();
			
				
			$this->loadmodel('Registration');
			
			$this->Registration->saveAll(array('login_id' => $getLastInsertID,'organization_name' => $organization_name,'address_for_correspondence' => $address_for_correspondence,'year_of_incorporation' => $year_of_incorporation, 'website_of_organization' => $website_of_organization, 'name_of_person' => $name_of_person,'designation' => $designation,'mobile_no' => $mobile_no, 'phone_no' => $phone_no, 'tin_no' => $tin_no,'pan_no' => $pan_no,'category_of_organization' => $category_of_organization,'type_of_organization' => $type_of_organization_data,'name_of_products' => $name_of_products, 'date_time' => date('Y-m-d h:i:s')));
			
			$this->Session->setFlash(__('Your registration has been saved.'));
			return $this->redirect(array('action' => 'index'));
			
			}
			else
			{
				$this->Session->setFlash(__('This email id is allready exists.'));
				
			}
			exit;
		}
	///////////////// submit register ///////////////////////
    }
	///////////////// submit login ///////////////////////
	public function login() 
	{
		$this->layout='login_layout';
		
			if($this->request->is('post')) 
			{
				$email_id=htmlentities($this->request->data["email_id"]);
				$password=htmlentities($this->request->data["password"]);
				
				$md5ed_password = md5($password);
				$this->loadmodel('login');
						
				$conditions=array("email_id" => $email_id, "password" => $md5ed_password);
				$result = $this->login->find('all',array('conditions'=>$conditions));
				$n = sizeof($result);
				if($n==1)
				{
					$user_id=$result[0]['login']['id'];
					$designation_id=$result[0]['login']['designation_id'];
					
					$this->Session->write('user_id', $user_id);
					$this->Session->write('designation_id', $designation_id);
					$this->redirect(array('action' => 'user_index'));
				}
				else
				{
					$this->loadmodel('login');
					$conditions=array("email_id" => $email_id);
					$result1 = $this->login->find('all',array('conditions'=>$conditions));
					 $n1 = sizeof($result1);
					if($n1>0)
					{ 
						 $this->set('wrong', 'Password is Incorrect');
					}
					else
					{
							
						$this->set('wrong', 'Username and Password are Incorrect');
					}	
				}
			}
	///////////////// submit login ///////////////////////
    }
	
	function categories_details_asc_desc_sort()
	{
		$this->layout='ajax_layout';
	
		$limit=10;	
		$order_by=$this->request->query('sort_status');		
		 $categories_id=$this->request->query('categories_id');
		$min_price=$this->request->query('min_price');		
		$max_price=$this->request->query('max_price');		
		$search_by_meta=$this->request->query('search_by_meta');		
		$sub_categories_id=$this->request->query('sub_categories_id');		

		if(!empty($search_by_meta ))
		{
			$this->set('search_by_meta',$search_by_meta);
			$this->set('categories_id',$categories_id);
			$this->set('sub_categories_id',$sub_categories_id);
			$this->set('order_by',$order_by);
			$this->set('max_price',$max_price);
			$this->set('min_price',$min_price);
			
		
			
			$this->loadmodel('Classified_post');
			
			if(!empty($max_price) && !empty($min_price) )
			{
				$conditions =array ('Classified_post.status' => "1",'Classified_post.price between ? and ?' => array($min_price, $max_price),
                            'OR' => array(
								array('Classified_post.short_description LIKE' => "%$search_by_meta%"),
            					array('Classified_post.description LIKE' => "%$search_by_meta%"),
                            ),
                        );
				
				$rst_classified_posts=$this->Classified_post->find('all', array('conditions' => $conditions, 'order'=>$order_by,'limit'=>$limit));
			}
			else
			{
				$conditions =array ('Classified_post.status ' => "1",
                            'OR' => array(
								array('Classified_post.short_description LIKE' => "%$search_by_meta%"),
            					array('Classified_post.description LIKE' => "%$search_by_meta%"),
                            ),
                        );
				
				$rst_classified_posts=$this->Classified_post->find('all', array('conditions' => $conditions, 'order'=>$order_by,'limit'=>$limit));
			}
		
		$this->set('classified_posts_arr',$rst_classified_posts);
			
		
		}
		else if(!empty($categories_id))
		{	
			/*	$this->loadmodel('Categorie');
				@$categories_ftc=$this->Categorie->query("SELECT categories from `Categorie` WHERE `id`='$categories_id' ");
				$categories_nm=$categories_ftc[0]['Categorie']['categories'];
				
			//	$this->set('categories_nm',$categories_nm);
			//	$this->set('categories_id',$categories_id);*/
				$this->loadmodel('Categorie');
				$this->set('categories_nm', $this->Categorie->findById($categories_id));
				$this->set('categories_id',$categories_id);
				$this->set('order_by',$order_by);
				$this->set('order_by',$order_by);
				$this->set('max_price',$max_price);
				$this->set('min_price',$min_price);
				
			
				$this->loadmodel('Sub_categorie');
				$result_sub_categories= $this->Sub_categorie->find('all', array('conditions' => array('Sub_categorie.categories_id' => $categories_id)));
				$this->set('sub_categories_arr',$result_sub_categories);
				foreach($result_sub_categories as $res_values)
				{
					$sub_categories_ftc[]=$res_values['Sub_categorie']['id'];	
				}
				
			
				$this->loadmodel('Classified_post');
				
				if(!empty($max_price) && !empty($min_price) )
				{
					if(!empty($sub_categories_ftc))
					{
						@$rst_classified_posts=$this->Classified_post->find('all', array(
						'conditions' => array(
						'Classified_post.sub_category_id' =>$sub_categories_ftc,'Classified_post.status' => "1",
						'Classified_post.price between ? and ?' => array($min_price, $max_price)
						),
						'order'=>$order_by,
						'limit'=>$limit,
						));
					}
					else
					{
						@$rst_classified_posts=$this->Classified_post->find('all', array(
						'conditions' => array(
						'Classified_post.category_id' =>$categories_id,'Classified_post.status' => "1",
						'Classified_post.price between ? and ?' => array($min_price, $max_price)
						),
						'order'=>$order_by,
						'limit'=>$limit,
						));
					}
			
				}
				else
				{
					if(!empty($sub_categories_ftc))
					{
							@$rst_classified_posts=$this->Classified_post->find('all', array(
						'conditions' => array(
						"Classified_post.sub_category_id" =>$sub_categories_ftc,'Classified_post.status' => "1"
						),
						'order'=>$order_by,
						'limit'=>$limit,
						));
					}
					else
					{
						@$rst_classified_posts=$this->Classified_post->find('all', array(
						'conditions' => array(
						"Classified_post.category_id" =>$categories_id,'Classified_post.status' => "1"
						),
						'order'=>$order_by,
						'limit'=>$limit,
						));
					}
				}
			$this->set('classified_posts_arr',$rst_classified_posts);
		}
		else if(isset($sub_categories_id))
		{
		$sub_categories_id=$this->request->query('sub_categories_id');
		$order_by=$this->request->query('sort_status');
	
			$this->loadmodel('Sub_categorie');
			@$sub_categories_ftc=$this->Sub_categorie->find('all', array('conditions' => array('Sub_categorie.id'=>$sub_categories_id)));
			
			$categories_id=$sub_categories_ftc['0']['Sub_categorie']['categories_id'];
			$sub_categories_nm=$sub_categories_ftc['0']['Sub_categorie']['sub_categories'];
			$this->loadmodel('Categorie');
			@$result_sub_categories=$this->Categorie->find('all', array('conditions' => array('Categorie.id'=>$categories_id)));
			$categories_nm=$result_sub_categories[0]['Categorie']['categories'];
			$categories_id="";
			
			$this->set('categories_nm',$categories_nm);
			$this->set('categories_id',$categories_id);
				
			$this->set('sub_categories_nm',$sub_categories_nm);
			
			$this->set('sub_categories_id',$sub_categories_id);
			$this->set('order_by',$order_by);
			$this->set('max_price',$max_price);
				$this->set('min_price',$min_price);
				    
			
			
			$this->loadmodel('Classified_post');
				
				if(!empty($max_price) && !empty($min_price) )
				{
				@$rst_classified_posts=$this->Classified_post->find('all', array(
				'conditions' => array(
				'Classified_post.sub_category_id' =>$sub_categories_id,'Classified_post.status' => "1",
				'Classified_post.price between ? and ?' => array($min_price, $max_price)
				),
				'order'=>$order_by,
				'limit'=>$limit,
				));

				}
				else
				{
					@$rst_classified_posts=$this->Classified_post->find('all', array(
				'conditions' => array(
				"Classified_post.sub_category_id" =>$sub_categories_id,'Classified_post.status' => "1"
				),
				'order'=>$order_by,
				'limit'=>$limit,
				));
					
				}
				
			$this->set('classified_posts_arr',$rst_classified_posts);
			
			
		}
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
	 function categories_details() 
	{
		$this->layout='index_layout';

 		$limit=10;	
 		$start_next=$limit+1;	
		$categories_id=$this->request->query('categories_id');
		$search_by_meta=$this->request->query('search_by_meta');		
		$sub_categories_id=$this->request->query('sub_categories_id');		
		
		
		if(!empty($search_by_meta ))
		{
			 $search_by_meta=$this->request->query('search_by_meta');
			 $order_by='id DESC';
			$this->set('search_by_meta',$search_by_meta);
		
						$this->loadmodel('Classified_post');
				
						$conditions =array ('Classified_post.status' => "1",
                            'OR' => array(
								array('Classified_post.short_description LIKE' => "%$search_by_meta%"),
            					array('Classified_post.description LIKE' => "%$search_by_meta%"),
                            ),
                        );
				
				$rst_classified_posts=$this->Classified_post->find('all', array('conditions' => $conditions, 'order'=>$order_by,'limit'=>$limit));
				
				$rst_classified_posts_next=$this->Classified_post->find('all', array('conditions' => $conditions, 'order'=>$order_by,'limit'=>1,'offset' => $start_next));
			
		
		}
		else if(!empty($categories_id))
		{
			
				$categories_id=$this->request->query('categories_id');
				$order_by='id DESC';
		
				$this->loadmodel('Categorie');
				$this->set('categories_nm', $this->Categorie->findById($categories_id));
				$this->set('categories_id',$categories_id);
				$this->set('order_by',$order_by);
			
				$this->loadmodel('Sub_categorie');
				$result_sub_categories= $this->Sub_categorie->find('all', array('conditions' => array('Sub_categorie.categories_id' => $categories_id)));
				$this->set('sub_categories_arr',$result_sub_categories);
				foreach($result_sub_categories as $res_values)
				{
					$sub_categories_ftc=$res_values['Sub_categorie']['id'];	
				}
				
				$this->loadmodel('Classified_post');
				if(!empty($sub_categories_ftc) && !empty($sub_categories_id))
				{
					
					@$rst_classified_posts=$this->Classified_post->find('all', array('conditions' => array('Classified_post.sub_category_id' =>$sub_categories_ftc, 'Classified_post.status' => "1"), 'order'=>$order_by, 'limit'=>$limit));
				
				@$rst_classified_posts_next=$this->Classified_post->find('all', array('conditions' => array('Classified_post.sub_category_id' =>$sub_categories_ftc,'classified_post.status' => "1"), 'order'=>$order_by, 'limit'=>1, 'offset' => $start_next));
				}
				else
				{
					
					@$rst_classified_posts=$this->Classified_post->find('all', array('conditions' => array('Classified_post.category_id' =>$categories_id, 'Classified_post.status' => "1"), 'order'=>$order_by, 'limit'=>$limit));
				
					@$rst_classified_posts_next=$this->Classified_post->find('all', array('conditions' => array('Classified_post.category_id' =>$categories_id,'Classified_post.status' => "1"), 'order'=>$order_by, 'limit'=>1, 'offset' => $start_next));
				}
				
			
		}
		else if(isset($sub_categories_id))
		{
			$sub_categories_id=$this->request->query('sub_categories_id');
			$order_by='id DESC';
		
			$this->loadmodel('Sub_categorie');
			$sub_categories_ftc=$this->Sub_categorie->findById($sub_categories_id);
			$categories_id=$sub_categories_ftc['Sub_categorie']['categories_id'];
			$sub_categories_nm=$sub_categories_ftc['Sub_categorie']['sub_categories'];
			
			
				
			$result_sub_categories= $this->Sub_categorie->find('all', array('conditions' => array('Sub_categorie.categories_id' => $categories_id)));
			$this->set('sub_categories_arr',$result_sub_categories);
			foreach($result_sub_categories as $res_values)
			{
				$sub_categories_ftc[]=$res_values['Sub_categorie']['id'];	
			}
					
	
			$this->loadmodel('Categorie');
			$result_sub_categories=$this->Categorie->findById($categories_id);
			$categories_nm=$result_sub_categories['Categorie']['categories'];
			
			$categories_id_blank="";
			$this->set('categories_nm',$categories_nm);
			$this->set('categories_id',$categories_id_blank);
			$this->set('categories_id_sub',$categories_id);
			$this->set('sub_categories_nm',$sub_categories_nm);
			$this->set('sub_categories_id',$sub_categories_id);
			$this->set('order_by',$order_by);
			
			$this->loadmodel('Classified_post');
			@$rst_classified_posts=$this->Classified_post->find('all', array(
			'conditions' => array(
			'Classified_post.sub_category_id' =>$sub_categories_id,
			'Classified_post.status' => "1"
			),
			'order'=>$order_by,
			'limit'=>$limit,
			));
			
			@$rst_classified_posts_next=$this->Classified_post->find('all', array(
			'conditions' => array(
			'Classified_post.sub_category_id' =>$sub_categories_id,
			'Classified_post.status' => "1"
			),
			'order'=>$order_by,
			'limit'=>1,
			'offset' => $start_next,
			));
		}
			
		@$arr_size_cnt=sizeof($rst_classified_posts_next);
		if($arr_size_cnt>0)
		{
			?>
            
			<input id="past_available1" value="1" type="hidden" />
            <?php
		}
		else
		{
			?>
            
			<input id="past_available1" value="0" type="hidden" />
            <?php
		}
			
		@$this->set('classified_posts_arr',$rst_classified_posts);
		
	
	
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function find_city_states_sub_category($city_id,$sub_category_id)
	{
		$this->loadmodel('City_name');
		$conditions=array('id' => $city_id);
		$result=$this->City_name->find('all',array('conditions'=>$conditions,'fields'=>array('city_name','states_id')));
		foreach($result as $data)
		{
			$city_name=$data['City_name']['city_name'];
			$states_id=$data['City_name']['states_id'];
		}
		
		$this->loadmodel('State');
		$conditions=array("id" =>@$states_id);
		$result2=$this->State->find('all',array('conditions'=>$conditions,'fields'=>array('states')));
		foreach($result2 as $data)
		{
			$states=$data['State']['states'];
		}
		$city_states_name=@$city_name.' ('.@$states.')';
	
		$this->loadmodel('Sub_categorie');
		$conditions=array('Sub_categorie.id' => $sub_category_id);

		@$result3=$this->Sub_categorie->find('all',array('conditions'=>$conditions,'fields'=>array('sub_categories','categories_id')));
	 	@$sub_categoriess=$result3[0]['Sub_categorie']['sub_categories'];
	  	@$categories_id=$result3[0]['Sub_categorie']['categories_id'];
	
		$this->loadmodel('Categorie');
		@$conditions=array('Categorie.id' => $categories_id);

		@$result4=$this->Categorie->find('all',array('conditions'=>$conditions,'fields'=>array('categories')));
	 	@$categories=$result4[0]['Categorie']['categories'];
	
 		$xxx=array(@$city_name,@$states,@$sub_categoriess,@$categories,@$categories_id);
		return $xxx;
	}
	function caregories_details_scroll() 
	{
		$this->layout='ajax_layout';
  		$page_id=$this->request->query('page_id');
		$order_by=$this->request->query('order_by');		
		$min_price=$this->request->query('min_price');		
		$max_price=$this->request->query('max_price');		
		$categoriesid=$this->request->query('categorieid');
		$sub_categories_id=$this->request->query('sub_categories_id');
		$search_by_meta=$this->request->query('search_by_meta');
		
		
		$limit=10;
		
		$new_page_id=$page_id+1;
//		$start = ($new_page_id-1)*$limit;
		$start = ($new_page_id-1)*$limit;
		$this->set('page_id',$page_id);
		
		$next_page_start=$start+ $limit +1;
		if(!empty($categoriesid))	
		{
		
			$this->loadmodel('Sub_categorie');
			$result_sub_categories= $this->Sub_categorie->find('all', array('conditions' => array('Sub_categorie.categories_id' => $categoriesid)));
			//@$result_sub_categories=$this->Sub_categorie->query("select id from `sub_categories` where categories_id='$categories_id' ");
			$this->set('sub_categories_arr',$result_sub_categories);
	
			foreach($result_sub_categories as $res_values)
			{
				$sub_categories_ftc[]=$res_values['Sub_categorie']['id'];	
			}
			
			$this->loadmodel('Classified_post');
			if(!empty($max_price) && !empty($min_price) )
			{
			
				@$rst_classified_posts=$this->Classified_post->find('all', array(
				'conditions' => array(
				'Classified_post.sub_category_id' =>$sub_categories_ftc,'Classified_post.status' => "1",
				'Classified_post.price between ? and ?' => array($min_price, $max_price)
				),
							'order'=>$order_by,
							'limit'=> $limit,
							'offset' => $start,
					));
					
					
						@$rst_classified_posts_next=$this->Classified_post->find('all', array(
					'conditions' => array(
				'Classified_post.sub_category_id' =>$sub_categories_ftc,'Classified_post.status' => "1",
				'Classified_post.price between ? and ?' => array($min_price, $max_price)
				),
							'order'=>$order_by,
							'limit'=> 1,
							'offset' => $next_page_start,
					));
					
					
				}
				else
				{
							@$rst_classified_posts=$this->Classified_post->find('all', array(
						'conditions' => array(
							"Classified_post.sub_category_id" =>$sub_categories_ftc,'Classified_post.status' => "1"
							),
							'order'=>$order_by,
							'limit'=> $limit,
							'offset' => $start,
					));
					
					
						@$rst_classified_posts_next=$this->Classified_post->find('all', array(
						'conditions' => array(
							"Classified_post.sub_category_id" =>$sub_categories_ftc,'Classified_post.status' => "1"
							),
							'order'=>$order_by,
							'limit'=> 1,
							'offset' => $next_page_start,
					));
					
					
			
				}
			
				$this->set('classified_posts_arr_ajax',$rst_classified_posts);
				
				
					
		}
		
		else if(!empty($sub_categories_id))	
		{
			
				
				$this->loadmodel('Classified_post');
			
			
			
		
				if(!empty($max_price) && !empty($min_price) )
				{
				
						@$rst_classified_posts=$this->classified_posts->find('all', array(
					'conditions' => array(
				'Classified_post.sub_category_id' =>$sub_categories_id,'Classified_post.status' => "1",
				'Classified_post.price between ? and ?' => array($min_price, $max_price)
				),
							'order'=>$order_by,
							'limit'=> $limit,
							'offset' => $start,
					));
					
					
					@$rst_classified_posts_next=$this->Classified_post->find('all', array(
					'conditions' => array(
				'Classified_post.sub_category_id' =>$sub_categories_id,'Classified_post.status' => "1",
				'Classified_post.price between ? and ?' => array($min_price, $max_price)
				),
							'order'=>$order_by,
							'limit'=>1,
							'offset' => $next_page_start,
					));
					
					
					
					@$rst_classified_posts_next=$this->Classified_post->find('all', array(
						'conditions' => array(
							"Classified_post.sub_category_id" =>$sub_categories_ftc,'Classified_post.status' => "1"
							),
							'order'=>$order_by,
							'limit'=> 1,

							'offset' => $start,
					));
					
				}
				else
				{
							@$rst_classified_posts=$this->Classified_post->find('all', array(
						'conditions' => array(
							"Classified_post.sub_category_id" =>$sub_categories_id,'Classified_post.status' => "1"
							),
							'order'=>$order_by,
							'limit'=> $limit,
							'offset' => $start,
					));
					
					
						@$rst_classified_posts_next=$this->Classified_post->find('all', array(
						'conditions' => array(
							"Classified_post.sub_category_id" =>$sub_categories_id,'Classified_post.status' => "1"
							),
							'order'=>$order_by,
						'limit'=>1,
							'offset' => $next_page_start,
					));
					
					
						
					
				}
		
				$this->set('classified_posts_arr_ajax',$rst_classified_posts);
				
			
		}	
		else if(!empty($search_by_meta))	
		{
			
			
				$this->loadmodel('Classified_post');
			
				if(!empty($max_price) && !empty($min_price) )
				{
					$conditions =array ('Classified_post.status' => "1",'Classified_post.price between ? and ?' => array($min_price, $max_price),
                            'OR' => array(
								array('Classified_post.short_description LIKE' => "%$search_by_meta%"),
            					array('Classified_post.description LIKE' => "%$search_by_meta%"),
                            ),
                        );
				
				$rst_classified_posts=$this->Classified_post->find('all', array('conditions' => $conditions, 'order'=>$order_by,'limit'=>$limit,'offset' => $start));
				$rst_classified_posts_next=$this->Classified_post->find('all', array('conditions' => $conditions, 'order'=>$order_by,'limit'=>1,'offset' => $next_page_start));
				}
				else
				{
						
					$conditions =array ('Classified_post.status' => "1",
                            'OR' => array(
								array('Classified_post.short_description LIKE' => "%$search_by_meta%"),
            					array('Classified_post.description LIKE' => "%$search_by_meta%"),
                            ),
                        );
				
				$rst_classified_posts=$this->Classified_post->find('all', array('conditions' => $conditions, 'order'=>$order_by,'limit'=>$limit,'offset' => $start));
				$rst_classified_posts_next=$this->Classified_post->find('all', array('conditions' => $conditions, 'order'=>$order_by,'limit'=>1,'offset' => $next_page_start));
			
				}
				$this->set('classified_posts_arr_ajax',$rst_classified_posts);
		

		}	
		@$arr_size_cnt=sizeof($rst_classified_posts_next);
		if($arr_size_cnt>0)
		{
			?>
			<input id="past_available<?php echo $new_page_id ; ?>" value="1" type="hidden" />
            <?php
		}
		else
		{
			?>
			<input id="past_available<?php echo $new_page_id ; ?>" value="0" type="hidden" />
            <?php
		}
		
$this->set('new_page_id',$new_page_id);
	}
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	function ads_details() 
	{
		date_default_timezone_set('Asia/kolkata'); 	
		$this->layout='index_layout';
		$post_id=$this->request->query('post_id');
		
		$this->loadmodel('Classified_post');
		@$rst_classified_posts=$this->Classified_post->find('all', array(
				'conditions' => array(
				"Classified_post.id" =>$post_id
				),
				
				));
				
		foreach($rst_classified_posts as $res_values)
		{
			$user_id=$res_values['Classified_post']['user_id'];
			$click_cnt=$res_values['Classified_post']['click_cnt'];
		}
					
		$this->loadmodel('Registration');
		@$profile_arr=$this->Registration->find('all', array('conditions' => array("Registration.login_id" =>$user_id)));		
		$name_of_person=$profile_arr[0]['Registration']['name_of_person'];
		$organization_name=$profile_arr[0]['Registration']['organization_name'];
		
		$click_cnt_new=$click_cnt+1;	
		$this->loadmodel('Classified_post');
		$this->Classified_post->updateAll(array('click_cnt'=>$click_cnt_new), array('Classified_post.id'=>$post_id));
			
		$this->set('display_name',$name_of_person);		
		$this->set('company_name',$organization_name);	
		$this->set('click_cnt_new',$click_cnt_new);	
		$this->set('classified_posts_arr',$rst_classified_posts);		
		
		if (isset($this->request->data['mail_send'])) 
		{
		  	$this->loadmodel('Software_admin_dtl');

           	$ftc_software_admin_dtl=$this->Software_admin_dtl->find('all', array('limit'=> 1));

			$software_admin_name=$ftc_software_admin_dtl[0]['Software_admin_dtl']['software_admin_name'];
			$email_id_sender=$ftc_software_admin_dtl[0]['Software_admin_dtl']['email_id'];
			$password=$ftc_software_admin_dtl[0]['Software_admin_dtl']['password'];
			$subject_tital=$ftc_software_admin_dtl[0]['Software_admin_dtl']['software_title'];
			
			@$user_id=$this->request->data['user_id'];
			@$sub_categories=$this->request->data['sub_categories'];
			@$categories=$this->request->data['categories'];
			@$product_name=$this->request->data['product_name'];
			@$post_id=$this->request->data['post_id'];
		
		
			$this->loadmodel('Login');
			$sql_login=$this->Login->find('all', array('conditions'=> array('Login.id'=>$user_id),'fields'=>array('email')));
			$email_post_user=$sql_login[0]['Login']['email'];
			$this->loadmodel('Registration');
			$sql_profiles=$this->Registration->find('all', array('conditions'=> array('Registration.login_id'=>$user_id),'fields'=>array('name_of_person')));
			$display_name=$sql_profiles[0]['Registration']['name_of_person'];
		
			@$name_customer=$this->request->data['name'];	
			@$email_id_customer=$this->request->data['email'];
			@$phone_customer=$this->request->data['phone'];
			@$description_customer=$this->request->data['description'];
		
			$msg="<p><b>Hello ".$display_name." </b></p> 
			<p><b> You have a new query form Non Moving Inventory portal for ".$sub_categories." ( ".$categories." ) for ".$product_name." </b></p>
			<p><b> Name : </b> ".$name_customer."</p>
			<p><b>Phone No. : </b>".$phone_customer."</p>
			<p><b>Mail Id.. : </b>".$email_id_customer."</p>
			<p><b>Message : </b>".$description_customer."</p><br/>";
			
		
      $msg=htmlspecialchars($msg);
	  $this->loadmodel('Query_detail');
				$this->query_details->query("insert into  Query_detail set `post_id`='$post_id' ,`user_id`='$user_id' ,`date`='".date('Y-m-d')."',`time`='".date('h:i:s A')."',`sender_name`='$name_customer'
		,`sender_email_id`='$email_id_customer',`sender_phone`='$phone_customer',`message`='$description_customer', `mail_content`='$msg', `status`='0' ");	
			$massage="Your request Successfully send"	;
				$this->set('massage',$massage);
		}
	}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function category_setup()
{
	$this->layout='index_layout';
	if($this->request->is('post')) 
	{
		$category_add=$this->request->data["categories"];
		$this->loadmodel('category');
		$cat_data=$this->category->find('all', array('conditions' => array('category.categories'=>$category_add)));
		 $categorie_name=$cat_data[0]['category']['categories'];
		
		if($category_add==$categorie_name)
		{
			 $this->set('wrong', 'This category is already exist.');
		}
		else
		{
			$this->category->save($this->request->data);
			$this->set('success', 'Category name is successfully enterd.');
		}
		
		
	}
}
	
//////////////////////////       Ajax    ///////////////////////////////////////////////////////////
	
public function ajax_function()
{
?>
	<script src="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
  
	<script>
    $( document ).ready(function() {
		$('#configreset').click(function(){
            $('#uploadimage')[0].reset();
		 });
        $("#notific8_show").live('click',function(e){
        
            var name=$("#name").val();
            var email=$("#email").val();
            var phone=$("#phone").val();
            var message=$("#message").val();
            var query="?name=" + encodeURIComponent(name) + "&email=" + encodeURIComponent(email) + "&phone=" + encodeURIComponent(phone) + "&message=" + encodeURIComponent(message);
            $("#enquiry_loading").html('<center><img src="<?PHP echo $this->webroot; ?>images/ajax-loaders/loading_windows.gif" width="70px" ></center>').load('enquiry_submit'+query);	
        });
        
        /////////////////////////////////////////////////////////////////////////////
			$(".addclass_function").live('click', function(e)
			{
				$(this).addClass("e-clicked");
			});
			
		 	$("#uploadimage").on('submit',(function(e) 
            {
                
				if( $(this).find(".e-clicked").attr("id") === "upload_image" )
   				{
					 e.preventDefault();
					 $('#upload_image').attr('disabled', 'disabled');
					// $('html,body').html('<div class="modal-backdrop fade in"></div>');
					// $('#message').html('<center><img src="<?PHP echo $this->webroot; ?>img/ajax-loaders/ajax-loader-1.gif" ></center>');
					 var update = $("#update_table").val();
					 var rowCount = $('#tab_images_uploader_filelist tr').length;
					$(".e-clicked").removeClass("e-clicked");
					$("#message").empty();
					$.ajax({
					url: "ajax_php_file?upload_image=1&update=" + encodeURIComponent(update) + "&trCount=" + encodeURIComponent(rowCount), // Url to which the request is send
					type: "POST",             // Type of request to be send, called as method
					data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
					contentType: false,       // The content type used when sending data to the server.
					cache: false,             // To unable request pages to be cached
					processData:false,        // To send DOMDocument or non processed data file it is set to false
					success: function(data)   // A function to be called if request succeeds
					{
						 $('#upload_image').removeAttr('disabled');
						$("#message").html(data);
						$('.modal-backdrop').remove();
						/*$('.fileinput-filename').empty();
						$('.fa-file').css('display', 'none');
						$('span .fileinput-exists').text('Select file');
						$('a[data-dismiss="fileinput"]').hide();*/
						$('.alert-notification').fadeTo(4000,500).slideUp(1000, function()
						{
							$(this).alert('close'); 
							$(this).remove();
							
						});
						
					}
					
				   
					});
				}
				else if( $(this).find(".e-clicked").attr("id") === "configreset" )
   				{
					 e.preventDefault();
					$(".e-clicked").removeClass("e-clicked");
				}
				else if( $(this).find(".e-clicked").attr("id") === "save_edit" )
   				{
					 e.preventDefault();
					$(".e-clicked").removeClass("e-clicked");
					var update = $("#update_table").val();
					$.ajax({
					url: "ajax_php_file?save_edit=1&update=" + encodeURIComponent(update), // Url to which the request is send
					type: "POST",             // Type of request to be send, called as method
					data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
					contentType: false,       // The content type used when sending data to the server.
					cache: false,             // To unable request pages to be cached
					processData:false,        // To send DOMDocument or non processed data file it is set to false
					success: function(data)   // A function to be called if request succeeds
					{
						$("#submitform").html(data);
						$('.alert-notification').fadeTo(4000,500).slideUp(1000, function()
						{
							$(this).alert('close'); 
							$(this).remove();
							
						});
					}
					
				   
					});
				}
				else if( $(this).find(".e-clicked").attr("id") === "save" )
   				{
					e.preventDefault();
					$(".e-clicked").removeClass("e-clicked");
					var update = $("#update_table").val();
					$.ajax({
					url: "ajax_php_file?save_edit=1&update=" + encodeURIComponent(update), // Url to which the request is send
					type: "POST",             // Type of request to be send, called as method
					data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
					contentType: false,       // The content type used when sending data to the server.
					cache: false,             // To unable request pages to be cached
					processData:false,        // To send DOMDocument or non processed data file it is set to false
					success: function(data)   // A function to be called if request succeeds
					{
						$("#submitform").html(data);
						$('.alert-notification').fadeTo(4000,500).slideUp(300, function()
						{
							$(this).alert('close'); 
							$(this).remove();
							$('#uploadimage')[0].reset();
						 	window.location.reload();
						});
						 
					}
					
				   
					});
				}
				else if( $(this).find(".e-clicked").attr("removeclass") === "removeclass" )
   				{
					e.preventDefault();
					var name=$(this).find(".e-clicked").attr("name");
				//	var rowCount = $('#tab_images_uploader_filelist tr').length;
				////	$('html,body').append('<div class="modal-backdrop fade in"></div>');
					$('#message').html('<center><img src="<?PHP echo $this->webroot; ?>img/ajax-loaders/ajax-loader-1.gif" ></center>');
					$(".e-clicked").removeClass("e-clicked");
					var update = $("#update_table").val();
					$.ajax({
					url: "ajax_php_file?removeclass=removeclass&name=" + encodeURIComponent(name) + "&update=" + encodeURIComponent(update), // Url to which the request is send
					type: "POST",             // Type of request to be send, called as method
					data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
					contentType: false,       // The content type used when sending data to the server.
					cache: false,             // To unable request pages to be cached
					processData:false,        // To send DOMDocument or non processed data file it is set to false
					success: function(data)   // A function to be called if request succeeds
					{
						//$('.modal-backdrop').remove();
						$("#message").html(data);
						$("#"+name).hide();
						$('.alert-notification').fadeTo(4000,500).slideUp(1000, function()
						{
							$(this).alert('close'); 
							$(this).remove();
							
						});
						
					}
					
				   
					});
				}
				
				
				
            }));
			
        
    });
    </script>
        
    <script>
    function member_aprove_panding(click_status)
    {
        
         var query="?click_status=" + click_status ;
    //	  document.getElementById("getdata").innerHTML=' <div align="center" style="font-size:15px;"><img src="img/ajax-loaders/ajax-loader-7.gif" ></div>';
    location.href="ad_approval_panding"+ query;
    }  
    function fetch_sub_category_ajax(category_id)
	{
		var query="?category_id=" + encodeURIComponent(category_id)
		 $("#sub_category_ajax").html('<center><img src="<?PHP echo $this->webroot; ?>img/ajax-loaders/ajax-loader-1.gif" ></center>').load('fetch_sub_category_ajax'+query);
	}
    function doSomething()
    { 
        var page_id=$("#page").val();			
        var past_available=$("#past_available" + page_id).val();
        
        if(past_available==1)
        {
            var min_price=$("#min_price").val();
            var max_price=$("#max_price").val();
            var order_by=$("#order_by").val();
            var categorie_id=$("#categories_id").val();
            var sub_categories_id=$("#sub_categories_id").val();
            var search_by_meta=$("#search_by_meta").val();
        
            var query="?page_id=" + encodeURIComponent(page_id) + "&order_by=" + encodeURIComponent(order_by) + "&categorieid=" + categorie_id + "&sub_categories_id=" + encodeURIComponent(sub_categories_id) + "&min_price=" + encodeURIComponent(min_price) + "&max_price=" + encodeURIComponent(max_price) + "&search_by_meta=" + encodeURIComponent(search_by_meta);
            
            $("#lode_more_" + page_id).html('<center><img src="<?PHP echo $this->webroot; ?>images/ajax-loaders/ajax-loader-5.gif" ></center>').load('caregories_details_scroll'+query);
        }
    }
    
    function accending_disending(sort_status,categories_id,search_by_meta,sub_categories_id,search_type)
    {
    
        var min_price=$("#min_price").val();
        var max_price=$("#max_price").val();
         if(search_type==2 && ( min_price=="" || max_price=="" ) )
         {
            alert("Min and Max Price text box is empty"); 
         }
         else
         {
    var query="?sort_status=" + encodeURIComponent(sort_status) +"&categories_id=" + encodeURIComponent(categories_id) +"&min_price=" + encodeURIComponent(min_price) + "&max_price=" +  encodeURIComponent(max_price) +"&search_by_meta=" + encodeURIComponent(search_by_meta) + "&sub_categories_id=" + encodeURIComponent(sub_categories_id); 
    
   $("#sorting_ase_desc").html('<center><img src="<?PHP echo $this->webroot; ?>images/ajax-loaders/loading_windows.gif" width="70px" ></center>').load('categories_details_asc_desc_sort'+query);
         }
     
    }	 
    </script>
<?php
}
	
	////////////////////   End Ajax     ////////////////////////////////////////////////////////// 



}

?>
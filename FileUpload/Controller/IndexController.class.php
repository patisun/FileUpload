<?php
namespace FileUpload\Controller;
use Think\Controller;
use Think\Upload;
use Think\Verify;
class IndexController extends Controller {

	public function index(){
		
	}

	//访问视图界面
	public function upload(){
		$this->display();
	}

	//文件上传
	public function upload_do(){
		$upload = new Upload();
		$upload->maxSize = 1024*1024*10;
		$upload->exts = array('rar','7z','zip','docx','doc','jpg','png','jpeg');

		$upload->rootPath = './Uploads';
		$upload->savePath = '/';

		if(verify_do(''))
		$info = $upload->upload();

		if(!$info){
			$this->error($upload->getError());
		}else{
			$baseURL = 'Upload/'.$info['file']['savepath'].$info['file']['savename'];
			echo $baseURL;
		}
	}

	public function verify_png(){
		$verify =new Verify();
		$verify->entry();	
	}
		
	public function verify_view(){
		$this->display();
	}
	public function verify_do(){

		
		$code = I('code');
		$verity =new Verify();

		if($verity->check($code)){
			$this->success('验证成功',U('upload'),5);
			
		}else{
			$this->error('验证失败');
			
		}

	}

	
}
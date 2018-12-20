<?php 
	//for route (admin/)
	if(!function_exists('adminURL')){
		function adminURL($url = null){
			return url('admin/'.$url);
		}
	}
	//for route (home/)
	if(!function_exists('homeURL')){
		function homeURL($url = null){
			return url('home/'.$url);
		}
	}
	//for Auth admin
	if(!function_exists('admin')){
		function admin(){
			return auth()->guard('admin');
		}
	} 
	//for Auth user
	if(!function_exists('userWeb')){
		function userWeb(){
			return auth()->guard('web');
		}
	} 
	//for upload files
	if(!function_exists('uploadFile')){
		function uploadFile($file) {
	        $var1 = rand(1111,9999);
	        $var2 = rand(1111,9999);
	        $var3 = $var1.$var2;
	        $Name = $file->getClientOriginalName();
	        $fileName =$var3.$Name;
	        $path = public_path('uploads/');
	        $file->move($path,$fileName);
	        return 'uploads/'.$fileName;
  	  }
	} 
	//method to extract username
     function beforeSign ($sign, $inthat) {
        return substr($inthat, 0, strpos($inthat, $sign));
    }
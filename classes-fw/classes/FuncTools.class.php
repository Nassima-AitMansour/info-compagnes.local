<?PHP 
require_once 'DataBase.class.php'; 
class FuncTools {  
	public function convertdate($date,$i=0){
		$month_name ['01'] = 'Jan';
		$month_name ['02'] = 'F&eacute;v';
		$month_name ['03'] = 'Mars';
		$month_name ['04'] = 'Avr';
		$month_name ['05'] = 'Mai';
		$month_name ['06'] = 'Juin';
		$month_name ['07'] = 'Juil';
		$month_name ['08'] = 'Ao&ucirc;t';
		$month_name ['09'] = 'Sep';
		$month_name ['1'] = 'Jan';
		$month_name ['2'] = 'F&eacute;v';
		$month_name ['3'] = 'Mars';
		$month_name ['4'] = 'Avr';
		$month_name ['5'] = 'Mai';
		$month_name ['6'] = 'Juin';
		$month_name ['7'] = 'Juil';
		$month_name ['8'] = 'Ao&ucirc;t';
		$month_name ['9'] = 'Sep';
		$month_name ['10'] = 'Oct';
		$month_name ['11'] = 'Nov';
		$month_name ['12'] = 'D&eacute;c';

		if($i==0){$dates=explode('-',$date);return $dates[2].' '.$month_name[$dates[1]].' '.$dates[0];}
		else{$dates=explode('/',$date);return $dates[2].'-'.$dates[1].'-'.$dates[0];}
	}
	public function convertdate_wd($date,$i=0){
		$month_name ['01'] = 'Jan';
		$month_name ['02'] = 'Fév';
		$month_name ['03'] = 'Mar';
		$month_name ['04'] = 'Avr';
		$month_name ['05'] = 'Mai';
		$month_name ['06'] = 'Juin';
		$month_name ['07'] = 'Juil';
		$month_name ['08'] = 'Ao&ucirc;t';
		$month_name ['09'] = 'Sep';
		$month_name ['1'] = 'Jan';
		$month_name ['2'] = 'Fév';
		$month_name ['3'] = 'Mars';
		$month_name ['4'] = 'Avr';
		$month_name ['5'] = 'Mai';
		$month_name ['6'] = 'Jui';
		$month_name ['7'] = 'Jul';
		$month_name ['8'] = 'Aoû';
		$month_name ['9'] = 'Sep';
		$month_name ['10'] = 'Oct';
		$month_name ['11'] = 'Nov';
		$month_name ['12'] = 'Déc';
		if($i==0){$dates=explode('-',$date);return $dates[2].' '.$month_name[$dates[1]];}
		 else{$dates=explode('/',$date);return $dates[2].'-'.$dates[1];}
	}
	public function urls($url, $lang_a = 0){
		global $lang;
		
		$url = trim($url);
		$url=strip_tags($url);
		$url = str_replace("²","2",$url);
		$url = str_replace("'","-",$url);
		$url = str_replace("?","-",$url);
		$url = str_replace("!","-",$url);
		$url = str_replace("è","e",$url);
		$url = str_replace("&amp;sup2;","2",$url);
		$url = str_replace("&prime;","-",$url);
		$url = str_replace("'","-",$url);
		$url = str_replace("ß","b",$url);
		$url = utf8_decode($url);
		$url = str_replace("è","e",$url);
		$url = strtr($url,'()ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ%?\'/°:²«»',		'--AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy------2--');
		$url = str_replace("²","2",$url);
		$url = str_replace("'","-",$url);
		$url = str_replace("ß","b",$url);
		$url = str_replace("&#039;","-",$url);
		$url = str_replace("¿","",$url);
		$url = str_replace("'","-",$url);
		$url = str_replace("&amp;sup2;","2",$url);
		$url = str_replace("&prime;","-",$url);
		if($lang == 1 or $lang_a == 1){$url = str_replace("&","and",$url);}
		if($lang == 2 or $lang_a == 2){$url = str_replace("&","et",$url);}
		if($lang == 3 or $lang_a == 3){$url = str_replace("&","y",$url);}
		$url = str_replace("'","-",$url);
		$url = str_replace(" ","-",$url);
		$url = str_replace("?","-",$url);
		$url = str_replace("---","-",$url);
		$url = str_replace("--","-",$url);
		$url = str_replace("--","-",$url);
		$url = strtolower($url);
		return $url;
	}
	public function scale_image($src_image, $dst_image, $op = 'fit'){
		$src_width = @imagesx($src_image);
		$src_height = @imagesy($src_image);
		$dst_width = @imagesx($dst_image);
		$dst_height = @imagesy($dst_image);
		$new_width = $dst_width;
		$new_height = round($new_width*($src_height/$src_width));
		$new_x = 0;
		$new_y = round(($dst_height-$new_height)/2);
		if ($op =='fill')$next = $new_height < $dst_height;
		else $next = $new_height > $dst_height;

		if ($next) {
			$new_height = $dst_height;
			$new_width = round($new_height*($src_width/$src_height));
			$new_x = round(($dst_width - $new_width)/2);
			$new_y = 0;
		}
		imagecopyresampled($dst_image, $src_image , $new_x, $new_y, 0, 0, $new_width, $new_height, $src_width, $src_height);
	}
	public function createRandomPassword() {
		$chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
		srand((double)microtime()*1000000); 
		$i = 0; 
		$pass = '' ; 
		while ($i <= 15) { 
			$num = rand() % 33; 
			$tmp = substr($chars, $num, 1); 
			$pass = $pass . $tmp; 
			$i++; 
		} 
		return $pass; 
	}
	public function htaccess(){
		$create_name = "../../.htaccess";
		$file_handle = fopen($create_name, 'w') or die("Error: Can't open file");
		
		$list_dictionary = new ParamTools('dictionary');
		$list_page_seo = new ParamTools('page_seo');
		
		$content_string = "RewriteEngine On\n";
		fwrite($file_handle, $content_string);
		$content_string = "RewriteCond %{HTTPS} off\n";
		fwrite($file_handle, $content_string);
		$content_string = "RewriteRule .* https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]\n";
		fwrite($file_handle, $content_string);
		$content_string = "RewriteCond %{HTTP_HOST} !^www\. [NC]\n";
		fwrite($file_handle, $content_string);
		$content_string = "RewriteRule .* https://www.%{HTTP_HOST}%{REQUEST_URI} [L,R=301]\n";
		fwrite($file_handle, $content_string);
		
		$content_string = "RewriteRule ^fr/$ /?lang=2 [L]\n";
		fwrite($file_handle, $content_string);
		$content_string = "RewriteRule ^fr$ \"fr/\" [R=301,L]\n";
		fwrite($file_handle, $content_string);
		$content_string = "RewriteRule ^es/$ /?lang=3 [L]\n";
		fwrite($file_handle, $content_string);
		$content_string = "RewriteRule ^es$ \"es/\" [R=301,L]\n";
		fwrite($file_handle, $content_string);
		
		$list_services = new ParamTools('services');
		$res_services = $list_services -> getliste();
		$resm_serv_link = $list_page_seo -> get(4);
			$serv_alias1 = $this -> urls($resm_serv_link -> meta_alias1, 1);
			$serv_alias2 = $this -> urls($resm_serv_link -> meta_alias2, 2);
			$serv_alias3 = $this -> urls($resm_serv_link -> meta_alias3, 3);
		$page_serv_seo1 = ($serv_alias1 != '')? $this -> urls($serv_alias1, 1).'/' : $this -> urls($resm_serv_link -> title1, 1).'/';
		$page_serv_seo2 = ($serv_alias2 != '')? $this -> urls($serv_alias2, 2).'/' : $this -> urls($resm_serv_link -> title2, 2).'/';
		$page_serv_seo3 = ($serv_alias3 != '')? $this -> urls($serv_alias3, 3).'/' : $this -> urls($resm_serv_link -> title3, 3).'/';
		foreach($res_services as $kle => $val){
			$services_id = $val -> services_id;
			$title1 = $this -> urls($val -> title1, 1);
			$title2 = $this -> urls($val -> title2, 2);
			$title3 = $this -> urls($val -> title3, 3);
			
			$meta_alias1 = $this -> urls($val -> meta_alias1, 1);
			$meta_alias2 = $this -> urls($val -> meta_alias2, 2);
			$meta_alias3 = $this -> urls($val -> meta_alias3, 3);
			
			$service_url_1 = ($meta_alias1 != '')? $meta_alias1 : $title1.'.html';
			$service_url_2 = ($meta_alias2 != '')? $meta_alias2 : $title2.'.html';
			$service_url_3 = ($meta_alias3 != '')? $meta_alias3 : $title3.'.html';
			
			$service_url_1 = $page_serv_seo1.$service_url_1;
			$service_url_2 = $page_serv_seo2.$service_url_2;
			$service_url_3 = $page_serv_seo3.$service_url_3;
			
			$content_string = "RewriteRule ^$service_url_1 /services-single.php?id=$services_id\n";
			fwrite($file_handle, $content_string);
			$content_string = "RewriteRule ^fr/$service_url_2 /services-single.php?id=$services_id\n";
			fwrite($file_handle, $content_string);
			$content_string = "RewriteRule ^es/$service_url_3 /services-single.php?id=$services_id\n";
			fwrite($file_handle, $content_string);
		}
		
		$list_blog_post = new ParamTools('blog_post');
		$res_blog_post = $list_blog_post -> getliste();
		$resm_blog_link = $list_page_seo -> get(7);
			$blog_alias1 = $this -> urls($resm_blog_link -> meta_alias1, 1);
			$blog_alias2 = $this -> urls($resm_blog_link -> meta_alias2, 2);
			$blog_alias3 = $this -> urls($resm_blog_link -> meta_alias3, 3);
		$page_blog_seo1 = ($blog_alias1 != '')? $this -> urls($blog_alias1, 1).'/' : $this -> urls($resm_blog_link -> title1, 1).'/';
		$page_blog_seo2 = ($blog_alias2 != '')? $this -> urls($blog_alias2, 2).'/' : $this -> urls($resm_blog_link -> title2, 2).'/';
		$page_blog_seo3 = ($blog_alias3 != '')? $this -> urls($blog_alias3, 3).'/' : $this -> urls($resm_blog_link -> title3, 3).'/';
		foreach($res_blog_post as $kle => $val){
			$blog_post_id = $val -> blog_post_id;
			$title1 = $this -> urls($val -> title1, 1);
			$title2 = $this -> urls($val -> title2, 2);
			$title3 = $this -> urls($val -> title3, 3);
			
			$meta_alias1 = $this -> urls($val -> meta_alias1, 1);
			$meta_alias2 = $this -> urls($val -> meta_alias2, 2);
			$meta_alias3 = $this -> urls($val -> meta_alias3, 3);
			
			$blog_url_1 = ($meta_alias1 != '')? $meta_alias1 : $title1.'.html';
			$blog_url_2 = ($meta_alias2 != '')? $meta_alias2 : $title2.'.html';
			$blog_url_3 = ($meta_alias3 != '')? $meta_alias3 : $title3.'.html';
			
			$blog_url_1 = $page_blog_seo1.$blog_url_1;
			$blog_url_2 = $page_blog_seo1.$blog_url_2;
			$blog_url_3 = $page_blog_seo1.$blog_url_3;
			
			$content_string = "RewriteRule ^$blog_url_1 /blog-single.php?id=$blog_post_id\n";
			fwrite($file_handle, $content_string);
			$content_string = "RewriteRule ^fr/$blog_url_2 /blog-single.php?id=$blog_post_id\n";
			fwrite($file_handle, $content_string);
			$content_string = "RewriteRule ^es/$blog_url_3 /blog-single.php?id=$blog_post_id\n";
			fwrite($file_handle, $content_string);
		}
		
		$list_gallery = new ParamTools('gallery');
		$res_gallery = $list_gallery -> getliste();
		$resm_gallery_link = $list_page_seo -> get(6);
			$gallery_alias1 = $this -> urls($resm_gallery_link -> meta_alias1, 1);
			$gallery_alias2 = $this -> urls($resm_gallery_link -> meta_alias2, 2);
			$gallery_alias3 = $this -> urls($resm_gallery_link -> meta_alias3, 3);
$gallery_seo1 = ($gallery_alias1 != '')? $this -> urls($gallery_alias1, 1).'/' : $this -> urls($resm_gallery_link -> title1, 1).'/';
$gallery_seo2 = ($gallery_alias2 != '')? $this -> urls($gallery_alias2, 2).'/' : $this -> urls($resm_gallery_link -> title2, 2).'/';
$gallery_seo3 = ($gallery_alias3 != '')? $this -> urls($gallery_alias3, 3).'/' : $this -> urls($resm_gallery_link -> title3, 3).'/';
		foreach($res_gallery as $kle => $val){
			$gallery_id = $val -> gallery_id;
			$title1 = $this -> urls($val -> title1, 1);
			$title2 = $this -> urls($val -> title2, 2);
			$title3 = $this -> urls($val -> title3, 3);
			
			$meta_alias1 = $this -> urls($val -> meta_alias1, 1);
			$meta_alias2 = $this -> urls($val -> meta_alias2, 2);
			$meta_alias3 = $this -> urls($val -> meta_alias3, 3);
			
			$gallery_url_1 = ($meta_alias1 != '')? $meta_alias1 : $title1.'.html';
			$gallery_url_2 = ($meta_alias2 != '')? $meta_alias2 : $title2.'.html';
			$gallery_url_3 = ($meta_alias3 != '')? $meta_alias3 : $title3.'.html';
			
			$gallery_url_1 = $gallery_seo1.$gallery_url_1;
			$gallery_url_2 = $gallery_seo2.$gallery_url_2;
			$gallery_url_3 = $gallery_seo3.$gallery_url_3;
			
			$content_string = "RewriteRule ^$gallery_url_1 /gallery-single.php?id=$gallery_id\n";
			fwrite($file_handle, $content_string);
			$content_string = "RewriteRule ^fr/$$gallery_url_2 /gallery-single.php?id=$gallery_id\n";
			fwrite($file_handle, $content_string);
			$content_string = "RewriteRule ^es/$gallery_url_3 /gallery-single.php?id=$gallery_id\n";
			fwrite($file_handle, $content_string);
		}
		
		$resm_seo = $list_page_seo -> get(2);
			$meta_alias1 = $this -> urls($resm_seo -> meta_alias1, 1);
			$meta_alias2 = $this -> urls($resm_seo -> meta_alias2, 2);
			$meta_alias3 = $this -> urls($resm_seo -> meta_alias3, 3);
		
			$page_seo1 = ($meta_alias1 != '')? $this -> urls($meta_alias1, 1) : $this -> urls($resm_seo -> title1, 1).'.html';
			$page_seo2 = ($meta_alias2 != '')? $this -> urls($meta_alias2, 2) : $this -> urls($resm_seo -> title2, 2).'.html';
			$page_seo3 = ($meta_alias3 != '')? $this -> urls($meta_alias3, 3) : $this -> urls($resm_seo -> title3, 3).'.html';
		
			$content_string = "RewriteRule ^$page_seo1 /about-us.php\n"; fwrite($file_handle, $content_string);
			$content_string = "RewriteRule ^fr/$page_seo2 /about-us.php\n"; fwrite($file_handle, $content_string);
			$content_string = "RewriteRule ^es/$page_seo3 /about-us.php\n"; fwrite($file_handle, $content_string);
		
		$resm_seo = $list_page_seo -> get(3);
			$meta_alias1 = $this -> urls($resm_seo -> meta_alias1, 1);
			$meta_alias2 = $this -> urls($resm_seo -> meta_alias2, 2);
			$meta_alias3 = $this -> urls($resm_seo -> meta_alias3, 3);
		
			$page_seo1 = ($meta_alias1 != '')? $this -> urls($meta_alias1, 1) : $this -> urls($resm_seo -> title1, 1).'.html';
			$page_seo2 = ($meta_alias2 != '')? $this -> urls($meta_alias2, 2) : $this -> urls($resm_seo -> title2, 2).'.html';
			$page_seo3 = ($meta_alias3 != '')? $this -> urls($meta_alias3, 3) : $this -> urls($resm_seo -> title3, 3).'.html';
		
			$content_string = "RewriteRule ^$page_seo1 /about-destination.php\n"; fwrite($file_handle, $content_string);
			$content_string = "RewriteRule ^fr/$page_seo2 /about-destination.php\n"; fwrite($file_handle, $content_string);
			$content_string = "RewriteRule ^es/$page_seo3 /about-destination.php\n"; fwrite($file_handle, $content_string);
		
		$resm_seo = $list_page_seo -> get(4);
			$meta_alias1 = $this -> urls($resm_seo -> meta_alias1, 1);
			$meta_alias2 = $this -> urls($resm_seo -> meta_alias2, 2);
			$meta_alias3 = $this -> urls($resm_seo -> meta_alias3, 3);
		
			$page_seo1 = ($meta_alias1 != '')? $this -> urls($meta_alias1, 1).'/' : $this -> urls($resm_seo -> title1, 1).'/';
			$page_seo2 = ($meta_alias2 != '')? $this -> urls($meta_alias2, 2).'/' : $this -> urls($resm_seo -> title2, 2).'/';
			$page_seo3 = ($meta_alias3 != '')? $this -> urls($meta_alias3, 3).'/' : $this -> urls($resm_seo -> title3, 3).'/';
		
			$content_string = "RewriteRule ^$page_seo1 /services-list.php\n"; fwrite($file_handle, $content_string);
			$content_string = "RewriteRule ^fr/$page_seo2 /services-list.php\n"; fwrite($file_handle, $content_string);
			$content_string = "RewriteRule ^es/$page_seo3 /services-list.php\n"; fwrite($file_handle, $content_string);
		
		$resm_seo = $list_page_seo -> get(5);
			$meta_alias1 = $this -> urls($resm_seo -> meta_alias1, 1);
			$meta_alias2 = $this -> urls($resm_seo -> meta_alias2, 2);
			$meta_alias3 = $this -> urls($resm_seo -> meta_alias3, 3);
		
			$page_seo1 = ($meta_alias1 != '')? $this -> urls($meta_alias1, 1) : $this -> urls($resm_seo -> title1, 1).'.html';
			$page_seo2 = ($meta_alias2 != '')? $this -> urls($meta_alias2, 2) : $this -> urls($resm_seo -> title2, 2).'.html';
			$page_seo3 = ($meta_alias3 != '')? $this -> urls($meta_alias3, 3) : $this -> urls($resm_seo -> title3, 3).'.html';
		
			$content_string = "RewriteRule ^$page_seo1 /our-vision.php\n"; fwrite($file_handle, $content_string);
			$content_string = "RewriteRule ^fr/$page_seo2 /our-vision.php\n"; fwrite($file_handle, $content_string);
			$content_string = "RewriteRule ^es/$page_seo3 /our-vision.php\n"; fwrite($file_handle, $content_string);
		
		$resm_seo = $list_page_seo -> get(6);
			$meta_alias1 = $this -> urls($resm_seo -> meta_alias1);
			$meta_alias2 = $this -> urls($resm_seo -> meta_alias2);
			$meta_alias3 = $this -> urls($resm_seo -> meta_alias3);
		
			$page_seo1 = ($meta_alias1 != '')? $this -> urls($meta_alias1).'/' : $this -> urls($resm_seo -> title1).'/';
			$page_seo2 = ($meta_alias2 != '')? $this -> urls($meta_alias2).'/' : $this -> urls($resm_seo -> title2).'/';
			$page_seo3 = ($meta_alias3 != '')? $this -> urls($meta_alias3).'/' : $this -> urls($resm_seo -> title3).'/';
		
			$content_string = "RewriteRule ^$page_seo1 /gallery-list.php\n"; fwrite($file_handle, $content_string);
			$content_string = "RewriteRule ^fr/$page_seo2 /gallery-list.php\n"; fwrite($file_handle, $content_string);
			$content_string = "RewriteRule ^es/$page_seo3 /gallery-list.php\n"; fwrite($file_handle, $content_string);
		
		$resm_seo = $list_page_seo -> get(7);
			$meta_alias1 = $this -> urls($resm_seo -> meta_alias1, 1);
			$meta_alias2 = $this -> urls($resm_seo -> meta_alias2, 2);
			$meta_alias3 = $this -> urls($resm_seo -> meta_alias3, 3);
		
			$page_seo1 = ($meta_alias1 != '')? $this -> urls($meta_alias1, 1).'/' : $this -> urls($resm_seo -> title1, 1).'/';
			$page_seo2 = ($meta_alias2 != '')? $this -> urls($meta_alias2, 2).'/' : $this -> urls($resm_seo -> title2, 2).'/';
			$page_seo3 = ($meta_alias3 != '')? $this -> urls($meta_alias3, 3).'/' : $this -> urls($resm_seo -> title3, 3).'/';
		
			$content_string = "RewriteRule ^$page_seo1 /blog-list.php\n"; fwrite($file_handle, $content_string);
			$content_string = "RewriteRule ^fr/$page_seo2 /blog-list.php\n"; fwrite($file_handle, $content_string);
			$content_string = "RewriteRule ^es/$page_seo3 /blog-list.php\n"; fwrite($file_handle, $content_string);
		
		$resm_seo = $list_page_seo -> get(8);
			$meta_alias1 = $this -> urls($resm_seo -> meta_alias1, 1);
			$meta_alias2 = $this -> urls($resm_seo -> meta_alias2, 2);
			$meta_alias3 = $this -> urls($resm_seo -> meta_alias3, 3);
		
			$page_seo1 = ($meta_alias1 != '')? $this -> urls($meta_alias1, 1) : $this -> urls($resm_seo -> title1, 1).'.html';
			$page_seo2 = ($meta_alias2 != '')? $this -> urls($meta_alias2, 2) : $this -> urls($resm_seo -> title2, 2).'.html';
			$page_seo3 = ($meta_alias3 != '')? $this -> urls($meta_alias3, 3) : $this -> urls($resm_seo -> title3, 3).'.html';
		
			$content_string = "RewriteRule ^$page_seo1 /contact-us.php\n"; fwrite($file_handle, $content_string);
			$content_string = "RewriteRule ^fr/$page_seo2 /contact-us.php\n"; fwrite($file_handle, $content_string);
			$content_string = "RewriteRule ^es/$page_seo3 /contact-us.php\n"; fwrite($file_handle, $content_string);
		
		$resm_seo = $list_page_seo -> get(9);
			$meta_alias1 = $this -> urls($resm_seo -> meta_alias1, 1);
			$meta_alias2 = $this -> urls($resm_seo -> meta_alias2, 2);
			$meta_alias3 = $this -> urls($resm_seo -> meta_alias3, 3);
		
			$page_seo1 = ($meta_alias1 != '')? $this -> urls($meta_alias1, 1) : $this -> urls($resm_seo -> title1, 1).'.html';
			$page_seo2 = ($meta_alias2 != '')? $this -> urls($meta_alias2, 2) : $this -> urls($resm_seo -> title2, 2).'.html';
			$page_seo3 = ($meta_alias3 != '')? $this -> urls($meta_alias3, 3) : $this -> urls($resm_seo -> title3, 3).'.html';
		
			$content_string = "RewriteRule ^$page_seo1 /showcase.php\n"; fwrite($file_handle, $content_string);
			$content_string = "RewriteRule ^fr/$page_seo2 /showcase.php\n"; fwrite($file_handle, $content_string);
			$content_string = "RewriteRule ^es/$page_seo3 /showcase.php\n"; fwrite($file_handle, $content_string);

		fclose($file_handle);
	}
	
	public function get_url($type_url, $page, $url, $lang = 1){
		if($type_url == 2){
			return $this -> urls($url);
		}
		elseif($type_url == 1 and $page > 0){
			if($page == 1){
				return '';
			}
			else{
				$list_page_builder = new ParamTools('page_builder');
				$res_page_builder = $list_page_builder -> get($page);
				if($res_page_builder){
					if($res_page_builder -> {"meta_alias$lang"} != ''){
						return $this -> urls($res_page_builder -> {"meta_alias$lang"});
					}
					else{
						return $this -> urls($res_page_builder -> {"title$lang"}).'.html';
					}
				}
				else{
					return '#';
				}
			}
		}
		else{
			return '#';
		}
	}
}
?>
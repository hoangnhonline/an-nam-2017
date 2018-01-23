<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Goutte, File, Auth, Mail;

class CrawlerController extends Controller
{
    
    public function trau(Request $request){
        $html = Goutte::request('GET', 'https://zcash.flypool.org/miners/t1fGB3HA7Vr62k38JNfbCpgoZK7gFLRMQ58');  
        $crawler = new simple_html_dom();
        // Load HTML from a string
        $crawler->load($html);
        $i = 0;
		$crawler->find('h4',3)->innertext;
		Mail::send('frontend.email.trau',
			[                    
				
			],
			function($message) {
				$message->subject("Trâu lỗi.");
				$message->to("hoangnhonline@gmail.com");
				$message->from('web.0917492306@gmail.com', 'TRAU');
				$message->sender('web.0917492306@gmail.com', 'TRAU');
		});
        foreach($crawler->find('option') as $e) {
           
            $code = $e->value;
            $name = $e->plaintext;
            if($code != '-1'){
                 $i++;
                $arr['code'] = $e->value;
                $arr['display_order'] = $i;
                $arr['name'] = $e->plaintext;
                $arr['alias'] = Helper::changeFileName($arr['name']);
                City::create($arr);
            }            
        }
    }
   
}

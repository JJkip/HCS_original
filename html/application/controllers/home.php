<?php
class Home extends CI_Controller {

	protected $data = array("title" => "home");

	function __construct() {

		parent::__construct();

		$this -> load -> model("home/home_model");
		$this -> load -> model('mediacenter_model');
		$this -> load -> model("calendar/calendar_model");
		$this -> data["organizations"] = $this -> home_model -> get_organizations();
		$this -> data['documents'] = $this -> home_model -> get_uploads();
		$this -> data['calendar'] = $this -> calendar_model -> generate(date('Y'), date('m'));
		$news_before = $this -> home_model -> get_news();
		$this->data['uploads'] = $this->home_model->fetch_docs();

		foreach ($news_before as $news) {
			//            echo 'user id:' . $news['user_id'];
			$user_info = $this -> mediacenter_model -> get_user_details($news['user_id']);
			if (count($user_info) > 0) {
				$news['organization'] = $user_info -> organization;
				$news['date_created'] = date('j F Y', strtotime($news['date_created']));
				$news['url'] = site_url('news/item/' . $news['slug']);
				$this -> data["news"][] = $news;
			}
		}
               $this->data['media']=$this->videos();
               
		//        echo '</pre>';
	  }
	
	function index() {
		$this -> template -> load('default', 'home/home', $this -> data);
		//$this -> template -> load('members', 'home/home', $this -> data);
	}
	


	function show_calendar($year = null, $month = null) {

		$this -> data['calendar'] = $this -> calendar_model -> generate($year, $month);
		$this -> template -> load('default', 'hcs_tab_view/events', $this -> data);
	}

	function get_event() {
		$event_id = $_REQUEST['event_id'];
		$data = $this -> calendar_model -> get_event($event_id);

		echo $data;
	}

	function get_all() {
		$content = $this -> home_model -> get_all_content();
		echo $content;
	}

	function organization_docs() {
		$organization_id = $_REQUEST['organization_id'];
		$table = $_REQUEST['table'];

		//$response = $this -> home_model -> filter_content($filter, $content);
		$response = $this -> home_model -> get_organization_docs($organization_id, $table);

		//echo $organization_id . " : " . $table;
		echo $response;
	}

	function sort_content() {
		$sort = $_REQUEST['sort'];
		$content = $_REQUEST['content'];

		echo "Sort: " . $sort;
	}
        public function privacy_policy(){
//            echo 'here'; die;
            $this -> template -> load('default', 'home/privacy_policy', $this->data);
        }
        public function terms_of_use(){
//            echo 'here'; die;
            $this -> template -> load('default', 'home/terms', $this->data);
        }
        public function about_hcs(){
//            echo 'here'; die;
            $this -> template -> load('default', 'home/who', $this->data);
        }
        public function partners(){
//            echo 'here'; die;
            $this -> template -> load('default', 'home/partners', $this->data);
        }
         public function programme_impact(){
//            echo 'here'; die;
            $this -> template -> load('default', 'home/impact', $this->data);
        }
        public function contacts(){
//            echo 'here'; die;
            $this -> template -> load('default', 'home/contact', $this->data);
        }
        
    function videos() {
        $params['apikey'] = $this->config->item('youtube_api_key');
//we need to get our oauth keys from the database
        $keys = $this->mediacenter_model->get_access_token();
//        var_dump($keys); die;
        $params['oauth']['key'] = $this->config->item('youtube_consumer_key');
        $params['oauth']['secret'] = $this->config->item('youtube_consumer_secret');
        $params['oauth']['algorithm'] = 'HMAC-SHA1';
        $params['oauth']['access_token'] = array('oauth_token' => urlencode($keys->oauth_token),
            'oauth_token_secret' => urlencode($keys->oauth_token_secret));
        $this->load->library('youtube', $params);
        $res = json_decode($this->youtube->getUserUploads(), true);
//        echo '<pre>';
//        var_dump($res['feed']['entry']); die;
        $videos = array();
        $items = $res['feed']['entry'];
//        var_dump($items);
        foreach ($items as $item) {
            $id = end(explode("/", $item['id']['$t']));
//            echo $id.'<br>'; die;
//            var_dump($id_arr); die;

            $item_array = array();
            $item_array['title'] = $item['title']['$t'];
            $item_array['description'] = $item['content']['$t'];
            $item_array['link'] = $item['link'][0]['href'];
            $item_array['keywords'] = $item['media$group']['media$keywords']['$t'];
            $item_array['id'] = $id;

            $videos[] = $item_array;
//            echo $item_array['title'];
        }
//        var_dump($videos);
        return $videos;
//        $this->load->view('media_centre/videos', $data);
       //return $data;
//        die;
    }


}

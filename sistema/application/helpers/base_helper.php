<?php

if ( ! function_exists('get_option'))
{
    function get_option($key='')
    {
        $defined = 0;
        if(defined('OPTIONS_ARRAY'))
        {
            $options = (array)json_decode(constant('OPTIONS_ARRAY'));
            if(isset($options[$key]))
            {
                $defined = 1;
                return $options[$key];
            }
        }


        if($defined==0)
        {
                    $CI = get_instance();
            $CI->load->database();
            $query = $CI->db->get_where('options',array('key'=>$key,'status'=>1));
            if($query->num_rows()>0)
                $option = $query->row();
            else
                $option = array('error'=>'Key not found');

            $options[$key] = $option;
            if(!defined('OPTIONS_ARRAY'))
                define('OPTIONS_ARRAY',json_encode($options));

            return $option;
        }
    }

}

if ( ! function_exists('get_settings'))
{
    function get_settings($option='',$key='',$default='Yes')
    {
        $settings = get_option($option);
        if(is_array($settings)==FALSE)
        {
            $settings = (array)json_decode($settings->values);
            $val = (isset($settings[$key]))?$settings[$key]:$default;
        }
        else
            $val = $default;

        return $val;
    }
}

if ( ! function_exists('get_site_logo'))
{
    function get_site_logo()
    {
        $logo = get_settings('site_settings','site_logo',base_url('assets/images/logo/logo-default.png'));

        if ($logo == ''){
            $logo = base_url('assets/images/logo/logo-default.png');
        }
        return $logo;
    }
}





if ( ! function_exists('is_active_menu'))
{
    function is_active_menu($url)
    {
        if(is_array($url))
        {
            foreach ($url as $menu) {
                if(strpos(uri_string(),$menu))
                    return 'active';
            }
        }
        else
        {
            if(uri_string()=='' && $url=='')
                return 'active';

            if(uri_string()=='' || $url=='')
                return '';
            return (strpos(uri_string(),$url))?'active':'';
        }
    }
}


if ( ! function_exists('get_user'))
{
    function get_user()


    {
        $CI = get_instance();

        return new User($CI->session);

    }
}

if ( ! function_exists('get_profile_photo_by_id'))
{
    function get_profile_photo_by_id($id='',$type='')
    {
        if($id==0)
            return 'No found';

        $CI = get_instance();
        $CI->load->database();
        $query = $CI->db->get_where('users_perfil',array('fk_user'=>$id));
        if($query->num_rows()>0)
        {
            $row = $query->row();
            if($row->avatar=='')
                return base_url().'uploads/profile_photos/nophoto-'.strtolower($row->gender).'.jpg';

            if($type=='thumb')
                return base_url().'uploads/profile_photos/thumb/'.$row->avatar;
            else
                return base_url().'uploads/profile_photos/'.$row->avatar;
        }
        else
        {

            return base_url().'uploads/profile_photos/nophoto-female.jpg';
        }
    }
}

if ( ! function_exists('get_profile_photo_name_by_username'))
{
    function get_profile_photo_name_by_username($username='',$type='thumb')
    {
        if($username=='')
            return 'Not found';

        $CI = get_instance();
        $CI->load->database();
        $CI->db->join('users', 'users_perfil.fk_user = users.id');
        $query = $CI->db->get_where('users_perfil',array('users.username'=>$username));
        if($query->num_rows()>0)
        {
            $row = $query->row();
            if($row->avatar!='')
                return $row->avatar;
            else
                return 'nophoto-'.strtolower($row->gender).'.jpg';
        }
        else
            return 'nophoto-.jpg';
    }
}

if ( ! function_exists('create_square_thumb'))
{
    function create_square_thumb($img,$dest)
    {
        $seg = explode('.',$img);
        $thumbType    = 'jpg';
        $thumbSize    = 300;
        $thumbPath    = $dest;
        $thumbQuality = 100;

        $last_index = count($seg);
        $last_index--;

        if($seg[$last_index]=='jpg' || $seg[$last_index]=='jpeg')
        {
            if (!$full = imagecreatefromjpeg($img)) {
                return 'error';
            }
        }
        else if($seg[$last_index]=='png')
        {
            if (!$full = imagecreatefrompng($img)) {
                return 'error';
            }
        }
        else if($seg[$last_index]=='gif')
        {
            if (!$full = imagecreatefromgif($img)) {
                return 'error';
            }
        }

        $width  = imagesx($full);
        $height = imagesy($full);

        /* work out the smaller version, setting the shortest side to the size of the thumb, constraining height/wight */
        if ($height > $width) {
            $divisor = $width / $thumbSize;
        } else {
            $divisor = $height / $thumbSize;
        }

        $resizedWidth   = ceil($width / $divisor);
        $resizedHeight  = ceil($height / $divisor);

        /* work out center point */
        $thumbx = floor(($resizedWidth  - $thumbSize) / 2);
        $thumby = floor(($resizedHeight - $thumbSize) / 2);

        /* create the small smaller version, then crop it centrally to create the thumbnail */
        $resized  = imagecreatetruecolor($resizedWidth, $resizedHeight);
        $thumb    = imagecreatetruecolor($thumbSize, $thumbSize);
        imagecopyresized($resized, $full, 0, 0, 0, 0, $resizedWidth, $resizedHeight, $width, $height);
        imagecopyresized($thumb, $resized, 0, 0, $thumbx, $thumby, $thumbSize, $thumbSize, $thumbSize, $thumbSize);

        $name = name_from_url($img);

        imagejpeg($thumb, $thumbPath.str_replace('_large.jpg', '_thumb.jpg', $name), $thumbQuality);
    }

}


if ( ! function_exists('name_from_url'))
{

    function name_from_url($filePath)
    {
        $fileParts = pathinfo($filePath);

        if(!isset($fileParts['filename']))
        {$fileParts['filename'] = substr($fileParts['basename'], 0, strrpos($fileParts['basename'], '.'));}

        return $fileParts['basename'];
    }
}
if ( ! function_exists('formatar_data')) {
function formatar_data($data, $formato = 2)
{
    if ($data == '') {

        return false;
    } else {
        $date = strtotime($data);
        $day = date("l", $date);
        $daynum = date("j", $date);
        $month = date("F", $date);
        $year = date("Y", $date);

        if ($formato == 1) {

            switch ($day) {
                case "Monday":
                    $day = "Segunda";
                    break;
                case "Tuesday":
                    $day = "Terça";
                    break;
                case "Wednesday":
                    $day = "Quarta";
                    break;
                case "Thursday":
                    $day = "Quinta";
                    break;
                case "Friday":
                    $day = "Sexta";
                    break;
                case "Saturday":
                    $day = "Sábado";
                    break;
                case "Sunday":
                    $day = "Domingo";
                    break;
                default:
                    $day = "erro";
                    break;
            }

            switch ($month) {
                case "January":
                    $month = "Janeiro";
                    break;
                case "February":
                    $month = "Fevereiro";
                    break;
                case "March":
                    $month = "Março";
                    break;
                case "April":
                    $month = "Abril";
                    break;
                case "May":
                    $month = "Maio";
                    break;
                case "June":
                    $month = "Junho";
                    break;
                case "July":
                    $month = "Julho";
                    break;
                case "August":
                    $month = "Agosto";
                    break;
                case "September":
                    $month = "Setembro";
                    break;
                case "October":
                    $month = "Outubro";
                    break;
                case "November":
                    $month = "Novembro";
                    break;
                case "December":
                    $month = "Dezembro";
                    break;
                default:
                    $month = "erro";
                    break;
            }

            return $day . ", " . $daynum . " de " . $month . " de " . $year;


        }

        if ($formato == 2) {
            return date('d/m/Y', $date);
        }

        if ($formato == 3) {

            return date('d/m/Y H:i', $date);
        }
        if ($formato == 4) {

            return date('Y-m-d H:i', $date);
        }

        if ($formato == 'mes') {

            $month = date("F", $date);

            switch ($month) {
                case "January":
                    $month = "Janeiro";
                    break;
                case "February":
                    $month = "Fevereiro";
                    break;
                case "March":
                    $month = "Março";
                    break;
                case "April":
                    $month = "Abril";
                    break;
                case "May":
                    $month = "Maio";
                    break;
                case "June":
                    $month = "Junho";
                    break;
                case "July":
                    $month = "Julho";
                    break;
                case "August":
                    $month = "Agosto";
                    break;
                case "September":
                    $month = "Setembro";
                    break;
                case "October":
                    $month = "Outubro";
                    break;
                case "November":
                    $month = "Novembro";
                    break;
                case "December":
                    $month = "Dezembro";
                    break;
                default:
                    $month = "erro";
                    break;
            }

            return $month;
        }

    }
}}



if ( ! function_exists('configPagination'))
{
    function configPagination($url,$total_rows,$segment,$per_page=10)
    {
        $CI = get_instance();
        $CI->load->library('pagination');
        $config['base_url'] 		= site_url($url);
        $config['total_rows'] 		= $total_rows;
        $config['per_page'] 		= $per_page;
        $config['uri_segment'] 		= $segment;
        $config['full_tag_open'] 	= '<div class="pagination"><ul>';
        $config['full_tag_close'] 	= '</ul></div>';
        $config['num_tag_open'] 	= '<li>';
        $config['num_tag_close'] 	= '</li>';
        $config['cur_tag_open'] 	= '<li class="active"><a href="#">';
        $config['cur_tag_close']	= '</a></li>';
        $config['num_links'] 		= 5;
        $config['next_tag_open'] 	= "<li>";
        $config['next_tag_close'] 	= "</li>";
        $config['prev_tag_open'] 	= "<li>";
        $config['prev_tag_close'] 	= "</li>";

        $config['first_link'] 	= FALSE;
        $config['last_link'] 	= FALSE;
        $CI->pagination->initialize($config);

        return $CI->pagination->create_links();
    }
}if ( ! function_exists('formaPagamento'))
{
    function formaPagamento($formaPagamento)

    {
        switch($formaPagamento){

            case 'cc': $fp = 'Cartão de Crédito';
                break;
            case 'boleto': $fp = 'Boleto';
                break;
            default: $fp = 'Offline';


        }

        return $fp;

    }


    function formatarDataFromFormat ($fomatoOriginal, $formatoDestino, $date){


        $myDateTime = DateTime::createFromFormat($fomatoOriginal, $date);
        $newDateString = $myDateTime->format($formatoDestino);

        return $newDateString;
    }





}
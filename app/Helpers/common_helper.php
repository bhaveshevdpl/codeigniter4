<?php
function emailTemplateGenerate($slug,$arrData,$email_subject=''){
    $data=array();
    $builder = db_connect();
    $template = $builder->table('system_email_template')->select('id,name,slug,subject,body,macros')->where('slug',$slug)->get()->getFirstRow();
    $body = str_replace("{{site_name}}",lang('PageTitles.site_title'),$template->body);
    if(isset($arrData['forgotlink'])){
        $body = str_replace("{{forgotlink}}",$arrData['forgotlink'],$body);
    }
    if(isset($arrData['employee_name'])){
        $body = str_replace("{{employee_name}}",$arrData['employee_name'],$body);
    }
    if(isset($arrData['store_name'])){
        $body = str_replace("{{store_name}}",$arrData['store_name'],$body);
    }
    if(isset($arrData['verifylink'])){
        $body = str_replace("{{verifylink}}",$arrData['verifylink'],$body);
    }
    if(isset($arrData['download_link'])){
        $body = str_replace("{{download_link}}",$arrData['download_link'],$body);
    }
    $data['subject'] = ($email_subject!='')?$email_subject:$template->subject;
    $data['body'] = $body;
    return $data;
}
?>
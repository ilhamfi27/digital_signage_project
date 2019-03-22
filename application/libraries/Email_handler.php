<?php
/**
 * 
 */
class Email_handler {
    private $initializer;
    private $from;
    private $to;
    private $subject;
    private $message;

    private $ci;
    
    public function __construct() {
        $this->ci =& get_instance();
        $this->ci->load->library('email');
        $this->ci->load->library('session');
    }

    public function initialize($initializer){
        $this->initializer = $initializer;
    }

    public function from($from){
        $this->from = $from;
    }

    public function to($to){
        $this->to = $to;
    }

    public function subject($subject){
        $this->subject = $subject;
    }

    public function message($message){
        $this->message = $message;
    }

    public function print_debugger(){
        return $this->ci->email->print_debugger();
    }

    public function send(){
        $this->ci->email->initialize($this->initializer);
        $this->ci->email->from($this->from);
        $this->ci->email->to($this->to);
        $this->ci->email->subject($this->subject);
        $this->ci->email->message($this->message);
        if (ENVIRONMENT === 'production' || ENVIRONMENT === 'staging') {
            if($this->ci->email->send()){
                $this->ci->session->set_flashdata('registration_message','Activation code sent to email');
            } else {
                $this->ci->session->set_flashdata('registration_message', $this->ci->email->print_debugger());
            }
            return $this->ci->email->send();
        } else {
            $folder = "storage/cache/email/";
            $filename = $folder.time()."_email_cache_".date("Y_m_d").".html";
            (!is_dir($folder)) ? mkdir($folder, 0777, TRUE) : NULL;
            if (!file_exists($filename)) {
                $content = $this->message;
                $handle = fopen($filename, 'w+') or die('cannot open the file');
                fwrite($handle, $content);
                fclose($handle);
                // echo "
                // <script>
                //     window.onload = function(){
                //         window.open(\"".base_url().$filename."\", \"_blank\"); // will open new tab on window.onload
                //     }
                // </script>
                // ";
                $this->ci->session->set_flashdata('registration_message','Activation code sent to email');
            }
        }
        return $filename;
    }
}

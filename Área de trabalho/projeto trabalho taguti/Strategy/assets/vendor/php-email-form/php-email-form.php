<?php
class PHP_Email_Form {
  public $ajax = true;
  public $to = '';
  public $from_name = '';
  public $from_email = '';
  public $subject = '';
  public $message = '';

  public function add_message($value, $label, $min_length = 0) {
    $this->message .= $label . ': ' . $value . "\n";
  }

  public function send() {
    $headers = 'From: ' . $this->from_email . "\r\n" .
               'Reply-To: ' . $this->from_email . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    $email_content = "Nome: " . $this->from_name . "\n";
    $email_content .= "Email: " . $this->from_email . "\n";
    $email_content .= "Assunto: " . $this->subject . "\n\n";
    $email_content .= "Mensagem:\n" . $this->message;

    if (mail($this->to, $this->subject, $email_content, $headers)) {
      return 'OK';
    } else {
      return 'Erro ao enviar email';
    }
  }
}
?> 
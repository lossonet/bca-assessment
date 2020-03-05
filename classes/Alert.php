<?php

class Alert {

    private $name;
    
    private $type;
    private $message;
    private $data = [];

    private $valid_types = [
        'primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'
    ];
     
    public function __construct($name = 'bca_alert')
    {
        $this->name = trim(strtolower($name));
    }

    public function save($values = [])
    {
        if (empty($values)) {
            return false;
        }

        $this->type    = isset($values['type']) ? trim(strtolower($values['type'])) : null;
        $this->message = isset($values['message']) ? trim($values['message']) : null;
        $this->data    = isset($values['data']) ? $values['data'] : null;

        if (empty($this->type) || empty($this->message)) {
            return false;
        }

        if ( !in_array($this->type, $this->valid_types) ) {
            $this->type = 'primary';
        }

		session_start();

        $_SESSION[$this->name] = [
            'type'    => $this->type,
            'message' => $this->message,
            'data'    => $this->data,
        ];
        
        return true;
    }

    public function get()
    {
        session_start();

        if (isset($_SESSION[$this->name])) {
            $alert = $_SESSION[$this->name];
            unset($_SESSION[$this->name]);
        }

        if (empty($alert)) {
            return false;
        }

        $this->type    = $alert['type'];
        $this->message = $alert['message'];
        $this->data    = $alert['data'];
    }

    public function type()
    {
        return $this->type;
    }

    public function message()
    {
        return $this->message;
    }

    public function data()
    {
        return $this->data;
    }
}
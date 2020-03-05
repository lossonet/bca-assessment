<?php

// Loading all CONFIG and CLASSES
require 'bootstrap.php';

$action = isset($_GET['action']) ? trim(strtolower($_GET['action'])) : null;

switch ($action) {

    case 'add':

        $data = [];

        // Client Information
        $data['salutation'] = isset($_POST['salutation']) ? trim(ucwords($_POST['salutation'])) : null;
        $data['first_name'] = isset($_POST['first_name']) ? trim(ucwords($_POST['first_name'])) : null;
        $data['last_name']  = isset($_POST['last_name']) ? trim(ucwords($_POST['last_name'])) : null;
        $data['email']      = isset($_POST['email']) ? trim(strtolower($_POST['email'])) : null;
        $data['country']    = isset($_POST['country']) ? trim(strtoupper($_POST['country'])) : null;
        $data['zipcode']    = isset($_POST['zipcode']) ? trim($_POST['zipcode']) : null;
        $data['newsletter'] = isset($_POST['newsletter']) ? 1 : 0;

        // Research Preference
        $data['asset_class']     = isset($_POST['asset_class']) ? trim(strtolower($_POST['asset_class'])) : null;
        $data['investment_time'] = isset($_POST['investment_time']) ? trim(strtolower($_POST['investment_time'])) : null;
        $data['expected_date']   = isset($_POST['expected_date']) ? trim($_POST['expected_date']) : null;
        $data['comments']        = isset($_POST['comments']) ? trim($_POST['comments']) : null;

        // Zipcode validation (USA)
        if ( ('USA' === $data['country']) && (!is_numeric($data['zipcode'])) ) {
            $alert = new Alert();
            $alert->save([
                'type'    => 'warning',
                'message' => 'Please provide your zipcode (numbers only)',
                'data'    => $data,                
            ]);
            header("Location: /");
            exit();
        }

        // Email validation
        $client = new Client($data['email']);
        if ( $client->get() ) {
            $alert = new Alert();
            $alert->save([
                'type'    => 'danger',
                'message' => 'This email is already registered to another client. Please try again.',
                'data'    => $data,                
            ]);
            header("Location: /");
            exit();
        }

        if (Client::save($data)) {
            $alert = new Alert();
            $alert->save([
                'type'    => 'success',
                'message' => "The client was successfully added to the database!",
            ]);
        }

        header("Location: /");

        break;

    case 'delete':

        $email = isset($_GET['email']) ? trim(strtolower($_GET['email'])) : null;

        $client = new Client($email);
        
        $client->delete();

        $alert = new Alert();
        $alert->save([
            'type'    => 'success',
            'message' => "The client <strong>$email</strong> was successfully removed from the database!",
        ]);

        header("Location: /");

        break;

    default:
        header("Location: /");
        exit();
}

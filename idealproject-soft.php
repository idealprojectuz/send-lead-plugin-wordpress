<?php

/**
 * Plugin Name: Idealproject Soft
 * Description: idealproject soft configuration
 * Author: Hayotbek Samandarov
 * Version: 1.0.2
 * Author URI: https://t.me/hayotbek_0427
 *
 * Text Domain: idealproject-soft
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


// add_action('wp_ajax_send_email', 'get_idealproject_data');
// add_action('wp_ajax_nopriv_get_idealproject_data', 'get_idealproject_data');

// function get_idealproject_data()
// {
//     // $data = array();
//     // if (isset($_POST['data'])) {
//     //     $data = json_decode($_POST['data'], true);
//     // }

//     // if (empty($data)) {
//     //     $response = array(
//     //         'status' => 'error',
//     //         'message' => __('Data is empty', 'idealproject-soft')
//     //     );
//     // } else {
//     //     $response = array(
//     //         'status' => 'success',
//     //         'message' => 'Data received',
//     //         'data' => $data
//     //     );
//     // }
//     $response = array('status' => 'success', 'message' => 'Data received', 'data' => $_POST['data']);
//     wp_send_json($response);
//     wp_die();
// }

// add_action('wp_ajax_nopriv_my_custom_action', 'my_ajax_foobar_json_handler');
add_action('rest_api_init', function () {
    register_rest_route('idealproject-soft/v1', '/send-lead', array(
        'methods' => 'POST',
        'callback' => 'send_lead',
    ));
});
include('mail.php');
function send_lead(WP_REST_Request $request)
{
    // print_r($request);
    $body = $request->get_json_params();
    $to = get_option('admin_email');
    $subject = 'New Order';
    $headers = array('Content-Type: text/html; charset=UTF-8', 'From: New Order ');
    $client = '<table id="customers"> <tr><th>name</th> <th>value</th> </tr> ';
    foreach ($body['client'] as $key => $value) {
        $client .= '<tr>';
        $client .= "<td> $key </td>";
        if (is_bool($value)) {
            $client .= "<td>" . ($value ? 'Yes' : 'No') . "</td>";
        } else {
            $client .= "<td>" . $value . "</td>";
        }
        $client .= '<tr>';
    }
    $client .= '</table>';

    $submissiondata = '<table id="customers"> <tr><th>name</th> <th>value</th> </tr> ';
    foreach ($body['submissionData'] as $key => $value) {
        $submissiondata .= '<tr>';
        $submissiondata .= "<td> $key </td>";
        if (is_bool($value)) {
            $submissiondata .= "<td>" . ($value ? 'Yes' : 'No') . "</td>";
        } else {

            if ($key == 'entry_item' || 'entry_opposite_item') {
                var_dump(is_object($value));
                print_r($value);
                // $submissiondata .= "<td> " . '<p>Parrent: ' . $value['title'] . '</p>' . '<p>children: ' . $value['child'] . '</p>' . "</td>";
                // $submissiondata .= '<td>' . '<p>Parrent: ' . $value['title'] . '</p>' . '<p>children: ' . $value['child'] . '</p>' . "</td>";
                // $submissiondata .= '<td>';
                // $submissiondata .= '<p>Parrent: ' . $value['title'] . '</p>';
                // $submissiondata .= '<p>Children: ' . $value['child'] . '</p>';
                // $submissiondata .= '</td>';
            } else if ($key == 'addons-item') {
                $submissiondata .= "<td> ";
                foreach ($value as $key2 => $value2) {
                    $submissiondata .= '<p>' . $value2['value'] . '</p>';
                }
                $submissiondata .= " </td>";
            } else if ($key == 'single_color') {
                // return $submissiondata .= '<td> <div style="background: ' . $value . '">' . $value . '</div></td>';
                $submissiondata .= '<td> <div style="background: ' . $value . '; display: inline-block; width: 150px; height: 30px; border-radius: 8px;  color: #fff; text-align: center;"></div> <p>' . $value . '</p></td>';
            } else {
                $submissiondata .= "<td>" . $value . "</td>";
            }
        }
        $submissiondata .= '<tr>';
    }
    $submissiondata .= '</table>';


    $message = generateHtml($client, $submissiondata);
    echo $message;
    // $sending = wp_mail($to, $subject, $message, $headers);
    // header('Access-Control-Allow-Origin: *');
    // header('Access-Control-Allow-methods: POST, GET, OPTIONS, PUT, DELETE');
    // if ($sending) {
    //     return wp_send_json_success('Data received', 200);
    // } else {
    //     return wp_send_json_error('Sending problem', 401);
    // }

}

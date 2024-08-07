<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Load CI instance if not loaded already
$CI = & get_instance();

// Load the session library if not loaded already
$CI->load->library('session');

if (!function_exists('show_alert')) {
    function show_alert() {
        // Check for a flash message
        $CI = & get_instance(); // Get CI instance
        $message = $CI->session->flashdata('message');
        $type = $CI->session->flashdata('type'); // 'success', 'error', 'warning', 'info', etc.

        if ($message) {
            echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            title: '" . ucfirst($type) . "!',
                            text: '" . $message . "',
                            icon: '" . $type . "',
                            confirmButtonText: 'OK'
                        });
                    });
                  </script>";
        }
    }
}
?>
